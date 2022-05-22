<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\News;
use App\Models\Rubric;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $news = News::orderBy('created_at', 'DESC')->get();

      return view('admin.news.index', [
            'news' => $news
      ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = Author::orderBy('created_at', 'DESC')->get();
        $rubric=Rubric::orderBy('created_at', 'DESC')->get();
        return view('admin.news.create',[
           'author'=>$author,
           'rubric'=>$rubric
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $news=new News();
        $news->heading=$request->heading;
        $news->anons=$request->anons;
        $news->text=$request->text;
        $news->rubric_news_id=$request->rubric_news_id;
        $news->news_author_id=$request->news_author_id;
        $news->save();
        return redirect()->back()->withSuccess('Статья была успешно добавлена!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $author = Author::orderBy('created_at', 'DESC')->get();
        $rubric=Rubric::orderBy('created_at', 'DESC')->get();
        return view('admin.news.edit',[
            'news'=>$news,
            'author'=>$author,
            'rubric'=>$rubric
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->heading=$request->heading;
        $news->anons=$request->anons;
        $news->text=$request->text;
        $news->rubric_news_id=$request->rubric_news_id;
        $news->news_author_id=$request->news_author_id;
        $news->save();
        return redirect()->back()->withSuccess('Статья была успешно обновлена!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
        $news->delete();
        return redirect()->back()->withSuccess('Статья была успешно удалена!');

    }
}
