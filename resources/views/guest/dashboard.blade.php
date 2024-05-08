@extends('layouts.guest.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-white">発注者のダッシュボード</h1>
                    {{ __("You're logged in!") }}

                    <div>{{ Auth::user()->name }}</div>

                </div>
            </div>
        </div>
    </div>
@endsection