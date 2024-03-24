@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="resourses/css/bootstrap.min.css">
  <title>店舗一覧</title>
</head>

<body>
  <div class="container text-center w-25" style="margin-top:100px">
    <form method="GET">
      <input type="text" name="keyword">
      <select name="category_id" id="select-category">
        <option value="">カテゴリ</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
      <input type="submit" value="検索">
    </form>
    @if($message)
    <p>{{ $message }}</p>
    @else
    {{-- 検索結果がある場合の表示ロジック --}}
    @foreach ($restaurants as $restaurant)
    {{-- レストランの表示ロジック --}}
    @endforeach
    @endif
  </div>

  <div class="container mt-4">
    <div class="row">
      @foreach ($restaurants as $restaurant)
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="card-title">{{ $restaurant->store_name }}</h3>
            <p class="card-text">電話番号: {{ $restaurant->telephone }}</p>
            <p class="card-text">住所: {{ $restaurant->address }}</p>
            <p class="card-text">開店時間: {{ $restaurant->open_time }}</p>
            <p class="card-text">閉店時間: {{ $restaurant->close_time }}</p>
            <p class="card-text">定休日: {{ $restaurant->regular_holiday }}</p>
            <a href="{{ route('restaurants.detail', $restaurant) }}" class="btn btn-primary">詳細</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</body>