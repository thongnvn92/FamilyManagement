<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Family Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/dist/css/dashboard.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/nunito" rel="stylesheet">
    <script src="https://balkan.app/js/FamilyTree.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <h3><a class="navbar-brand bg-dark" href="{{ url('/') }}">HỆ THỐNG QUẢN LÝ THÔNG TIN GIA PHẢ TỘC NGUYỄN VĂN</a></h3>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
                    <span>Danh mục chức năng hệ thống</span>
                    <a class="link-secondary" href="/users" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/family-histories') }}">
                            <span data-feather="shopping-cart"></span>
                            Lịch sử dòng tộc
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/users') }}">
                            <span data-feather="file"></span>
                            Danh sách thành viên
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/wiki-family') }}">
                            <span data-feather="shopping-cart"></span>
                            Tra cứu hộ gia đình
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/family-tree') }}">
                            <span data-feather="shopping-cart"></span>
                            Cây gia phả
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/lunar-calendar') }}">
                            <span data-feather="shopping-cart"></span>
                            Lịch vạn niên
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ritual-texts') }}">
                            <span data-feather="shopping-cart"></span>
                            Mẫu bài cúng
                        </a>
                    </li>
                </ul>
                <hr>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
                    <span>CÀI ĐẶT HỆ THỐNG</span>
                    <a class="link-secondary" href="/users" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/family-tree') }}">
                            <span data-feather="shopping-cart"></span>
                            Cài đặt thông báo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/users') }}">
                            <span data-feather="file"></span>
                            Hướng dẫn - hỗ trợ
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
