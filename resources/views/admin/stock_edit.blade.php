@extends('layouts.admin.app')
@section('content')
<main class="w-100 bg-light">
    <form method="post" action="{{route('admin.stock.update', $stock->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="code" class="form-label">商品コード</label>
            <input type="text" class="form-control" id="code" name="code" aria-describedby="codeError" value="{{$stock->code}}">
            <div id="codeError" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="sku_code" class="form-label">SKUコード</label>
            <input type="text" class="form-control" id="sku_code" name="sku_code" aria-describedby="skuError" value="{{$stock->sku_code}}">
            <div id="skuError" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">商品名</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameError" value="{{$stock->name}}">
            <div id="nameError" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="zaiko" class="form-label">在庫数</label>
            <input type="text" class="form-control" id="zaiko" name="zaiko" aria-describedby="zaikoError" value="{{$stock->zaiko}}">
            <div id="zaikoError" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">通常価格</label>
            <input type="text" class="form-control" id="price" name="price" aria-describedby="priceError" value="{{$stock->price}}">
            <div id="priceError" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="sale_price" class="form-label">販売価格</label>
            <input type="text" class="form-control" id="sale_price" name="sale_price" aria-describedby="saleError" value="{{$stock->sale_price}}">
            <div id="saleError" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">カテゴリー</label>
            <select id="category_id" name="category_id"></select>
        </div>
        <div class="mb-3">
            <label for="memo" class="form-label">商品説明</label>
            <textarea class="form-control" id="memo" name="memo" aria-describedby="memoError">{{$stock->memo}}</textarea>
            <div id="memoError" class="form-text"></div>
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
    </form>
</main>
@endsection