<script src="{{asset('assets/site/JS')}}/popper.min.js"></script>
<script src="{{asset('assets/site/JS')}}/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{asset('assets/site/JS')}}/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/site/JS')}}/all.min.js"></script>
@toastr_js
@toastr_render
<script>
    window.addEventListener('online', () =>{
        // window.location.reload();
        toastr.success('تم استعادة الاتصال بالانترنت');
    });
    window.addEventListener('offline', () =>{
        toastr.error('انقطع الاتصال , يرجي التحقق من جودة الانترنت لديك');
    });
</script>
<script src="{{asset('assets/admin')}}/assets/iconfonts/eva.min.js"></script>
@yield('site_js')
