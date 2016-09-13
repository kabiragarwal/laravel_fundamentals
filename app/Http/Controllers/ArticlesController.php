<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use App\Http\Requests;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Auth;
use App\Tag;
//use Session;

class ArticlesController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['only' => ['create','store','edit','update','delete']]);
        $this->middleware('authorize', ['only' => ['edit','update','delete']]);
    }

    public function index() {
        //return Auth::user();
        //$articles = Article::all();
        //$articles = Article::latest('published_at')->get();
        $articles = Article::latest('published_at')->Published()->get();
        //$articles = Article::latest('published_at')->Unpublished()->get();

        //$latest = Article::latest()->first();
        //return view('articles.index', compact('articles','latest'));
        return view('articles.index', compact('articles'));
    }

    public function show($id) {
        //$article = Article::find($id);
        //dd($article);
        $article = Article::findorfail($id);
        //dd($article->created_at);

        /* property accesser */
        //dd($article->created_at->year);
        //dd($article->created_at->addDays(40)->format('Y-m'));
        //dd($article->created_at->addDays(4)->diffForHumans());
        //dd($article->published_at->addDays(120)->diffForHumans()); //doesn't work initially because it do not have a carbon instance
//        if(is_null($article)){
//            abort(404);
//        }
        if(!$article->isPublished()){
            return 'Error: the current article is unpublished';
            //abort('404');
        }
        return view('articles.show', compact('article'));
    }

    public function create() {
//        if(Auth::guest()){
//            return redirect('articles');
//        }
        $tags = Tag::pluck('name','id');
        return view('articles.create', compact('tags'));
    }

    //form request validation
    public function store(ArticleRequest $request) {
        // $title = Request::get('title');
        //dd($title);
        //$input = Request::all();
        //$input['published_at'] = Carbon::now();
        //Article::create(Request::all());
//        $request = $request->all();
//        $request['user_id'] =  Auth::id();
//        Article::create($request);

        //Auth::user()->articles()->create($request->all());
        //flash('your article has been created');
        //flash()->success('your article has been created');
        //dd($request->input('tags'));
        flash()->overlay('your article has been created', 'success');

        //$article = new Article($request->all());
        //$article = Auth::user()->articles()->save(new Article($request->all()));

        //$tagIds = $request->input('tags');
        //$article->tags()->attach($request->input('tag_lists'));
        //$this->syncTags($article, $request->input('tag_lists'));

        $this->createArticle($request);

        return redirect('articles');
//        session()->flash('flash_message','your message has been created');
//        session()->flash('flash_message_important',true);
        //Session::flash('flash_message','your message has been created');
        //Article::create($request->all());
//        return redirect('articles')->with([
//            'flash_message' => 'your message has been created',
//            'flash_message_important' => true
//        ]);
    }

    //validation method directly in controller
    // import the http/request on top (Illuminate\Http\Request)
    /*    public function store(Request $request){
      $this->validate($request, [
      'title' => 'required|min:3',
      'body' =>'required',
      'published_at' => 'required|date'
      ]);
      Article::create($request->all());
      return redirect('articles');
      } */

    public function edit($id, Request $request) {
        //dd($id);
        $tags = Tag::pluck('name','id');
        $article = Article::findorfail($id);
        //dd($article);
        if(!$article->isPublished()){
            return 'Error: the current article is unpublished';
            //abort('404');
        }
        return view('articles.edit', compact('article','tags'));
    }

    public function update($id, ArticleRequest $request) {
        $article = Article::findorfail($id);
        $article->update($request->all());
        $this->syncTags($article, $request->input('tag_lists'));

        //for deleting the record from pivot table
        //$article->tags()->detach($request->input('tag_lists'));
        return redirect('articles');
    }

    public function syncTags(Article $article, array $tags){
       $article->tags()->sync($tags);
    }

    public function createArticle(ArticleRequest $request){
       $article = Auth::user()->articles()->save(new Article($request->all()));
       $this->syncTags($article, $request->input('tag_lists'));
       return $article;
    }

    public function destroy($id){
        $article = Article::findorfail($id);
        $article->delete();
        flash('Your article has been successfully deleted','Success');
        return redirect('articles');
    }
}
