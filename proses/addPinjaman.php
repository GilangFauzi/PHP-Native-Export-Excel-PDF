<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {

    $tgl_pinjam = date('Y-m-d', strtotime($_POST['tgl_pinjam']));
    $tgl_kembali = date('Y-m-d', strtotime($_POST['tgl_kembali']));
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];

    $pinjaman = mysqli_query($conn, "INSERT INTO tbl_peminjaman VALUES ('','$tgl_pinjam','$tgl_kembali','$id_buku','$id_anggota')");
    // echo "mysqli_error($conn)";
    // die;
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
        alert('Data Berhasil di Simpan');
        document.location.href = '../pages/pinjaman/dataPinjaman.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal di Simpan');
        document.location.href = '../pages/pinjaman/inputPinjaman.php';
        </script>";
    }
}