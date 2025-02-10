@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Quản lý Mẫu Văn Bản Cúng Bái</h2>
    <style>
        .card { width: 300px; margin: auto; border: 1px solid #ddd; border-radius: 8px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); }
        .card-header { background: #007bff; color: white; padding: 10px; text-align: center; }
        .card-body { padding: 20px; }
    </style>
    
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Lịch Âm</h3>
        </div>
        <div class="card-body text-center">
            <h4>Ngày {{ now()->format('d/m/Y') }}</h4>
            <h5>Âm lịch: {{ $lunarDate['day'] }}/{{ $lunarDate['month'] }}/{{ $lunarDate['year'] }}</h5>
        </div>
    </div>
    
</div>
@endsection
