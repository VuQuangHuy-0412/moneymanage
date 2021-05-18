<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--Title-->
    <title>Giới Thiệu</title>

    <!-- Bootstrap core CSS -->
    <link href="vendorapp/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{!! route('app.home') !!}">MoneyManage</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{!! route('app.home') !!}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('app.about') !!}">Giới Thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Danh Mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hoạt động</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Báo cáo</a>
                </li>
                {{--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Portfolio
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                        <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Blog
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
                        <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
                        <a class="dropdown-item" href="blog-post.html">Blog Post</a>
                    </div>
                </li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tài khoản
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                        <a class="dropdown-item" href="{!! route('app.info') !!}">Thông Tin Cá Nhân</a>
                        <a class="dropdown-item" href="#">Đổi Mật Khẩu</a>
                        <a class="dropdown-item" href="#">Khóa tài khoản</a>
                        <a class="dropdown-item" href="{!! route('logout') !!}">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
        Giới Thiệu
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('app.home') !!}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Giới thiệu</li>
    </ol>

    <!-- Intro Content -->
    <div class="row">
        <div class="col-lg-6">
            <img class="img-fluid rounded mb-4" src="http://placehold.it/750x450" alt="">
        </div>
        <div class="col-lg-6">
            <h2>Giới thiệu về MoneyManage</h2>
            <p>Trong giai đoạn nền kinh tế phát triển vượt bậc như hiện nay, nhiều cá nhân hoặc hộ gia đình đang phải đau đầu với chi tiêu hàng tuần, hàng tháng của bản thân hoặc gia đình với những nguồn thu, nguồn chi không ổn định. Bạn muốn thực hiện tiết kiệm tiền hay đang xây dựng một khung kiểm soát tài chính của bản than và gia đình. Phần mềm quản lý chi tiêu được xây dựng nhằm phục vụ cho nhu cầu đó của mọi người.</p>
            <p>Phần mềm sẽ tạo ra một cái nhìn tổng quan nhất giúp cho người dung nắm bắt được tình hình tài chính của bản than trong mỗi khoảng thời gian định kì cũng như giúp các bạn lưu lại những khoản chi tiêu đáp ứng cho việc điều chỉnh cũng như kiểm soát sao cho hợp lý.</p>
        </div>
    </div>
    <!-- /.row -->

    <!-- Team Members -->
    <h2>Nhóm phát triển</h2>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="{!! asset('image/luffy750x450.jpg') !!}" alt="">
                <div class="card-body">
                    <h4 class="card-title">Vũ Quang Huy</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Leader</h6>
                </div>
                <div class="card-footer">
                    <a href="#">vqhuybkhn@gmail.com</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="{!! asset('image/luffy750x450.jpg') !!}" alt="">
                <div class="card-body">
                    <h4 class="card-title">Vũ Quang Huy</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Member</h6>
                </div>
                <div class="card-footer">
                    <a href="#">vqhuybkhn@gmail.com</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
                <img class="card-img-top" src="{!! asset('image/luffy750x450.jpg') !!}" alt="">
                <div class="card-body">
                    <h4 class="card-title">Vũ Quang Huy</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Member</h6>
                </div>
                <div class="card-footer">
                    <a href="#">vqhuybkhn@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Our Customers -->
    <h2>Khách Hàng Lớn</h2>
    <div class="row">
        <div class="col-lg-2 col-sm-4 mb-4">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

