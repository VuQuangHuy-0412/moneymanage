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
    <title>Danh Mục</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! asset('vendorapp/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{!! asset('css/custom.css') !!}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

                    <div class="sb-sidenav-menu-heading">Danh Mục</div>
                    <a class="nav-link collapsed" href="{!! route('app.category') !!}" data-toggle="collapse" data-target="#collapseDashboard" aria-expanded="false" aria-controls="collapseDashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Danh Mục
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboard" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.category') !!}">Tất Cả Danh Mục</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Danh Mục Thu</div>
                    <a class="nav-link collapsed" href="{!! route('app.category-in') !!}" data-toggle="collapse" data-target="#collapseIn" aria-expanded="false" aria-controls="collapseIn">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Danh Mục Thu
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseIn" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.category-in') !!}">Xem Tất Cả Danh Mục Thu</a>
                            <a class="nav-link" href="{!! route('app.add-category-in') !!}">Thêm Danh Mục Thu</a>
                            <a class="nav-link" href="{!! route('app.edit-category-in') !!}">Sửa Danh Mục Thu</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Danh Mục Chi</div>
                    <a class="nav-link collapsed" href="{!! route('app.category-out') !!}" data-toggle="collapse" data-target="#collapseOut" aria-expanded="false" aria-controls="collapseOut">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Danh Mục Chi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseOut" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.category-out') !!}">Xem Tất Cả Danh Mục Chi</a>
                            <a class="nav-link" href="{!! route('app.add-category-out') !!}">Thêm Danh Mục Chi</a>
                            <a class="nav-link" href="{!! route('app.edit-category-out') !!}">Sửa Danh Mục Chi</a>
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
                <h1 class="mt-4">Danh Mục</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Tất Cả Danh Mục</li>
                </ol>
            </div>
            <div class="container-fluid">
                <h4 class="mt-5">Danh mục thu</h4>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-body">
                        <div class="row">
                            @foreach($datas_in as $di)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="card-panel panel" id="tab1">
                                        <div class="panel-heading" role="tab">
                                            <h4 class="panel-title">
                                                <a class="ptitle" role="button" data-toggle="collapse" href="#collapse_{{$di->user_category_id}}">
                                                    {{$di->name}}
                                                </a>
                                                <label role="button" data-toggle="collapse" href="#collapse_{{$di->user_category_id}}">
                                                    <i class="material-icons">expand_more</i>
                                                </label>
                                            </h4>
                                        </div>
                                        <div id="collapse_{{$di->user_category_id}}" class="panel-collapse collapse" role="tabpanel">
                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                @if($di->describe == null) {{"Chưa có mô tả"}}
                                                @else {{$di->describe}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <h4 class="mt-5">Danh mục chi</h4>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-body">
                        <div class="row">
                            @foreach($datas_out as $do)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="card-panel panel" id="tab1">
                                        <div class="panel-heading" role="tab">
                                            <h4 class="panel-title">
                                                <a class="ptitle" role="button" data-toggle="collapse" href="#collapse_{{$do->user_category_id}}">
                                                    {{$do->name}}
                                                </a>
                                                <label role="button" data-toggle="collapse" href="#collapse_{{$do->user_category_id}}">
                                                    <i class="material-icons">expand_more</i>
                                                </label>
                                            </h4>
                                        </div>
                                        <div id="collapse_{{$do->user_category_id}}" class="panel-collapse collapse" role="tabpanel">
                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                @if($do->describe == null) {{"Chưa có mô tả"}}
                                                @else {{$do->describe}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
