@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chào mừng, {{ auth()->user()->name }}</h2>
    <p>Bạn đã đăng nhập thành công!</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
</div>
@endsection
