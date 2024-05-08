@extends('layouts.guest.app')
@section('content')
<main class="w-100 bg-light">
    <div>
        <span>商品一覧</span>
    </div>
    <div>
        <div>
            <img src="..." class="card-img-top" alt="{{$stock->name}}">
        </div>
        <div class="">
            <form method="POST" action="{{route('guest.addcart')}}">
                @csrf
                <input type="hidden" name="item_id" value="{{$stock->id}}">
                <div class="card-body">
                    <p class="card-text">{{$stock->name}}</p>
                    <p class="card-text">{{$stock->memo}}</p>
                    <p class="card-text">{{$stock->sale_price}}</p>
                    <select name="quantity">
                        @for($i = 1; $i <= $stock->zaiko; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <button>見積もり商品に追加する</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection