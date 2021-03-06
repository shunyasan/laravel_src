@extends('layout')
@section('title','ログイン')

@section('content')
<div class="card">
  <h1>ログイン</h1>
  @if(session('coution'))
  <p>{{session('coution')}}</p>
  @endif
  <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
    @csrf
      <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
        <div class="create-input">
          <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
            @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
        <div class="create-input">
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6 offset-md-4">
          <div class="form-check">
            <input class="create-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
              ログイン状態を保存する
            </label>
          </div>
          @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
            パスワードを忘れましたか?
          </a>
          @endif
          <p><a href="{{ route('register') }}">会員登録はこちら</a></p>
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn-2">
            ログイン
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
