var modal_form = $('#modal_DataSiswa');
var form_input = $('#form_DataSiswa input');
var form_id = '#form_DataSiswa';
var form_select_namaKelas = $('#nama_kelas');
var form_select_tingkat = $('#tingkat');
var table = $('#table_data_siswa');
var nama_module = 'data_siswa';

$(document).ready(function () {
    loadTableDataSiswa(table);
});

function loadTableDataSiswa(table) {
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
    $(form_id+' option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            nama_kelas = ['Rekayasa Perangkat Lunak', 'Teknik Komputer dan Jaringan', 'Desain Komunikasi dan Visual', 'Perbankan Syariah', 'Akuntansi'];
            tingkat = ['X', 'XI', 'XII'];
            if (res.status) {
                for (let i in nama_kelas) {
                    form_select_namaKelas.append('<option value="'+nama_kelas[i]+'">'+nama_kelas[i]+'</option>')
                }
                for (let i in tingkat) {
                    form_select_tingkat.append('<option value="'+tingkat[i]+'">'+tingkat[i]+'</option>')
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
    $(form_id+' option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            nama_kelas = ['Rekayasa Perangkat Lunak', 'Teknik Komputer dan Jaringan', 'Desain Komunikasi dan Visual', 'Perbankan Syariah', 'Akuntansi'];
            tingkat = ['X', 'XI', 'XII'];
            if (res.status) {
                //input
                $('#id').val(res.data.id);
                $('#nama_siswa').val(res.data.nama_siswa);

                // select
                for (let i in nama_kelas) {
                    form_select_namaKelas.prepend('<option value="'+nama_kelas[i]+'">'+nama_kelas[i]+'</option>')
                }
                for (let i in tingkat) {
                    form_select_tingkat.prepend('<option value="'+tingkat[i]+'">'+tingkat[i]+'</option>')
                }
                $('#nama_kelas').val(res.data.nama_kelas);
                $('#tingkat').val(res.data.tingkat);

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
            loadTableDataSiswa(table);
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
                        loadTableDataSiswa(table);
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