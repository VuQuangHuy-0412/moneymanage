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
    <title>Báo Cáo Chi Tiết Theo Ngày</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! asset('vendorapp/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css"/>

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="{!! asset('css/modern-business.css') !!}" rel="stylesheet">

</head>

<body class="sb-nav-fixed">

<!-- Navigation -->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid">
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
                    <a class="nav-link" href="{!! route('app.category') !!}">Danh Mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('app.activity') !!}">Hoạt động</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('app.report') !!}">Báo cáo</a>
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
                        <a class="dropdown-item" href="{!! route('login') !!}">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Báo cáo tổng quát</div>
                    <a class="nav-link collapsed" href="{!! route('app.info') !!}" data-toggle="collapse" data-target="#collapseAll" aria-expanded="false" aria-controls="collapseDashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Báo cáo tổng quát
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseAll" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.report') !!}">Báo cáo tổng quát</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Báo cáo hôm nay</div>
                    <a class="nav-link collapsed" href="{!! route('app.info') !!}" data-toggle="collapse" data-target="#collapseNow" aria-expanded="false" aria-controls="collapseDashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Báo cáo hôm nay
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseNow" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.report-today') !!}">Báo cáo hôm nay</a>
                            <a class="nav-link" href="{!! route('app.report-this-month') !!}">Báo cáo tháng này</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Báo cáo theo ngày</div>
                    <a class="nav-link collapsed" href="{!! route('app.info') !!}" data-toggle="collapse" data-target="#collapseDashboard" aria-expanded="false" aria-controls="collapseDashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Báo cáo theo ngày
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboard" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.date-detail') !!}">Báo cáo chi tiết từng ngày</a>
                            <a class="nav-link" href="{!! route('app.seven-date') !!}">Báo cáo 7 ngày gần nhất</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Báo cáo theo tháng</div>
                    <a class="nav-link collapsed" href="{!! route('app.info') !!}" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Báo cáo theo tháng
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.month-detail') !!}">Báo cáo chi tiết từng tháng</a>
                            <a class="nav-link" href="{!! route('app.six-month') !!}">Báo cáo 6 tháng gần nhất</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ $logged->user_name }}
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Báo cáo</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Báo Cáo Chi Tiết Theo Ngày</li>
                </ol>
            </div>
            <div class="container-fluid">
                @include('elements.alert')
                <div class="card-body">
                    <form method="GET" autocomplete="off" route="app.date-detail" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-8 col-md-12">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label class="col-form-label" for="inputDate">Chọn ngày</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control py-4" name="date"
                                                       placeholder="{{$date}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Xem chi tiết</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-md-12">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Tổng số tiền đã chi trong ngày</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                @if(!isset($datas[0]->tien_chi) || empty($datas[0]->tien_chi)) 0 đồng
                                @else
                                    {{number_format($datas[0]->tien_chi, 0, ",", ".")}} đồng
                                    <input type="hidden" id="tien_chi" value="{{$datas[0]->tien_chi}}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Tổng số tiền đã thu trong ngày</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                @if(!isset($datas[0]->tien_thu) || empty($datas[0]->tien_thu)) 0 đồng
                                @else
                                    {{number_format($datas[0]->tien_thu, 0, ",", ".")}} đồng
                                    <input type="hidden" id="tien_thu" value="{{$datas[0]->tien_thu}}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <h4>Tương quan thu chi trong ngày</h4>
                <div class="col-xl-6">
                    @if(!isset($datas) || empty($datas)) Chưa có hoạt động nào trong ngày {{$date}}!
                    @else
                        <div class="card mb-4">
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="container-fluid">
                <h4>Danh sách các hoạt động trong ngày</h4>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="ibox-content">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Tên hoạt động</th>
                                <th>Danh mục</th>
                                <th>Loại danh mục</th>
                                <th>Số tiền (đồng)</th>
                                <th>Mô tả</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!isset($activities) || empty($activities))
                                <tr>
                                    <td class="text-center" colspan="5">Chưa có hoạt động nào trong hôm nay!</td>
                                </tr>
                            @else
                                @foreach($activities as $a)
                                    <tr>
                                        <td>{{$a->name}}</td>
                                        <td>{{$a->ten_danh_muc}}</td>
                                        <td>
                                            @if($a->type == 0) Thu
                                            @else Chi
                                            @endif
                                        </td>
                                        <td>{{number_format($a->money_amount, 0, ",", ".")}}</td>
                                        <td>{{$a->describe}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a> &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
</body>
