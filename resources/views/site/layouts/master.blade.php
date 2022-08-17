<!DOCTYPE html>
<html lang="{{\Illuminate\Support\Facades\App::getLocale()}}">
<head>
    @include('site.layouts.head')
</head>
<body @yield('body_style')>
<div class="scrollTop">
    <i class="fa-solid fa-angle-up"></i>
</div>
    @yield('content')
@include('site/layouts/footer')
@include('site/layouts/scripts')
@toastr_js
@toastr_render
@yield('site-js')
</body>
</html>




