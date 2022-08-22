<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id_buku'];
    $kd_buku = $_POST['kd_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = $_POST['penulis_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $buku = mysqli_query($conn, "UPDATE tbl_buku SET id_buku='$id', kd_buku='$kd_buku', judul_buku='$judul_buku', penulis_buku='$penulis_buku', tahun_terbit='$tahun_terbit' WHERE id_buku='$id'") or die(mysqli_error($conn));
    echo "<script>
           alert('Data Berhasil di Ubah');
           document.location.href = '../pages/buku/dataBuku.php';
           </script>";
}