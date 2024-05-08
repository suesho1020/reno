@extends('layouts.admin.app')
@section('content')
<main class="w-100 bg-light">
    <div>
        <span><a href="{{route('admin.stock.create')}}">登録</a></span>
    </div>
    <div class="search">

    </div>
    <div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">商品コード</th>
      <th scope="col">SKUコード</th>
      <th scope="col">商品名</th>
      <th scope="col">ステータス</th>
      <th scope="col">在庫数</th>
      <th scope="col">販売価格</th>
      <th scope="col">登録日</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    @foreach($stock_list as $row)
    <tr>
      <th scope="row">{{$row->id}}</th>
      <td>{{$row->code}}</td>
      <td>{{$row->sku_code}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->status}}</td>
      <td>{{$row->zaiko}}</td>
      <td>{{$row->price}}</td>
      <td>{{$row->created_at}}</td>
      <td><a href="{{route('admin.stock.edit', $row->id)}}">編集</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

    </div>
</main>
@endsection