@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約</title>
</head>

<body>
  <div class="container d-flex justify-content-center mt-5">
    <div class="w-75 mt-5">
      <h1>予約</h1>
      <hr>
      <h2>{{$restaurant->store_name}}</h2>
      <form method="POST" action="{{route('reservations.register')}}">
        @csrf
        <div id="app">
          <label for="date">予約日:</label>
          <input type="date" name="date" v-bind:min="today" required><br>
        </div>
        <label for="time">予約時間:</label>
        <input type="time" name="time" min="11:00" max="23:00" required><br>
        <label for="people">予約人数:</label>
        <input type="number" name="people" required><br>
        <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
        <button type="submit">予約する</button>
        <hr>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <script>
    var vue = new Vue({
      el: '#app',
      data: {
        today: ''
      },
      created: function() {
        let todaySet = new Date();
        let YYYY = todaySet.getFullYear();
        var MM = ('00' + (todaySet.getMonth() + 1)).slice(-2);
        var DD = ('00' + todaySet.getDate()).slice(-2);
        this.today = YYYY + '-' + MM + '-' + DD
      },
    })
  </script>
</body>

</html>