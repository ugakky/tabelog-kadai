@include('components.header')

<body>
  <div class="container d-flex justify-content-center mt-5">
    <div class="w-75 mt-5">
      <h1>{{$restaurant->store_name}}</h1>
      <td>電話番号：{{ $restaurant->telephone }}</td><br>
      <td>住所：{{ $restaurant->address }}</td><br>
      <td>開店時間：{{ $restaurant->open_time }}</td><br>
      <td>閉店時間：{{ $restaurant->close_time }}</td><br>
      <td>定休日：{{ $restaurant->regular_holiday }}</td><br>
      <td>価格：{{ $restaurant->lower_price }}〜{{ $restaurant->max_price }}</td><br>
      <hr>

      @auth
      @if ($user->is_paid_member)
      <button><a href="{{route('subscription',['restaurant_id'=>$restaurant->id])}}">予約</a></button>
      <br>

      <a href="{{route('restaurants.favorite' , $restaurant)}}">
        @if ($restaurant->hasBeenFavoritedBy(Auth::user()))
        お気に入り解除
        @else
        お気に入り
        @endif
      </a>
      <br>
      <hr>
      <a href="{{route('reviews.index',['restaurant_id'=>$restaurant->id])}}">レビュー投稿</a></td>
      @endif
      @endauth

      <h2>レビュー</h2>
      @foreach ($reviews as $review)
      <div>{{str_repeat('★',$review->evaluation)}}</div>
      <div>{{$review->comment}}</div>
      @endforeach
      <hr>
      <div id="star">
        <star-rating v-model="rating"></star-rating>
      </div>
    </div>
  </div>

</body>