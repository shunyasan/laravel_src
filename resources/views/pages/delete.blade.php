@extends('layout')
@section('title','記事の削除')
@section('content')

<div class="detail-all">
  <h1>記事の削除</h1>
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
    <p>以上の記事を削除します</p>
    <div class="btn-wrap">
      <form class="" action="{{ route('blog.destroy',"$blog->id") }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn-2">削除する</button>
      </form>
    </div>
  </div>
</div>


@endsection
