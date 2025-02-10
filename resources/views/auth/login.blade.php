@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Đăng nhập</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" required autofocus>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Đăng nhập</button>
    </form>
</div>
@endsection
