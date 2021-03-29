<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{

  /**
  *deleteページの表示
  *@return view
  */
  public function showDelete($id){
    $blog = Blog::find($id);
    return view('pages.delete',compact('blog'));
  }


  /**
  *検索の実行
  *@return view
  */
  public function exeSearch(Request $request){
    $search = $request->search;
    $theme = $request->theme;

    $query = Blog::query();
    if ($theme != 'all') {
      $blogs = $query->where($theme,'like','%'.$search.'%')->get();
    }
    elseif ($theme == 'all') {
      $blogs = $query->where('sentence','like','%'.$search.'%')
                    ->orWhere('name','like','%'.$search.'%')
                    ->orWhere('title','like','%'.$search.'%')
                    ->get();
    }

    if ($theme == 'title') {
      $theme = 'タイトル';
    }
    elseif ($theme == 'sentence') {
      $theme = '文章';
    }
    elseif ($theme == 'name') {
      $theme = '著者';
    }
      $data = [$search,$theme];

    return view('pages.search',compact('blogs','data'));

  }

  public function showFavo(){
    if (Auth::check()) {
      $user = Auth::user();
      $blogs = $user->blogs;
      return view('pages.favorite',compact('blogs'));
    }
    else {
      \Session::flash('coution','お気に入りを表示するにはログインが必要です');
      return view('auth.login');
    }

  }


  public function exeFavorite($id){
      $user = Auth::user();
      $user->blogs()->syncWithoutDetaching($id);
      return redirect(route('blog.show',"$id"));
  }

  public function exeUnFavo($id){
      $user = Auth::user();
      $user->blogs()->detach($id);
      return redirect(route('blog.show',"$id"));
  }



}
