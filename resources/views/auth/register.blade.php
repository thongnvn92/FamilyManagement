@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Đăng ký</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label>Họ và tên</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Đăng ký</button>
    </form>
</div>
@endsection
