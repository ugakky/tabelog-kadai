<header class="home-header">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
  <nav class="navbar navbar-light bg-light fixed-top">
    <!-- タイトル -->
    <a class="navbar-brand" href="{{route('restaurants.index')}}">NAGOYAMESHI</a>

    @guest
    <div class="text-light">
      <button type="button" class="btn btn-outline-primary">
        <a href=" {{route('login')}}">ログイン</a>
      </button>
      <button type="button" class="btn btn-outline-primary">
        <a href="{{route('companies.index')}}">会社情報</a>
      </button>
      <button type="button" class="btn btn-outline-primary">
        <a href="{{ route('register') }}">新規登録</a>
      </button>
    </div>
    @endguest

    @auth
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{route('mypage')}}">ユーザー情報</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('companies.index')}}">会社情報</a>
        </li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          ログアウト
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </ul>
    </div>

    @endauth
  </nav>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</header>