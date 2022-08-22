<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id_pengembalian'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $denda = $_POST['denda'];
    $id_peminjaman = $_POST['id_peminjaman'];

    $pengembalian = mysqli_query($conn, "UPDATE tbl_pengembalian SET id_pengembalian='$id', tgl_pengembalian='$tgl_pengembalian', denda='$denda', id_peminjaman='$id_peminjaman' WHERE id_pengembalian='$id'") or die(mysqli_error($conn));
    echo "<script>
           alert('Data Berhasil di Ubah');
           document.location.href = '../pages/pengembalian/dataPengembalian.php';
           </script>";
}