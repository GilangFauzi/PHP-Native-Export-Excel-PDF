<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {

    $tgl_pengembalian = date('Y-m-d', strtotime($_POST['tgl_pengembalian']));
    $denda = $_POST['denda'];
    $id_peminjaman = $_POST['id_peminjaman'];

    $pinjaman = mysqli_query($conn, "INSERT INTO tbl_pengembalian VALUES ('','$tgl_pengembalian','$denda','$id_peminjaman')");
    // echo "mysqli_error($conn)";
    // die;
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
        alert('Data Berhasil di Simpan');
        document.location.href = '../pages/pengembalian/dataPengembalian.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal di Simpan');
        document.location.href = '../pages/pengembalian/inputPengembalian.php';
        </script>";
    }
}