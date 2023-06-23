<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserShow</title>
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
              <a class="nav-link" href="{{ route('user.login.logout') }}">ログアウト</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-md">
      <div class="card">
        <img src="/storage/image_url/{{ $post->image_url }}">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
            @if($post->category == 1)
              <p class="card-text"><small class="text-muted">スキルアップ/資格</small></p>
            @elseif($post->category == 2)
              <p class="card-text"><small class="text-muted">ビジネス</small></p>
            @elseif($post->category == 3)
              <p class="card-text"><small class="text-muted">社会貢献/地域活性</small></p>
            @elseif($post->category == 4)
              <p class="card-text"><small class="text-muted">テクノロジー/サイエンス</small></p>
            @elseif($post->category == 5)
              <p class="card-text"><small class="text-muted">食/グルメ</small></p>
            @elseif($post->category == 6)
              <p class="card-text"><small class="text-muted">音楽/ライブ/フェス</small></p>
            @elseif($post->category == 7)
              <p class="card-text"><small class="text-muted">ファッション/美容</small></p>
            @elseif($post->category == 8)
              <p class="card-text"><small class="text-muted">ゲーム/漫画/アニメ</small></p>
            @elseif($post->category == 9)
              <p class="card-text"><small class="text-muted">デザイン/アート</small></p>
            @elseif($post->category == 10)
              <p class="card-text"><small class="text-muted">その他</small></p>
            @endif
            <div class="row">
              <div class="col-sm-2">
                <label>開催日時：</label>
              </div>
              <div class="col-sm-10">
                <p class="card-text">{{ $post->date }}</p>
              </div>
              <div class="col-sm-2">
                <label>参加費：</label>
              </div>
              <div class="col-sm-10">
                <p class="card-text">{{ $post->entry_fee }}円</p>
              </div>
              <div class="col-sm-2">
                <label>詳細：</label>
              </div>
              <div class="col-sm-10">
                <p class="card-text">{{ $post->content }}</p>
              </div>
            </div>
        </div>
      </div>
    </div>
</body>
</html>