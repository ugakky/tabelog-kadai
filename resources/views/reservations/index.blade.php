@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')
<div class="container d-flex justify-content-center mt-5">
  <div class="w-75 mt-5">
    <a href="{{route('restaurants.index')}}">ホーム</a> > 予約一覧
    <hr>
    <table>
      <thead>
        <tr>
          <th>予約時間</th>
          <th>予約人数</th>
        </tr>
      </thead>
      <tbody>
        @forelse($reservations as $reservation)
        <tr>
          <td>{{ $reservation->time }}</td>
          <td>{{ $reservation->people }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="2">予約情報がありません。</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    <hr>
  </div>
</div>