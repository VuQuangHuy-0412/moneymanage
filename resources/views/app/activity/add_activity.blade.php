<?php
?>
    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Title-->
    <title>Thêm Hoạt Động</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! asset('vendorapp/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/custom.css') !!}" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="{!! asset('css/modern-business.css') !!}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset('css/calendar.css') !!}">
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

                    <div class="sb-sidenav-menu-heading">Hoạt Động</div>
                    <a class="nav-link collapsed" href="{!! route('app.activity') !!}" data-toggle="collapse" data-target="#collapseDashboard" aria-expanded="false" aria-controls="collapseDashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Hoạt Động
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboard" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.all-activity') !!}">Thống Kê Hoạt Động</a>
                        </nav>
                    </div>
                    <div class="collapse" id="collapseDashboard" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.activity-today') !!}">Hoạt Động Hôm Nay</a>
                        </nav>
                    </div>
                    <div class="collapse" id="collapseDashboard" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.activity-month') !!}">Hoạt Động Trong Tháng</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Chỉnh Sửa</div>
                    <a class="nav-link collapsed" href="{!! route('app.activity') !!}" data-toggle="collapse" data-target="#collapseIn" aria-expanded="false" aria-controls="collapseIn">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Chỉnh Sửa
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseIn" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{!! route('app.add-activity') !!}">Thêm Hoạt Động</a>
                            <a class="nav-link" href="{!! route('app.edit-activity') !!}">Chỉnh Sửa Hoạt Động</a>
                        </nav>
                    </div>

                    {{--                    <div class="sb-sidenav-menu-heading">Danh Mục Chi</div>--}}
                    {{--                    <a class="nav-link collapsed" href="{!! route('app.category-out') !!}" data-toggle="collapse" data-target="#collapseOut" aria-expanded="false" aria-controls="collapseOut">--}}
                    {{--                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>--}}
                    {{--                        Danh Mục Chi--}}
                    {{--                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
                    {{--                    </a>--}}
                    {{--                    <div class="collapse" id="collapseOut" aria-labelledby="headingOne" data-parent="#sidenavAccordion">--}}
                    {{--                        <nav class="sb-sidenav-menu-nested nav">--}}
                    {{--                            <a class="nav-link" href="{!! route('app.category-out') !!}">Xem Tất Cả Danh Mục Chi</a>--}}
                    {{--                            <a class="nav-link" href="{!! route('app.add-category-out') !!}">Thêm Danh Mục Chi</a>--}}
                    {{--                            <a class="nav-link" href="{!! route('app.edit-category-out') !!}">Sửa Danh Mục Chi</a>--}}
                    {{--                        </nav>--}}
                    {{--                    </div>--}}
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
                <h1 class="mt-4">Chỉnh sửa</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Thêm Hoạt Động</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="content w-100">
                        <div class="calendar-container">
                            <div class="calendar">
                                <div class="year-header">
                                    <span class="left-button fa fa-chevron-left" id="prev"> </span>
                                    <span class="year" id="label"></span>
                                    <span class="right-button fa fa-chevron-right" id="next"> </span>
                                </div>
                                <table class="months-table w-100">
                                    <tbody>
                                    <tr class="months-row">
                                        <td class="month">Jan</td>
                                        <td class="month">Feb</td>
                                        <td class="month">Mar</td>
                                        <td class="month">Apr</td>
                                        <td class="month">May</td>
                                        <td class="month">Jun</td>
                                        <td class="month">Jul</td>
                                        <td class="month">Aug</td>
                                        <td class="month">Sep</td>
                                        <td class="month">Oct</td>
                                        <td class="month">Nov</td>
                                        <td class="month">Dec</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <table class="days-table w-100">
                                    <td class="day">Sun</td>
                                    <td class="day">Mon</td>
                                    <td class="day">Tue</td>
                                    <td class="day">Wed</td>
                                    <td class="day">Thu</td>
                                    <td class="day">Fri</td>
                                    <td class="day">Sat</td>
                                </table>
                                <div class="frame">
                                    <table class="dates-table w-100">
                                        <tbody class="tbody">
                                        </tbody>
                                    </table>
                                </div>
                                <button class="button" id="add-button">Thêm Hoạt Động</button>
                            </div>
                        </div>
                        <div class="events-container">
                        </div>
                        <div class="dialog" id="dialog">
                            <h2 class="dialog-header"> Thêm Hoạt Động </h2>
                            <div class="card-body">
                                @include('elements.alert')
                                <form
                                    method="POST"
                                    autocomplete="off"
                                    action="{!! route('app.store-activity') !!}"
                                    class="form-horizontal"
                                    enctype="multipart/form-data"
                                    id="form">
                                    @csrf
                                    <input type="hidden" name="date">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label class="col-form-label">Loại hoạt động</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="category_type" id="category_type" class="form-control">
                                                        <option selected value=2>Chọn loại hoạt động</option>
                                                        <option value=0>Thu</option>
                                                        <option value=1>Chi</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label class="col-form-label">Danh mục</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option selected value="">Chọn danh mục</option>
                                                        @foreach($datas as $d)
                                                            <option value="{{$d->category_id}}">{{$d->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label class="col-form-label" for="inputDescribe">Tên hoạt động</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control py-4" name="name"
                                                           placeholder="Tên hoạt động" id="name"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label class="col-form-label" for="inputMoneyAmount">Số tiền</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" class="form-control py-4" name="money_amount"
                                                           placeholder="Nhập số tiền" id="money_amount"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label class="col-form-label" for="inputDescribe">Mô tả</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control py-4" name="describe"
                                                           placeholder="Mô tả chi tiết" id="describe"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 mb-0">
                                        <button type="button" class="btn btn-primary btn-block" id="ok-button">Thêm Hoạt Động</button>
                                    </div>
                                </form>
                            </div>
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
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
