<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $blogs = Blog::all();
      return view('pages.top',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * createページの表示
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     * createの実行
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $inputs = $request->all();
      \DB::beginTransaction();
      try{
        $model = new Blog;
        $model->fill($inputs);
        $model->save();
        \DB::commit();
      }
      catch(\Throwable $e){
        \DB::rollback();
        abort(500);
      }

      \Session::flash('err_msg','記事を追加しました');
      return redirect(route('blog.create'));

    }

    /**
     * Display the specified resource.
     * 詳細の表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (Auth::check()) {
        $blog = Blog::find($id);

        if(is_null($blog)){
          \Session::flash('err_msg','データがありません');
          return redirect(route('blog.index'));
        }

        return view('pages.detail',compact('blog'));
      }
      //ログイン承認ができなかった場合
      else {
        \Session::flash('coution','詳細を表示するにはログインが必要です');
        return view('auth.login');
      }

    }

    /**
     * Show the form for editing the specified resource.
     * 更新ページの表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $blog = Blog::find($id);
      return view('pages.update',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     * 更新の実行
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $inputs = $request->all();
      \DB::beginTransaction();
      try {
        $model = Blog::find($id);
        $model->fill($inputs);
        $model->save();
        \DB::commit();
      }
      catch (\Throwable $e) {
        \DB::rollback();
        abort(500);
      }

      \Session::flash('err_msg','記事を編集しました');
      return redirect(route('blog.show',"$request->id"));

    }

    /**
     * Remove the specified resource from storage.
     *削除の実行
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(empty($id)){
        \Session::flash('err_msg','記事がありません');
        return back();
      }
      try {
        Blog::destroy($id);
      }
      catch (\Throwable $e) {
        \DB::rollback();
        abort(500);
      }

      \Session::flash('err_msg','削除しました');
      return redirect(route('blog.index'));

    }
}
