@extends('layouts.admin.app')
@section('content')
<main class="w-2/3">
    <div>
        <span><a href="{{route('admin.guest.create')}}">登録</a></span>
    </div>
    <div class="search">

    </div>
    <div>
    <table class="table-auto">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">名前</th>
      <th scope="col">メールアドレス</th>
      <th scope="col">登録日</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    @foreach($guest_list as $row)
    <tr>
      <th scope="row">{{$row->id}}</th>
      <td>{{$row->name}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->created_at}}</td>
      <td><a href="{{route('admin.guest.edit', $row->id)}}">編集</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

    </div>
</main>
@endsection