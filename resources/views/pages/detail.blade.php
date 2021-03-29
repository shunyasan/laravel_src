@extends('layout')
@section('title','ページ詳細')
@section('content')

<div class="detail-all">
  <h1>記事の詳細</h1>
  @if(session('err_msg'))
  <p>{{session('err_msg')}}</p>
  @endif
  <div class="detail-wrap">
    <h2>題名：{{ $blog->title }}</h2>
    <div class="sentence-wrap">
      <p class="blue-sen">本文</p>
      <p>{{ $blog->sentence }}</p>
    </div>
    <div class="sentence-wrap">
      <p class="other-detail">著者：{{ $blog->name }}</p>
      <p class="other-detail">更新日：{{ $blog->updated_at }}</p>
      <p class="other-detail">作成日：{{ $blog->created_at }}</p>
    </div>
    <div class="btn-wrap">
      <button type="button" class="btn-1" onclick="location.href='{{ route('blog.edit',"$blog->id") }}'">編集</button>
      <button type="button" class="btn-2" onclick="location.href='{{ route('delete',"$blog->id") }}'">削除</button>
      @if($blog->users()->where('user_id','=',Auth::user()->id)->exists())
        <button type="button" class="btn-2" onclick="location.href='{{ route('unfavo',"$blog->id") }}'">やめる</button>
      @else
        <button type="button" class="btn-2" onclick="location.href='{{ route('favorite',"$blog->id") }}'">お気に入りする</button>
      @endif
    </div>
  </div>
</div>

@endsection
