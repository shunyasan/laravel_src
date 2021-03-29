@extends('layout')
@section('title','記事の編集')
@section('content')

<div class="create-all">
  <h1>記事の編集</h1>
  @if(session('err_msg'))
  <p>{{ session('err_msg') }}</p>
  @endif
  <div class="detail-wrap">
    <form class="" action="{{ route('blog.update',"$blog->id") }}" method="post">
      @csrf
      @method('put')
      <div class="create-input">
        <a>題名</a>
        <input type="text" name="title" value="{{ $blog->title }}">
      </div>
      <div class="create-input">
        <a>本文</a>
        <textarea name="sentence" rows="8" cols="80">{{ $blog->sentence }}</textarea>
      </div>
      <div class="create-input">
        <a>著者</a>
        <input type="text" name="name" value="{{ $blog->name }}">
      </div>
      <button type="submit" class="btn-1">編集</button>
    </form>
  </div>
</div>

@endsection
