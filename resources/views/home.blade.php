<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トップページ</title>
</head>

<body>
  @extends('layouts.app')
  @section('title', 'Home')

  @section('content')
  @include('components.header')

  <h3>店舗</h3>
  <a href="{{route('restaurants.index')}}">検索</a>

  <h3>予約一覧</h3>
  <a href="{{route('reservations.index')}}">予約確認</a>

  <h3>お気に入り一覧</h3>
  <a href="{{route('mypage.favorite')}}">お気に入り</a>
  <h3>会員情報</h3>
  <a href="{{route('mypage')}}">編集</a>
  <h3>会社情報</h3>
  <a href="{{route('companies.index')}}">会社情報</a>

  @endsection
</body>

</html>