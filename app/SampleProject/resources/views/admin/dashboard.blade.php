<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDashboard</title>
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
      <!-- ログイン時に「ログインしました」と表示される -->
      @if (session('login_msg'))
      <div class="alert alert-success">
        {{ session('login_msg') }}
      </div>
      @endif
      <!-- どの管理者IDでログインしてるか表示される -->
      @if (Auth::guard('admins')->check())
      <div class="alert alert-light" role="alert">
        管理者ID {{ Auth::guard('admins')->user()->id }}でログイン中
      </div>
      @endif
      <h3>投稿一覧</h3>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button onclick="location.href='./create'" class="btn btn-primary" type="button">新規作成</button>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">投稿ID</th>
            <th scope="col">管理者ID</th>
            <th scope="col">タイトル</th>
            <th scope="col">作成日時</th>
            <th scope="col">更新日時</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->group_id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
            <td><a href="{{ route('admin.show', ['id'=>$post->id]) }}" class="btn btn-primary">詳細</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
</body>
</html>