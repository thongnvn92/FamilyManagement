@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Danh sách Người Dùng</h2>
     <!-- Nút mở modal -->
     <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
        Thêm User
    </button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr id="userRow-{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        <a href="{{ route('users.detail.show', $user->id) }}" class="btn btn-primary">Chi tiết</a>
                        <button class="btn btn-warning editUserBtn" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}">Sửa</button>
                        <button class="btn btn-danger deleteUserBtn" data-id="{{ $user->id }}">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Thêm User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Thêm User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Quyền</label>
                        <select class="form-control" id="role" name="role">
                            <option value="member">Thành viên</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Chỉnh sửa -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh Sửa Người Dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="edit_user_id">

                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="edit_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" required>
                    </div>

                    <button type="submit" class="btn btn-success">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xác nhận Xóa -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận Xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa người dùng này không?</p>
                <input type="hidden" id="delete_user_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteUser">Xóa</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Xử lý thêm user bằng AJAX
        $('#addUserForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/users',
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert("Thêm user thành công!");
                    location.reload();
                },
                error: function(xhr) {
                    alert("Lỗi: " + xhr.responseJSON.message);
                }
            });
        });

        // Khi click "Sửa"
        $('.editUserBtn').click(function () {
            let userId = $(this).data('id');
            let name = $(this).data('name');
            let email = $(this).data('email');

            $('#edit_user_id').val(userId);
            $('#edit_name').val(name);
            $('#edit_email').val(email);

            $('#editUserModal').modal('show');
        });

        // Xử lý AJAX cập nhật user
        $('#editUserForm').on('submit', function (e) {
            e.preventDefault();

            let userId = $('#edit_user_id').val();
            let name = $('#edit_name').val();
            let email = $('#edit_email').val();
            let _token = "{{ csrf_token() }}";

            $.ajax({
                url: '/users/' + userId,
                type: 'PUT',
                data: { name: name, email: email, _token: _token },
                success: function (response) {
                    location.reload();
                },
                error: function () {
                    alert('Có lỗi xảy ra!');
                }
            });
        });

        // Khi click "Xóa"
        $('.deleteUserBtn').click(function () {
            let userId = $(this).data('id');
            $('#delete_user_id').val(userId);
            $('#deleteUserModal').modal('show');
        });

        // Xác nhận xóa
        $('#confirmDeleteUser').click(function () {
            let userId = $('#delete_user_id').val();
            let _token = "{{ csrf_token() }}";

            $.ajax({
                url: '/users/' + userId,
                type: 'DELETE',
                data: { _token: _token },
                success: function () {
                    $('#userRow-' + userId).remove();
                    $('#deleteUserModal').modal('hide');
                },
                error: function () {
                    alert('Có lỗi xảy ra!');
                }
            });
        });
    });
</script>
@endsection
