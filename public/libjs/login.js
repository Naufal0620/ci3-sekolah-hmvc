$(document).ready(function () {
    $('#alertLogin').empty();
    $('#btnLogin').on('click', function (e) {
        e.preventDefault();
        var url = currentClass + '/do_login';
        var formData = new FormData($('#form_login')[0]);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,

        })
        .done(function(res) {
            if(res.status == false) {
                $('#alertLogin').addClass('alert alert-danger');
                $('#alertLogin').html(res.msg);
            } else {
                $('#alertLogin').html(res.msg);
                $('#alertLogin').addClass('alert alert-success');
                window.location.href = site_url + '/dashboard';
            }
        })
        .fail(function () {
            console.log('error');
            $('#alertLogin').addClass('alert alert-danger');
                $('#alertLogin').html('Terjadi kesalahan pada proses login');
        })
        .always(function() {
            console.log("complete");
        })
    });
});

// $(document).on('click', '#btnLogin', function() {
//     let url = currentClass + '/do_login';
//     let formData = new FormData($('#form_login')[0]);
//     // let namaUser = $('#username').val();
//     // let passUser = $('#password').val();
//     let alert = $('.alertLogin');
//     alert.empty();
//     $.ajax({
//         type: 'POST',
//         url: url,
//         contentType: false,
//         processData: false,
//         data: formData,
//         dataType: 'JSON',
//         success: function (respon) {
//             if (respon.status) {
//                 $('#alertLogin').html(respon.msg);
//                 $('#alertLogin').addClass('alert alert-success');
//             } else {
//                 $('#alertLogin').html(respon.msg);
//                 $('#alertLogin').addClass('alert alert-danger');
//                 // alert.removeClass('d-none').html(respon.msg);
//             }
//             console.log(respon);
//         },
//     });
//     console.log('btn di klik');
// });