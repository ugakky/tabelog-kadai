@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')

<body>
  <div class="container d-flex justify-content-center mt-5">
    <div class="w-75 mt-5">
      <h1>会社情報</h1>
      <hr>
      <p>会社名：{{ $company->company_name}}</p>
      <p>代表：{{ $company->representative}}</p>
      <p>電話番号：{{ $company->telephone}}</p>
      <p>事業内容：{{ $company->business}}</p>
      <p>住所：{{ $company->address}}</p>
      <hr>
    </div>
  </div>
</body>