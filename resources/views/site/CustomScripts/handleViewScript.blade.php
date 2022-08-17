<script>

$("#navbar-toggler").on("click", function () {
    $(".navTop").toggleClass("active")
})
var frameOfPage = $("#frame");
$(".myShareBtn").click(function () {
    var url = $(this).attr('data-url'),
        siteId = $(this).attr('data-site-id');
    frameOfPage.attr("src", url);
    CheckView(siteId, frameOfPage.attr('src'));
});


function HideFrame(row_id, btn_src) {
    var frameSrc = frameOfPage.attr('src');
    $("#row" + row_id).fadeOut();
    if (frameSrc === btn_src) {
        frameOfPage.attr("src", '');
    }
    // toastr.success('تم تخطي المنشور');
}

function CheckView(site_id, frame_src) {
    setTimeout(ajaxStoreView, 10000); //10000 MS == 10 seconds
    function ajaxStoreView() {
        var frameSrc = frameOfPage.attr('src');
        if (frameSrc == frame_src) {
            //do AJAX
            $.ajax({
                url: "{{route('checkUserView')}}",
                type: 'POST',
                data: {
                    "site_id": site_id
                },
                success: function (data) {
                    if (data.status === 200) {
                        toastr.success(`تم اضافة ${data.points} نقطة لرصيدك`);
                        HideFrame(data.row_id, data.btn_src);
                    } else {
                        toastr.error('هناك خطأ ما..');
                    }

                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('هناك خطأ ما..');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value, key);
                                });
                            }
                        });
                    } else {
                        toastr.error('هناك خطأ ما..');
                    }
                },//end error method
            });
        }

    }
}
</script>
