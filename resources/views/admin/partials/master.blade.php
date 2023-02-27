@include('admin.partials.header')
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
@include('admin.partials.nav')
<!-- partial -->
    @yield('content')
</div>

@include('admin.partials.footer')


