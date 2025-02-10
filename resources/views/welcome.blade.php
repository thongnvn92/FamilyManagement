@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
    <div class="text-center">
        <h1>Chào mừng đến với hệ thống quản lý gia đình</h1>
        <p>Quản lý cây gia phả, ngày giỗ và các văn bản cúng bái.</p>
        <a href="{{ url('/users') }}" class="btn btn-primary">Quản lý Người Dùng</a>
        <a href="{{ url('/family-tree') }}" class="btn btn-success">Xem Cây Gia Phả</a>
    </div>
@endsection
