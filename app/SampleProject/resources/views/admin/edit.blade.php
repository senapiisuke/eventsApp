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
        <h2>内容を変更する</h2>
      </div>
      <form method="POST" action="{{ route('admin.update', ['id'=>$post->id]) }}" enctype="multipart/form-data">
      @csrf
      @method('patch')
        <div class="row">
          <div class="col-sm-4">
            <label for="group_id" class="form-label">ID</label>
          </div>
          <div class="col-sm-8">
            <input type="text" name="group_id" class="form-control" id="group_id" value="{{old('group_id') ?? $post->group_id}}" readonly>
          </div>
          <div class="col-sm-4">
            <label for="title" class="form-label">タイトル</label>
          </div>
          <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" value="{{old('title') ?? $post->title}}">
          </div>
          @if ($errors->has('title'))
            <p class="alert alert-danger">{{ $errors->first('title') }}</p>
          @endif
          <div class="col-sm-4">
            <label for="category" class="form-label">カテゴリー</label>
          </div>
          <div class="col-sm-8">
            <input type="text" name="category" class="form-control" id="category" value="{{old('category') ?? $post->category}}">
          </div>
          @if ($errors->has('category'))
            <p class="alert alert-danger">{{ $errors->first('category') }}</p>
          @endif
          <div class="col-sm-4">
            <label for="date" class="form-label">開催日時</label>
          </div>
          <div class="col-sm-8">
            <input type="text" name="date" class="form-control" id="date" value="{{old('date') ?? $post->date}}">
          </div>
          @if ($errors->has('date'))
            <p class="alert alert-danger">{{ $errors->first('date') }}</p>
          @endif
          <div class="col-sm-4">
            <label for="entry_fee" class="form-label">参加費(円)</label>
          </div>
          <div class="col-sm-8">
            <input type="text" name="entry_fee" class="form-control" id="entry_fee" value="{{old('entry_fee') ?? $post->entry_fee}}">
          </div>
          @if ($errors->has('entry_fee'))
            <p class="alert alert-danger">{{ $errors->first('entry_fee') }}</p>
          @endif
          <div class="col-sm-4">
            <label for="content" class="form-label">内容</label>
          </div>
          <div class="col-sm-8">
            <input type="textarea" name="content" class="form-control" id="content" value="{{old('content') ?? $post->content}}">
          </div>
          @if ($errors->has('content'))
            <p class="alert alert-danger">{{ $errors->first('content') }}</p>
          @endif
          <div class="col-sm-4">
            <label for="image_url" class="form-label">画像</label>
          </div>
          <div class="col-sm-8">
            <input type="file" name="image_url" class="form-control" id="image_url" value="{{old('image_url') ?? $post->image_url}}">
          </div>
          <div class="col-sm-4">
            <label for="image_url" class="form-label">（登録中の画像）</label>
          </div>
          <div class="col-sm-7">
            <img src="/storage/image_url/{{ $post->image_url }}" class="card-img-top" alt="登録中の画像">
          </div>
          @if ($errors->has('image_url'))
            <p class="alert alert-danger">{{ $errors->first('image_url') }}</p>
          @endif

          <div class="mt-5">
            <div class="text-center">
              <h5>上記の内容でよろしいですか？</h5>
              <input type="reset" value="キャンセル" class="btn btn-secondary" onclick='window.history.back(-1);'>
              <input type="submit" value="更新" class="btn btn-primary">
            </div>
          </div>
        </div>
      </form>
    </div>
</body>
</html>