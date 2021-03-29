@extends('layout')
@section('title','記事の追加')
@section('content')

<div class="create-all">
  <h1>記事の追加</h1>
  @if(session('err_msg'))
  <p>{{ session('err_msg') }}</p>
  @endif
  <div class="detail-wrap">
    <form class="" action="{{ route('blog.store') }}" method="post">
      @csrf
      <div class="create-input">
        <a>題名</a>
        <input type="text" name="title" placeholder="題名を入力してください">
      </div>
      <div class="create-input">
        <a>本文</a>
        <textarea name="sentence" rows="8" cols="80" placeholder="本文を入力してください"></textarea>
      </div>
      <div class="create-input">
        <a>著者</a>
        <input type="text" name="name" placeholder="著者を入力してください">
      </div>
      <button type="submit" class="btn-1">追加</button>
    </form>
  </div>
</div>

@endsection
