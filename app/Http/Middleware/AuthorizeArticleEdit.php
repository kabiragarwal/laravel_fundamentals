<?php

namespace App\Http\Middleware;

use Closure;
use App\Article;
use Auth;


class AuthorizeArticleEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect()->guest('/auh/login');
        }
        $articleId = $request->article;
        //echo $articleId;
        $articleRecods = Article::where('id', $articleId)->first()->toArray();
        //dd($articleRecods['user_id']);
        //die;
        //dd(Article::where('id', $articleId)->get()->toArray());
//        if(!$request->article || !$request->article instanceof Article){
//            return redirect('/articles');
//        }

        if($articleRecods['user_id'] != Auth::user()->id){
            flash()->overlay('your have no permission to access this article', 'success');
            return redirect('/articles');
//        ->with([
//                'flash_message' => 'Article has been deleted'
//            ]);
        }
        return $next($request);
    }
}
