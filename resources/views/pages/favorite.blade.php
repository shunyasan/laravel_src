@extends('layout')
@section('title','お気に入り')
@section('content')

<div class="top-all">
  <h1>お気に入りの記事</h1>
  @if(session('err_msg'))
  <p>{{session('err_msg')}}</p>
  @endif
  <div class="top-wrap">
    <table>
      <tr class="table-head">
        <th class="pare-title">タイトル</th>
        <th class="pare-short">文章</th>
        <th class="pare-name">著者</th>
        <th class="pare-det"></th>
      </tr>
      @if($blogs)
        @foreach($blogs as $blog)
        <tr class="table-data">
          <td>{{ $blog->title }}</td>
          <td class="short">{{ $blog->sentence }}</td>
          <td>{{ $blog->name }}</td>
          <td><a href="{{ route('blog.show',"$blog->id") }}">詳細</a></td>
        </tr>
        @endforeach
      @else
        <p>記事はありません</p>
      @endif
    </table>
  </div>
</div>

@endsection
