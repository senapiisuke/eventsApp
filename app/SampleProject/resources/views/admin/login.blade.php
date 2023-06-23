<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLogin</title>
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
              <a class="nav-link" href="{{ route('user.login.index') }}">ログイン</a>
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
        <h2>管理者の方はこちらからログイン</h2>
      </div>
      @error('login')
      <div class="alert alert-danger" role="alert">
        {{ $message }}
      </div>
      @enderror
      <form method="POST" action="/admin/login">
      @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">パスワード</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="submit" class="btn btn-primary">ログイン</button>
        </div>
      </form>
    </div>
</body>
</html>