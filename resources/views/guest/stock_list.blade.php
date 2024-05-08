@extends('layouts.guest.app')
@section('content')
<main class="w-100 bg-light">
    <div>
        <span>商品一覧</span>
    </div>
    <div class="search">
        <form>
            <input type="text" name="search" >
            <div>
                <span>並び替え</span>
                <select></select>
            </div>
            <div>
                <span>表示件数</span>
                <select></select>
            </div>
        </form>
    </div>
    <div>
    @foreach($stock_list as $row)
        <div class="card" style="width: 18rem;">
            <a href="{{route('guest.stock.show', $row->id)}}">
                <img src="..." class="card-img-top" alt="{{$row->name}}">
                <div class="card-body">
                    <p class="card-text">{{$row->name}}</p>
                    <p class="card-text">{{$row->sale_price}}</p>
                </div>
            </a>
        </div>
    @endforeach
    </div>
</main>
@endsection