<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about(){
        //$name = 'Jhon Doe';
        //return view('pages.about')->with('name', $name);
//        return view('pages/about')->with([
//            'first' => 'Jhon',
//            'last' => 'Doe'
//        ]);
//
//        $data = [];
//        $data['first'] = 'jhon';
//        $data['last'] = 'Doe';
//        return view('pages/about', $data);
//
//        $first = 'Jhon';
//        $last = 'doe';
//        return view('pages/about', compact($first, $last));

        $name = 'Jhon Doe';
        return view('pages/about', compact('name'));
        //return view('pages/about')->withName($name);
    }

    public function contact(){
        return view('pages.contact');
    }
}
