@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')

<div class="container d-flex justify-content-center mt-5">
    <div class="w-75 mt-5">
        <p>退会が完了しました</p>
        <a href="{{ route('mypage') }}">マイページへ</a>
    </div>
</div>

@endsection