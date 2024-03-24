@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')

<body>
  <div class="container">
    <div class="container d-flex justify-content-center mt-5">
      <div class="w-75 mt-5">
        <span>
          <a href="{{route('restaurants.index')}}">ホーム</a> > <a href="{{ route('mypage') }}">マイページ</a> > 会員情報の編集
        </span>

        <h1 class="mt-3 mb-3">会員情報の編集</h1>
        <hr>
        <form method="POST" action="{{ route('mypage') }}">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="name" class="text-md-left samuraimart-edit-user-info-label">氏名</label>
            </div>
            <div class="collapse show editUserName">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="侍 太郎">
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>氏名を入力してください</strong>
              </span>
              @enderror
            </div>
          </div>
          <br>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="email" class="text-md-left samuraimart-edit-user-info-label">メールアドレス</label>
            </div>
            <div class="collapse show editUserMail">
              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>メールアドレスを入力してください</strong>
              </span>
              @enderror
            </div>
          </div>
          <br>

          <hr>
          <button type="submit">
            保存
          </button>
        </form>

        <hr>
        <form method="POST" action="{{ route('mypage.destroy') }}">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <!-- Button trigger modal -->
          <div class="btn dashboard-delete-link" data-toggle="modal" data-target="#exampleModal">
            退会する
          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">本当に退会しますか？</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  一度退会するとデータはすべて削除され復旧はできません。
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                  <button type="submit" class="btn btn-primary">退会する</button>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>
@endsection