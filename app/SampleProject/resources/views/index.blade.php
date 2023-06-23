<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
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
  <img src="../img/EventsApp.jpg" class="img-fluid" alt="Top画像">
  <div class="container">
    <div class="mt-5">
      <h1 class="text-center">EventsAppとは</h1>
      <h4 class="text-center">EventsAppは世界中のイベント情報が集まるサービスです。</h4>
    </div>
    <div class="mt-5">
      <div class="row">
      <div class="col-sm-3">
          <img src="../img/icon_4.png" class="card-img-top" alt="icon">
          <div class="card-body">
            <h5 class="card-title">無料で登録！</h5>
          </div>
        </div>
        <div class="col-sm-3">
          <img src="../img/icon_1.png" class="card-img-top" alt="icon">
          <div class="card-body">
            <h5 class="card-title">世界中から多様なイベント情報満載！</h5>
          </div>
        </div>
        <div class="col-sm-3">
          <img src="../img/icon_3.png" class="card-img-top" alt="icon">
          <div class="card-body">
            <h5 class="card-title">オンラインイベントも多数掲載！</h5>
          </div>
        </div>
        <div class="col-sm-3">
          <img src="../img/icon_2.png" class="card-img-top" alt="icon">
          <div class="card-body">
            <h5 class="card-title">検索機能で簡単に探せる！</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5">
      <div class="text-center">
        <button onclick="location.href='/user/resist'" class="btn btn-primary" type="button">新規無料会員登録</button>
      </div>
    </div>
  </div>
  <footer class="footer mt-4 py-3 bg-light">
    <div class="container text-center">
      <span class="text-muted">&copy; 2023 EventsApp Inc</span>
    </div>
 </footer>

</body>
</html>