$(document).ready(function () {
    $('#table_jumlah_siswa').DataTable({
        "order": [[2, 'desc']]
    });

    chartJumlahSiswa = new Chart(document.getElementById("chart"), { 
        type: 'bar',
        data: {
            // labels: ["17-25", "26-35", "36-45", "46-55", "56-65",">65"],
            label : [],
            datasets: [{
                label: "Jumlah Siswa",
                 //backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#c45870"],
                 //data: [50,35,60,25,35,30],
                data: [],
                borderColor:  'rgb(54, 162, 235)',
                backgroundColor: 'rgba(54, 162, 235,0.1)',
                borderWidth: 2,
                borderRadius: 5
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Jumlah Siswa per Kelas'
            },
            indexAxis: 'y',
            plugins:{
                datalabels:{
                    anchor:'end',
                    align:'end',
                    labels:{
                        value:{
                            color:'white'
                        }
                    }
                }
            }
        }
    })
    ajax_ChartJumlahSiswa(chartJumlahSiswa);
    loadTableJumlahSiswa($('#table_jumlah_siswa'))
    jumlah_semua_siswa($('#jumlah_siswa'));
    jumlah_semua_guru($('#jumlah_guru'));
    jumlah_semua_akun($('#jumlah_akun'));
});

function loadTableJumlahSiswa(table) {
    url = currentClass + '/table_jumlah_siswa';

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
    })
    .fail(function() {
        console.log('error');
    })
    .always(function() {
        console.log('complete');
    })
}

function ajax_ChartJumlahSiswa(chart) {
    let url = currentClass + '/chart_jumlah_siswa';
    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            if (res.status) {
                chart.data.labels = res.labels;
                chart.data.datasets[0].data = res.data.jumlah;

                chart.update();
            }
        }
    });
}

function jumlah_semua_siswa(siswa) {
    let url = currentClass + '/jumlah_semua_siswa';
    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            if (res.status) {
                siswa.text(res.data[0].jumlah_siswa);
            }
        }
    });
}

function jumlah_semua_guru(guru) {
    let url = currentClass + '/jumlah_semua_guru';
    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            if (res.status) {
                guru.text(res.data[0].jumlah_guru);
            }
        }
    });
}

function jumlah_semua_akun(akun) {
    let url = currentClass + '/jumlah_semua_akun';
    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            if (res.status) {
                akun.text(res.data[0].jumlah_akun);
            }
        }
    });
}