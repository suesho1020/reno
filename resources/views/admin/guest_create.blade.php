@extends('layouts.admin.app')
@section('content')
<main class="w-100 bg-light">
    <form method="post" action="{{route('admin.guest.store')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">名前</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameError">
            <div id="nameError" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailError">
            <div id="emailError" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="company_name" class="form-label">会社名</label>
            <input type="text" class="form-control" id="company_name" name="company_name" aria-describedby="companyError">
            <div id="companyError" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">パスワード</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
    </form>
</main>
@endsection