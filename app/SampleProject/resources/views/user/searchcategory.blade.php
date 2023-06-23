<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
      <h3 class="text-center">イベントを探す</h3>
    </div>
    <!--検索フォーム-->
    <div class="row">
      <div class="col-sm">
        <form method="GET" action="{{ route('user.search.category')}}">
          <!--入力-->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">タイトル</label>
            <div class="col-sm-5">
              <input class="form-control me-2" type="serch" name="searchWord" value="{{ $searchWord }}" aria-label="Search">
            </div>
            <div class="col-sm-auto">
              <button class="btn btn-outline-success" type="submit">検索</button>
            </div>
          </div>
          <!--プルダウンカテゴリ選択-->
          <div class="form-group row">
            <label class="col-sm-2">カテゴリ</label>
            <div class="col-sm-5">
              <select name="categoryId" class="form-control" type="serch" value="{{ $categoryId }}" aria-label="Search">
                <option value="">すべてのカテゴリ</option>
                @foreach($categories as $id => $category_name)
                  <option value="{{ $id }}">
                    {{ $category_name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--検索フォームここまで-->
    <div class="mt-5">
      <h3>検索結果</h3>
    </div>
    <!--検索結果 検索された時のみ表示する-->
    @if (!empty($posts))
    <div class="productTable">
      <p>全{{ $posts->count() }}件</p>
      <div class="row">
        @foreach($posts as $post)
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
              <img src="/storage/image_url/{{ $post->image_url }}" class="card-img-top" alt="イベント画像">
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p class="card-text">日時：{{ $post->date }}</p>
                  <p class="card-text">参加費：{{ $post->entry_fee }}円</p>
                  <a href="{{ route('user.show.detail', ['id'=>$post->id]) }}" class="btn btn-primary btn-sm">詳細</a>
                </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <!--検索結果ここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
      {{-- appendsでカテゴリを選択したまま遷移 --}}
      {{ $posts->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
    @endif
  </div>
</body>
</html>