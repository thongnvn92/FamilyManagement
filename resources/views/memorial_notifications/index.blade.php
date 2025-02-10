@extends('layouts.app')

@section('title', 'Thông Báo Ngày Giỗ')

@section('content')
    <h2>Thông Báo Ngày Giỗ</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thành Viên</th>
                <th>Ngày Giỗ</th>
                <th>Email Đã Gửi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->family_member_id }}</td>
                    <td>{{ $notification->memorial_date }}</td>
                    <td>{{ $notification->email_sent ? 'Đã gửi' : 'Chưa gửi' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
