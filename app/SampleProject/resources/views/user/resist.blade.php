<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserResist</title>
    <!-- bootstrap CSS読み込み -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- bootstrap js読み込み -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('top') }}">EventsApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.resist.show') }}">新規登録</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.login.login') }}">ログイン</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.login.index') }}">管理者の方はこちら</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="mt-5">
        <h2>新規登録</h2>
      </div>
      <form novalidate method="post" action="{{ route('user.resist.resist') }}" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label">名前</label>
          <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
        </div>
        @if ($errors->has('name'))
          <p class="alert alert-danger">{{ $errors->first('name') }}</p>
        @endif
        <div class="mb-3">
          <label for="kana" class="form-label">フリガナ</label>
          <input type="text" name="kana" class="form-control" id="kana" value="{{ old('kana') }}">
        </div>
        @if ($errors->has('kana'))
          <p class="alert alert-danger">{{ $errors->first('kana') }}</p>
        @endif
        <div class="mb-3">
          <label for="tell" class="form-label">電話番号</label>
          <input type="text" name="tell" class="form-control" id="tell" value="{{ old('tell') }}">
        </div>
        @if ($errors->has('title'))
          <p class="alert alert-danger">{{ $errors->first('tell') }}</p>
        @endif
        <div class="mb-3">
          <label for="email" class="form-label">メールアドレス</label>
          <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
        </div>
        @if ($errors->has('email'))
          <p class="alert alert-danger">{{ $errors->first('email') }}</p>
        @endif
        <div class="mb-3">
          <label for="password" class="form-label">パスワード</label>
          <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
        </div>
        @if ($errors->has('password'))
          <p class="alert alert-danger">{{ $errors->first('password') }}</p>
        @endif
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          {{ Form::submit('上記の内容で登録する', ['class' => 'btn btn-primary']) }}
        </div>
      </form>
    </div>
</body>
</html>