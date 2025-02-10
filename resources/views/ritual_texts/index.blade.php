@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Quản lý Mẫu Văn Bản Cúng Bái</h2>
    <!-- Button mở modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addRitualTextModal">
        Thêm Mẫu
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($texts as $text)
                <tr id="ritualTextRow-{{ $text->id }}">
                    <td>{{ $text->id }}</td>
                    <td>{{ $text->title }}</td>
                    <td>{{ Str::limit($text->content, 50) }}</td>
                    <td>
                        <button class="btn btn-warning editRitualTextBtn" data-id="{{ $text->id }}" data-title="{{ $text->title }}" data-content="{{ $text->content }}">Sửa</button>
                        <button class="btn btn-danger deleteRitualTextBtn" data-id="{{ $text->id }}" data-title="{{ $text->title }}" data-bs-toggle="modal" data-bs-target="#deleteRitualTextModal">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Thêm -->
<div class="modal fade" id="addRitualTextModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm Mẫu Văn Bản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addRitualTextForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="add_title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội dung</label>
                        <textarea class="form-control" id="add_content" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sửa -->
<div class="modal fade" id="editRitualTextModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh Sửa Mẫu Văn Bản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editRitualTextForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_text_id">
                    <div class="mb-3">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="edit_title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội dung</label>
                        <textarea class="form-control" id="edit_content" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xác nhận Xóa -->
<div class="modal fade" id="deleteRitualTextModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận Xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa mẫu văn bản <strong id="delete_text_title"></strong> không?</p>
                <input type="hidden" id="delete_text_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteRitualText">Xóa</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Thêm mới
        $('#addRitualTextForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/ritual-texts',
                type: 'POST',
                data: {
                    title: $('#add_title').val(),
                    content: $('#add_content').val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function () {
                    location.reload();
                }
            });
        });

        // Sửa
        $('.editRitualTextBtn').click(function () {
            let id = $(this).data('id');
            $('#edit_text_id').val(id);
            $('#edit_title').val($(this).data('title'));
            $('#edit_content').val($(this).data('content'));
            $('#editRitualTextModal').modal('show');
        });

        $('#editRitualTextForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#edit_text_id').val();
            $.ajax({
                url: '/ritual-texts/' + id,
                type: 'PUT',
                data: {
                    title: $('#edit_title').val(),
                    content: $('#edit_content').val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function () {
                    location.reload();
                }
            });
        });

        // Hiển thị modal Xóa
        $('.deleteRitualTextBtn').click(function () {
            let id = $(this).data('id');
            let title = $(this).data('title');
            $('#delete_text_id').val(id);
            $('#delete_text_title').text(title);
            $('#deleteRitualTextModal').modal('show');
        });

        // Xóa bằng AJAX
        $('#confirmDeleteRitualText').click(function () {
            let id = $('#delete_text_id').val();
            $.ajax({
                url: '/ritual-texts/' + id,
                type: 'DELETE',
                data: { _token: "{{ csrf_token() }}" },
                success: function () {
                    $('#deleteRitualTextModal').modal('hide');
                    $('#ritualTextRow-' + id).remove();
                }
            });
        });
    });
</script>
@endsection
