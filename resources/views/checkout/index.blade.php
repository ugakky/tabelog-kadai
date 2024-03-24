@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')

<body>
  <div class="container d-flex justify-content-center mt-5">
    <div class="w-75 mt-5">
      <p>有料会員登録しますがよろしいですか</p>

      <form action="{{route('checkout.store')}}" method="POST">
        @csrf
        <button type="button" onclick="history.back()">戻る</button>
        <button type="submit">支払いへ</button>
      </form>
    </div>
  </div>
</body>