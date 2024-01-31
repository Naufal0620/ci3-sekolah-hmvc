var table = $('#table_user_akun');

$(document).ready(function () {
    loadTableUserAkun(table);
});

function loadTableUserAkun(table) {
    url = currentClass + '/table_user_akun';

    $('.addBtn').remove();

    table.DataTable().clear();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        
    })
    .done(function(res) {
        if (res.status) {
            for (let i in res.data) {
                table.DataTable().row.add(res.data[i]).draw();
            }
        }
        $('.card-body').prepend(res.addbtn);
    })
    .fail(function() {
        console.log('error');
    })
    .always(function() {
        console.log('load table complete');
    })
}

$(document).on('click', '.addBtn', function (e) {
    e.preventDefault();
    console.log('addbtn di klik');
    let form_data = $('#form_UserAkun input');
    let form_tipe_akun = $('#tipe_akun');
    let url = currentClass + '/tambah_user_akun/';

    form_data.val('');
    $('.saveBtn').empty();
    $('#tipe_akun option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            tipe_akun = ['admin', 'guru', 'siswa'];
            if (res.status) {
                for (let i in tipe_akun) {
                    form_tipe_akun.append('<option value="'+tipe_akun[i]+'">'+tipe_akun[i]+'</option>')
                }
                $('.saveBtn').html('Tambah');
                $('#modal_UserAkun').modal('show');
            } else {

            }
        }
    });
})

$(document).on('click', '.editBtn', function () {
    console.log('btn edit');
    let form_id = $(this).data('id');
    let form_data = $('#form_UserAkun input');
    let form_tipe_akun = $('#tipe_akun');
    let url = currentClass + '/edit_user_akun/' + form_id;

    form_data.val('');
    $('#tipe_akun option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            tipe_akun = ['admin', 'guru', 'siswa'];
            if (res.status) {
                $('#id').val(res.data.id);
                $('#username').val(res.data.username);
                $('#password').val(res.data.password);
                for (let i in tipe_akun) {
                    form_tipe_akun.prepend('<option value="'+tipe_akun[i]+'">'+tipe_akun[i]+'</option>')
                }
                $('#tipe_akun').val(res.data.tipe_akun);
                $('.saveBtn').html('Update');
                $('#modal_UserAkun').modal('show');
            } else {

            }
        }
    });
});

$(document).on('click', '.saveBtn', function () {
    let url = currentClass + '/simpan_user_akun';
    let formData = new FormData($('#form_UserAkun')[0]);
    
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",

    })
    .done(function (res) {
        if (res.status) {
            Swal.fire({
                title: "Berhasil!",
                text: res.msg,
                icon: "success"
            });
            $('#modal_UserAkun').modal('hide');
            loadTableUserAkun(table);
        } else {
            Swal.fire({
                title: "Gagal!",
                text: res.msg,
                icon: "warning"
            });
        }
    })
    .fail(function () { 
        Swal.fire({
            title: "Gagal!",
            text: 'Terjadi kesalahan dalam sistem!',
            icon: "error"
        });
    })
});

$(document).on('click', '.deleteBtn', function () {
    let id = $(this).data('id');
    let url = currentClass + '/hapus_user_akun/' + id;

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Batal",
        confirmButtonText: "Ya, hapus!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: url,
                data: "",
                dataType: "JSON",
                success: function (res) {
                    if (res.status) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success"
                        });
                        loadTableUserAkun(table);
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error"
                        });
                    }
                }
            });
        }
    });
});