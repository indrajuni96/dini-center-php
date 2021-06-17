var t = $('#tableData').dataTable();

$(".tombol-hapus").on("click", function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data kelas akan di hapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

//Date picker
$('#datepicker').datepicker({
    autoclose: true
});

$(document).ready(function () {
    // Untuk milih Kelasnya, dari tahun ajaran dlu
    $('#idTahunSiswa').change(function () {
        var tahun = $(this).val();
        // var tahun = $('#idTahunSiswa').val();

        if (tahun == null) {
            // document.getElementById("idKelasMapel").disabled = true;
        } else {
            $.ajax({
                type: 'POST',
                url: '../asset/template/dist/php/pilihKelasSiswa.php',
                data: {
                    // 'semester': semester,
                    'tahun': tahun
                },
                success: function (response) {
                    $('#idKelasSiswa').html(response);
                }
            });

            console.log(semester + ' ' + tahun);
        }

    });

    // Untuk milih Kelasnya, dari tahun ajaran sama semester dlu
    $('#idSemesterMapel').change(function () {
        var semester = $(this).val();
        var tahun = $('#idTahunMapel').val();

        if (tahun == null) {
            // document.getElementById("idKelasMapel").disabled = true;
        } else {
            $.ajax({
                type: 'POST',
                url: '../asset/template/dist/php/pilihKelasSiswa.php',
                data: {
                    'semester': semester,
                    'tahun': tahun
                },
                success: function (response) {
                    $('#idKelasMapel').html(response);
                }
            });

            console.log(semester + ' ' + tahun);
        }

    })


    // Untuk milih Kelasnya, dari tahun ajaran  dlu
    $('#idTahunMapel').change(function () {
        var tahun = $(this).val();

        if (tahun == null) {
            // document.getElementById("idKelasMapel").disabled = true;
        } else {
            $.ajax({
                type: 'POST',
                url: '../asset/template/dist/php/pilihKelasSiswa.php',
                data: {
                    'tahun': tahun
                },
                success: function (response) {
                    $('#idKelasMapel').html(response);
                }
            });

            console.log(semester + ' ' + tahun);
        }

    })


});

$(document).ready(function () {
    $('#idTahunPenilaianSiswa').change(function () {
        var tahun = $(this).val();

        if (tahun == null) {
            // document.getElementById("idKelasMapel").disabled = true;
        } else {
            $.ajax({
                type: 'POST',
                url: '../asset/template/dist/php/pilihTahunPS.php',
                data: {
                    'tahun': tahun
                },
                success: function (response) {
                    $('#idGuruPenilaianSiswa').html(response);
                }
            });

            console.log(tahun);
        }

    })
});

$(document).ready(function () {
    $('#idSemesterPenilaianSiswa').change(function () {
        var semester = $(this).val();

        if (tahun == null) {
            // document.getElementById("idKelasMapel").disabled = true;
        } else {
            $.ajax({
                type: 'POST',
                url: '../asset/template/dist/php/pilihKelasPS.php',
                data: {
                    'semester': semester
                },
                success: function (response) {
                    $('#idKelasPenilaianSiswa').html(response);
                }
            });

            console.log(semester);
        }

    })
});