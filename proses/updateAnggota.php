<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id_anggota'];
    $kd_anggota = $_POST['kd_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $jk = $_POST['jk'];
    $no_telp_anggota = $_POST['no_telp_anggota'];
    $alamat_anggota = $_POST['alamat_anggota'];

    $anggota = mysqli_query($conn, "UPDATE tbl_anggota SET id_anggota='$id', kd_anggota='$kd_anggota', nama_anggota='$nama_anggota', jk='$jk', no_telp_anggota='$no_telp_anggota', alamat_anggota='$alamat_anggota' WHERE id_anggota='$id'") or die(mysqli_error($conn));
    echo "<script>
           alert('Data Berhasil di Ubah');
           document.location.href = '../pages/anggota/dataAnggota.php';
           </script>";
}