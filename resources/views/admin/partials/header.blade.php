<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UAE Berlin Embassy Website Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('public/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('public/admin/') }}/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('public/admin/') }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('public/admin/') }}/images/favicon.png" />

    <!-- include summernote css/js -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Material Design Bootstrap -->
    <link href="{{ asset('public/admin/mdbootstrap') }}/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('public/admin/mdbootstrap') }}/css/style.css" rel="stylesheet">

    <style>
        .form-control { border: 1px solid #a7a7a7; }
        .note-popover.popover { display: none; }
        .ui-widget.ui-widget-content { z-index: 1000 !important;}
        .content-wrapper {
            background: #696969;
        }
        .navbar.default-layout {
            background: #2a2a2a;
        }
        .type-box {
            display: none;
        }
        .type-box.active {
            display: block;
        }
        .file-upload {
            position: relative;
        }
        .remove-box {
            position: absolute;
            top: 0;
            right: 0;
        }
        .sidebar .nav .nav-item .nav-link {
            align-items: center;
            display: flex;
            padding: 6px 15px;
            white-space: nowrap;
            height: 42px;
            color: #4a4a4a;
        }
        .note-btn-group .btn.btn-sm {
            padding: 5px;
            font-size: 12px;
        }
        
        .sidebar .nav.sub-menu {
            margin-bottom: 0;
            padding: 0 0 0 15px;
        }
        .sidebar .nav .nav-item .nav-link .menu-icon {
            margin-right: 10px;
        }
        .sidebar .nav .nav-item .nav-link {
            padding: 6px 5px;
        }
    </style>

    @yield('css')
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-left" style="border-bottom:1px solid #ccc">
            <a href="#" style="color: #8e8e8e; font-size: 26px; margin-top:10px; text-align:left;padding-left: 40px;">CMS Admin</a>
        </div>
        <div class="navbar-menu-wrapper align-items-center">
            <a href="{{ url('logout') }}" style="float:right; color: #fff; margin-top:20px">Logout</a>
        </div>
    </nav>
