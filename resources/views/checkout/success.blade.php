@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')

<!DOCTYPE html>
<html lang="ja">

<body>
  <div class="container d-flex justify-content-center mt-5">
    <div class="w-75 mt-5">
      <p>有料会員ご登録ありがとうございます</p>

      <a href="{{route('mypage')}}">マイページへ</a>
    </div>
  </div>
</body>