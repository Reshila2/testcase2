<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubric=Rubric::orderBy('created_at', 'desc')->get();
        return view('admin.rubric.index',[
            'rubric'=>$rubric
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rubric.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_rubric=new Rubric();
        $new_rubric ->rubric_name=$request->rubric_name;
        $new_rubric->save();
        return redirect()->back()->withSuccess('Успешно добавлен');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Http\Response
     */
    public function show(Rubric $rubric)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Http\Response
     */
    public function edit(Rubric $rubric)
    {
        return view('admin.rubric.edit',[
            'rubric'=>$rubric
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rubric $rubric)
    {
        $rubric->rubric_name=$request->rubric_name;
        $rubric->save();
        return redirect()->back()->withSuccess('Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rubric  $rubric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rubric $rubric)
    {
        $news=News::where('rubric_news_id',$rubric->id)->count();
        if($news>0){
            return redirect()->back()->withSuccess('Удалите новости связанные с рубрикой');
        }
        else{
            $rubric->delete();
            return redirect()->back()->withSuccess('Успешно удален');
        }
    }
}
