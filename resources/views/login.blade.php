<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Đăng nhập hệ thống</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/dist/css/signin.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form>
            <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Vui lòng đăng nhập</h1>

            <div class="form-floating">
                <input type="tel" class="form-control" id="floatingInput" placeholder="nguyenvannguyenthong">
                <label for="floatingInput">Số điện thoại</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="*********">
                <label for="floatingPassword">Mật khẩu</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Ghi nhớ cho lần đăng nhập sau.
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng nhập</button>
            <p class="mt-5 mb-3 text-muted">&copy; Copytright by thongnguyen @2025</p>
        </form>
    </main>



</body>

</html>
