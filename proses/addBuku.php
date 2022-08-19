<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {

    $kd_buku = $_POST['kd_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = $_POST['penulis_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $cekKdBuku = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_buku WHERE kd_buku='$kd_buku'"));
    if ($cekKdBuku > 0) {
        echo "<script>
        alert('Kode Buku Tidak Boleh Sama');
        document.location.href = '../pages/buku/inputBuku.php';
        </script>";
    } else {
        $buku = mysqli_query($conn, "INSERT INTO tbl_buku VALUES ('','$kd_buku','$judul_buku','$penulis_buku','$tahun_terbit')");
        echo "<script>
        alert('Data Berhasil di Simpan');
        document.location.href = '../pages/buku/dataBuku.php';
        </script>";
    }
}