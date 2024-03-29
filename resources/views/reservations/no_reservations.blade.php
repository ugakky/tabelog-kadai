@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- ユーザーの予約情報などを表示するコードを追加 -->

                <!-- マイページに戻るボタン -->
                <div class="mt-3">
                <a href="{{ route('mypage') }}">マイページへ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
