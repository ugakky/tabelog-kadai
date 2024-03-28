@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')

<div class="container d-flex justify-content-center mt-5">
  <div class="w-75 mt-5">
    <p>有料会員登録しますがよろしいですか</p>
    
    @if($member_status = "paid")
      <form action="{{ route('cancelMembership') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">有料会員を退会する</button>
      </form>
    @else

    <form action="{{ route('checkout.store') }}" method="POST">
      @csrf
      <button type="button" onclick="history.back()">戻る</button>
      <button type="submit">支払いへ</button>
    </form>
    @endif
  </div>
</div>
@endsection