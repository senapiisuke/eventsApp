<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminCreateComplete</title>
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
              <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li>
              <a class="nav-link" href="{{ route('admin.login.logout') }}">ログアウト</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="mt-5">
      <div class="text-center">
        <h2>新しい投稿を作成しました</h2>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">投稿作成画面に戻る</a>
      </div>
    </div>
</body>
</html>