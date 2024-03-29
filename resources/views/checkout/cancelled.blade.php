@extends('layouts.app')
@section('title', 'Cancelled')

@section('content')

<div class="container d-flex justify-content-center mt-5">
    <div class="w-75 mt-5">
        <p>退会が完了しました</p>
        <a href="{{ route('mypage') }}">マイページへ</a>
    </div>
</div>

@endsection
