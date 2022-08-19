<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $kd_anggota = $_POST['kd_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $jk = $_POST['jk'];
    $no_telp_anggota = $_POST['no_telp_anggota'];
    $alamat_anggota = $_POST['alamat_anggota'];

    $query = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_anggota WHERE kd_anggota='$kd_anggota'"));
    if ($query > 0) {
        echo "<script>
            alert('Kode Anggota Tidak Boleh Sama');
            document.location.href = '../pages/anggota/inputAnggota.php';
            </script>";
    } else {
        $anggota = mysqli_query($conn, "INSERT INTO tbl_anggota VALUES ('','$kd_anggota','$nama_anggota','$jk','$no_telp_anggota','$alamat_anggota')");
        echo "<script>
           alert('Data Berhasil di Simpan');
           document.location.href = '../pages/anggota/dataAnggota.php';
           </script>";
    }
}