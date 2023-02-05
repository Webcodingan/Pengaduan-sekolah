@include('admin.layouts.navbar')
@include('admin.layouts.sidedar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@include('admin.layouts.footer')
