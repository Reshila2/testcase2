<?php

namespace App\Http\Controllers;

use App\Filters\SearchFilter;
use App\Filters\QueryFilter;
use App\Models\Author;
use App\Models\News;
use App\Models\Rubric;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index(SearchFilter $request){
        $rubric=Rubric::orderBy('created_at', 'desc')->get();
        $author=Author::orderBy('created_at','desc')->get();
        $news = News::filter($request)->paginate(5);
        return view('home',[
            'rubric'=>$rubric,
            'author'=>$author,
            'news'=>$news
        ]);
    }

    function add(){
        return view('admin.index');
    }



}
