<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\News;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author=Author::orderBy('created_at', 'desc')->get();
        return view('admin.author.index',[
            'author'=>$author
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.author.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_author=new Author();
        $new_author->email=$request->email;

        $new_author->author_name = $request->author_name;
        $new_author->save();

        return redirect()->back()->withSuccess('Успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit',[
           'author'=>$author
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $author->author_name=$request->author_name;
        $author->email=$request->email;
        $author->save();
        return redirect()->back()->withSuccess('Успешно обновлен');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $news=News::where('news_author_id',$author->id)->count();
        if($news>0){
            return redirect()->back()->withSuccess('Удалите новости связанные с автором');
        }
        else{
            $author->delete();
            return redirect()->back()->withSuccess('Успешно удален');
        }
    }
}
