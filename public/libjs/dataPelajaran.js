var modal_form = $('#modal_DataPelajaran');
var form_input = $('#form_DataPelajaran input');
var form_id = '#form_DataPelajaran';

var form_select_namaPelajaran = $('#nama_pelajaran');
var form_select_guruPengajar = $('#guru_pengajar');
var form_select_namaKelas = $('#nama_kelas');
var form_select_tingkat = $('#tingkat');
var form_select_hari = $('#hari');

var table = $('#table_data_pelajaran');
var nama_module = 'data_pelajaran';

$(document).ready(function () {
    loadTableDataPelajaran(table);
});

function loadTableDataPelajaran(table) {
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
        } else {
            table.DataTable().destroy();
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
            nama_pelajaran = ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PKN', 'Sejarah', 'Agama Islam'];
            nama_kelas = ['Rekayasa Perangkat Lunak', 'Teknik Komputer dan Jaringan', 'Desain Komunikasi dan Visual', 'Perbankan Syariah', 'Akuntansi'];
            tingkat = ['X', 'XI', 'XII'];
            hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
            if (res.status) {
                for (let i in nama_pelajaran) {
                    form_select_namaPelajaran.append('<option value="'+nama_pelajaran[i]+'">'+nama_pelajaran[i]+'</option>')
                };
                for (let i in res.guru_pengajar) {
                    form_select_guruPengajar.append('<option value="'+res.guru_pengajar[i].guru+'">'+res.guru_pengajar[i].guru+'</option>')
                };
                for (let i in nama_kelas) {
                    form_select_namaKelas.append('<option value="'+nama_kelas[i]+'">'+nama_kelas[i]+'</option>')
                };
                for (let i in tingkat) {
                    form_select_tingkat.append('<option value="'+tingkat[i]+'">'+tingkat[i]+'</option>')
                };
                for (let i in hari) {
                    form_select_hari.append('<option value="'+hari[i]+'">'+hari[i]+'</option>')
                };
                console.log(res.guru_pengajar);
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
            nama_pelajaran = ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PKN', 'Sejarah', 'Agama Islam'];
            nama_kelas = ['Rekayasa Perangkat Lunak', 'Teknik Komputer dan Jaringan', 'Desain Komunikasi dan Visual', 'Perbankan Syariah', 'Akuntansi'];
            tingkat = ['X', 'XI', 'XII'];
            hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
            if (res.status) {
                //input
                $('#id').val(res.data.id);
                $('#jam_mulai').val(res.data.jam_mulai);
                $('#jam_selesai').val(res.data.jam_selesai);

                // select
                for (let i in nama_pelajaran) {
                    form_select_namaPelajaran.append('<option value="'+nama_pelajaran[i]+'">'+nama_pelajaran[i]+'</option>')
                };
                for (let i in nama_kelas) {
                    form_select_namaKelas.prepend('<option value="'+nama_kelas[i]+'">'+nama_kelas[i]+'</option>')
                };
                for (let i in res.guru_pengajar) {
                    form_select_guruPengajar.append('<option value="'+res.guru_pengajar[i].guru+'">'+res.guru_pengajar[i].guru+'</option>')
                };
                for (let i in tingkat) {
                    form_select_tingkat.prepend('<option value="'+tingkat[i]+'">'+tingkat[i]+'</option>')
                };
                for (let i in hari) {
                    form_select_hari.prepend('<option value="'+hari[i]+'">'+hari[i]+'</option>')
                };
                $('#nama_pelajaran').val(res.data.nama_pelajaran);
                $('#guru_pengajar').val(res.data.guru_pengajar);
                $('#nama_kelas').val(res.data.nama_kelas);
                $('#tingkat').val(res.data.tingkat);
                $('#hari').val(res.data.hari);

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
            loadTableDataPelajaran(table);
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
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error"
                        });
                    }
                    console.log(res);
                    setTimeout(function() {
                        loadTableDataPelajaran(table);
                    }, 1000);
                }
            });
        }
    });
});