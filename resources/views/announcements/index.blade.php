@extends('layouts.app')

@section('title', 'Thông Báo Chung')

@section('content')
    <h2>Thông Báo Chung</h2>
    <ul class="list-group">
        @foreach ($announcements as $announcement)
            <li class="list-group-item">
                <h5>{{ $announcement->title }}</h5>
                <p>{{ $announcement->content }}</p>
            </li>
        @endforeach
    </ul>
@endsection
