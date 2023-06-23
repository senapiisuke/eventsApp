<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserDashboard</title>
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
  <!-- ログイン時に「ログインしました」と表示される -->
  @if (session('login_msg'))
  <div class="alert alert-success">
    {{ session('login_msg') }}
  </div>
  @endif

  <!-- どのユーザーIDでログインしてるか表示される -->
  @if (Auth::guard('members')->check())
    <div class="alert alert-light" role="alert">
      <div>ユーザーID {{ Auth::guard('members')->user()->id }}でログイン中</div>
    </div>
  @endif

  <!-- アプリイメージ画像がフェードで切り替わる -->
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/storage/image_url/EventsApp.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/storage/image_url/HomeTop2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/storage/image_url/HomeTop3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container">
    <div class="mt-5">
      <h3 class="text-center">人気のイベント</h3>
    </div>
  </div>

  <!-- おすすめイベント -->
  <div class="container">
    <div class="row">
    @foreach ($posts as $post)
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
          <img src="/storage/image_url/{{ $post->image_url }}" class="card-img-top" alt="イベント画像">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->date }}</p>
            <a href="{{ route('user.show.detail', ['id'=>$post->id]) }}" class="btn btn-primary btn-sm">詳細</a>
          </div>
        </div>
      </div>
    @endforeach
</body>
</html>