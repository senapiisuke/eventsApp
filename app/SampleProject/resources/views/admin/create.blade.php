<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminCreate</title>
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

    <div class="container">
      <div class="mt-5">
        <h2>新規投稿作成</h2>
    </div>

      <form method="POST" action="{{ route('admin.store')  }}" enctype="multipart/form-data">
      @csrf
        <div class="row">
          <div class="col-sm-4">
            <label for="group_id" class="form-label">管理者ID</label>
          </div>
          <div class="col-sm-8">
            <input type="text" name="group_id" class="form-control" id="group_id" value="{{ Auth::guard('admins')->user()->id }}" readonly>
          </div>

          <div class="col-sm-4">
            <label for="title" class="form-label">タイトル</label>
          </div>
          <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
          </div>
            @if ($errors->has('title'))
              <p class="alert alert-danger">{{ $errors->first('title') }}</p>
            @endif

          <div class="col-sm-4">
            <label>カテゴリー</label>
          </div>
          <div class="col-sm-8">
            <select class="form-select" aria-label="Default select example" name="category" id="category">
              <option></option>
              <option value="1">スキルアップ/資格</option>
              <option value="2">ビジネス</option>
              <option value="3">社会貢献/地域活性</option>
              <option value="4">テクノロジー/サイエンス</option>
              <option value="5">食/グルメ</option>
              <option value="6">音楽/ライブ/フェス</option>
              <option value="7">ファッション/美容</option>
              <option value="8">ゲーム/漫画/アニメ</option>
              <option value="9">デザイン/アート</option>
              <option value="10">その他</option>
            </select>
          </div>
          @if ($errors->has('category'))
            <p class="alert alert-danger">{{ $errors->first('category') }}</p>
          @endif

          <div class="col-sm-4">
            <label for="date" class="form-label">開催日時</label>
          </div>
          <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}">
          </div>
          @if ($errors->has('date'))
            <p class="alert alert-danger">{{ $errors->first('date') }}</p>
          @endif

          <div class="col-sm-4">
            <label for="entry_fee" class="form-label">参加費(円)</label>
          </div>
          <div class="col-sm-8">
            <input type="text" name="entry_fee" class="form-control" id="entry_fee" value="{{ old('entry_fee') }}">
          </div>
          @if ($errors->has('entry_fee'))
            <p class="alert alert-danger">{{ $errors->first('entry_fee') }}</p>
          @endif

          <div class="col-sm-4">
            <label for="content" class="form-label">内容</label>
          </div>
          <div class="col-sm-8">
            <textarea class="form-control" name="content" id="content" rows="5">{{ old('content') }}</textarea>
          </div>
          @if ($errors->has('content'))
            <p class="alert alert-danger">{{ $errors->first('content') }}</p>
          @endif

          <div class="col-sm-4">
            <label for="image_url" class="form-label">画像</label>
          </div>
          <div class="col-sm-8">
            <input type="file" name="image_url" class="form-control"  id="image_url">
          </div>
          @if ($errors->has('image_url'))
            <p class="alert alert-danger">{{ $errors->first('image_url') }}</p>
          @endif

          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button name="action" type="submit" value="return" class="btn btn-dark">キャンセル</button>
            <button name="action" type="submit" value="submit" class="btn btn-primary">作成</button>
          </div>
        </div>
      </form>
    </div>
</body>
</html>