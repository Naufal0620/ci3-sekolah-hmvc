var modal_form = $('#modal_DataGuru');
var form_input = $('#form_DataGuru input');
var form_id = '#form_DataGuru';
var form_select_bidangKeahlian = $('#bidang_keahlian');
var form_select_gelar = $('#gelar');
var table = $('#table_data_guru');
var nama_module = 'data_guru';

$(document).ready(function () {
    loadTableDataGuru(table);
});

function loadTableDataGuru(table) {
    url = currentClass + '/table_' + nama_module;

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

    let url = currentClass + '/tambah_' + nama_module;

    form_input.val('');
    $(form_id + ' option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            bidang_keahlian = ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PKN', 'Sejarah', 'Agama Islam'];
            if (res.status) {
                for (let i in bidang_keahlian) {
                    form_select_bidangKeahlian.append('<option value="'+bidang_keahlian[i]+'">'+bidang_keahlian[i]+'</option>')
                }
                $('.saveBtn').html('Tambah');
                modal_form.modal('show');
            } else {

            }
        }
    });
})

$(document).on('click', '.editBtn', function (e) {
    e.preventDefault();
    
    console.log('editbtn di klik');
    let id = $(this).data('id');
    let url = currentClass + 'edit_' + nama_module + '/' + id;

    form_input.val('');
    $(form_id + ' option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            bidang_keahlian = ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PKN', 'Sejarah', 'Agama Islam'];
            if (res.status) {
                //input
                $('#id').val(res.data.id);
                $('#nama_guru').val(res.data.nama_guru);
                $('#gelar').val(res.data.gelar);

                // select
                for (let i in bidang_keahlian) {
                    form_select_bidangKeahlian.prepend('<option value="'+bidang_keahlian[i]+'">'+bidang_keahlian[i]+'</option>')
                }
                $('#bidang_keahlian').val(res.data.bidang_keahlian);

                // etc
                console.log(res);
                $('.saveBtn').html('Update');
                modal_form.modal('show');
            } else {

            }
        }
    });
})

$(document).on('click', '.saveBtn', function () {
    let url = currentClass + 'simpan_' + nama_module;
    let formData = new FormData($(form_id)[0]);
    
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
            modal_form.modal('hide');
            loadTableDataGuru(table);
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
    let url = currentClass + 'hapus_' + nama_module + '/' + id;

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
                        loadTableDataGuru(table);
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