<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id_peminjaman'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];

    $peminjaman = mysqli_query($conn, "UPDATE tbl_peminjaman SET id_peminjaman='$id', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', id_buku='$id_buku', id_anggota='$id_anggota' WHERE id_peminjaman='$id'") or die(mysqli_error($conn));
    echo "<script>
           alert('Data Berhasil di Ubah');
           document.location.href = '../pages/pinjaman/dataPinjaman.php';
           </script>";
}