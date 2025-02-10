@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chi tiết thành viên</h2>
    <br>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('users.update', $member->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <h4>Thông tin sơ sở</h4>
                <div class="mb-3">
                    <label>Họ tên</label>
                    <input type="text" name="user_name" class="form-control" value="{{ $member->user->name }}">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $member->user->email }}">
                </div>
            </div>

            <div class="col-md-6">
                <h4>Thông tin thành viên</h4>
                <div class="mb-3">
                    <label>Họ tên</label>
                    <input type="text" name="member_name" class="form-control" value="{{ $member->name }}">
                </div>
                <div class="mb-3">
                    <label>Giới tính</label>
                    <select name="gender" class="form-control">
                        <option value="male" {{ $member->gender == 'male' ? 'selected' : '' }}>Nam</option>
                        <option value="female" {{ $member->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Ngày sinh</label>
                    <input type="date" name="birth_date" class="form-control" value="{{ $member->birth_date }}">
                </div>
                <div class="mb-3">
                    <label>Ngày mất</label>
                    <input type="date" name="death_date" class="form-control" value="{{ $member->death_date }}">
                </div>
                <div class="mb-3">
                    <label>Hình ảnh</label>
                    <input type="text" name="image_url" class="form-control" value="{{ $member->image_url }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>

    </form>
</div>
@endsection
