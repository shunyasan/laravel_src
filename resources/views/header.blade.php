<nav>
  <div class="header-all">
    <a href="{{ route(('blog.index')) }}">Home</a>
    <a href="{{ route('blog.create') }}">記事の追加</a>
    <a href="{{ route('prefer') }}">お気に入り</a>
    <form class="search" action="{{route('search')}}" method="post">
      @csrf
      <input type="text" name="search">
      <select class="" name="theme">
        <option value="all">全て</option>
        <option value="title">タイトル</option>
        <option value="sentence">文章</option>
        <option value="name">著者</option>
      </select>
      <button type="submit">検索</button>
    </form>
    @guest
    <div class="login-wrap">
      <a href="{{ route('login') }}">ログイン</a>
      @if (Route::has('register'))
      <a href="{{ route('register') }}">会員登録</a>
      @endif
    </div>
    @else
    <div class="login-wrap">
      <a id="navbarDropdown" class="top-menu dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}様
      </a>
      <a class="dropdown-item" href="{{ route('logout') }}"
      onclick="event.preventDefault();document.getElementById('logout-form').submit();">
      ログアウトする
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
    @endguest
  </div>
</nav>
