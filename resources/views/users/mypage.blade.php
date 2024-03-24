@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')
<div class="container d-flex justify-content-center mt-5">
  <div class="w-75 mt-5">
    <h1>マイページ</h1>
    <hr>
    @if ($user->is_paid_member)
    <p><a class="nav-link" href="{{route('mypage.edit')}}">・アカウント情報の編集</a></p>
    <p><a class="nav-link" href="{{route('reservations.index')}}">・予約一覧</a></p>
    <p><a class="nav-link" href="{{route('mypage.favorite')}}">・お気に入り店舗一覧</a></p>
    @else
    <p><a href="{{route('mypage.edit')}}">アカウント情報の編集</a></p>
    <p><a href="{{route('checkout.index')}}">有料会員になる</a></p>
    @endif
    <hr>
  </div>
</div>