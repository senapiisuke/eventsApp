<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserMypage</title>
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
            <a class="nav-link active" aria-current="page" href="{{ route('user.dashboard') }}">Home</a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('user.show.search') }}">検索</a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('user.mypage') }}">マイページ</a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('user.login.logout') }}">ログアウト</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="mt-5">
      <h2>マイページ</h2>
      <p>登録情報を表示しています</p>
    </div>

      <div class="row">
        <div class="col-sm-4">
          <label class="form-label">ユーザーID</label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" value="{{ Auth::guard('members')->user()->id }}" readonly>
        </div>
        <div class="col-sm-4">
          <label class="form-label">お名前</label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" value="{{ Auth::guard('members')->user()->name }}" readonly>
        </div>
        <div class="col-sm-4">
          <label class="form-label">フリガナ</label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" value="{{ Auth::guard('members')->user()->kana }}" readonly>
        </div>
        <div class="col-sm-4">
          <label class="form-label">電話番号</label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" value="{{ Auth::guard('members')->user()->tell }}" readonly>
        </div>
        <div class="col-sm-4">
          <label class="form-label">メールアドレス</label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" value="{{ Auth::guard('members')->user()->email }}" readonly>
        </div>
      </div>

  </div>
</body>
</html>