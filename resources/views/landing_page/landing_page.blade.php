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
    <title>Money Manage</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/business-frontpage.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{!! route('landing_page') !!}">Money Manage</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{!! route('landing_page') !!}">Trang chủ
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Tổng quan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service">Dịch vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('login') !!}">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('register') !!}">Đăng ký</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="bg-primary py-5 mb-5">
    <div class="container h-100" id="about">
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4 text-white mt-5 mb-2">Money Manage</h1>
                <p class="lead mb-5 text-white-50">Bạn muốn thực hiện tiết kiệm tiền hay đang xây dựng một khung kiểm soát tài chính của bản thân và gia đình. Phần mềm MoneyManage sẽ giúp bạn có một cái nhìn tổng quát và rõ ràng hơn về tài chính của mình để các bạn có thể hoàn thành mục đích của mình một cách dễ dàng nhanh chóng và tiện lợi.</p>
            </div>
        </div>
    </div>
</header>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-8 mb-5" id="service">
            <h2>Một số dịch vụ tiêu biểu</h2>
            <hr>
            <ul>
                <li>Cho phép người dùng ghi lại mọi khoản thu chi được thực hiện, sau đó tổng hợp để giúp họ biết được thói quen tiêu dùng của mình, từ ăn uống, học hành, mua sắm, du lịch và hẹn hò...</li>
                <hr>
                <li style="color:Purple">Người dùng sẽ biết được ngân sách hiện có thể chi tiêu của mình là bao nhiêu, mình đã tiêu tiền vào những khoản nào, số tiền đã tiết kiệm được... từ đó chủ động quản lý tài chính cá nhân và thay đổi hành vi tiêu dùng phù hợp với tình hình tài chính hiện tại.</li>
                <hr>
                <li>Xem báo cáo hàng tuần, hàng tháng về lượng chi tiêu của mình.</li>
            </ul>
            <a class="btn btn-primary btn-lg" href="{!! route('login') !!}">Trải nghiệm ngay! &raquo;</a>
        </div>
        <div class="col-md-4 mb-5" id="contact">
            <h2>Liên hệ</h2>
            <hr>
            <address>
                <strong>Vũ Quang Huy</strong>
                <br>Số 1 đường Đại Cồ Việt
                <br>Quận Hai Bà Trưng, Thành phố Hà Nội
                <br>
            </address>
            <address>
                <abbr title="Phone">P:</abbr>
                (84)866605601
                <br>
                <abbr title="Email">E:</abbr>
                <a href="#">vqhuybkhn@gmail.com</a>
            </address>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-8 mb-5">
            <h2 class="card-title">Đội ngũ tác giả</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="{!! asset('image/luffy.jpg') !!}" alt="">
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Liên hệ ngay!</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="{!! asset('image/luffy.jpg') !!}" alt="">
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Liên hệ ngay!</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="{!! asset('image/luffy.jpg') !!}" alt="">
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Liên hệ ngay!</a>
                </div>
            </div>
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

