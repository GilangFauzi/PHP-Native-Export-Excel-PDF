<?php
require '../../proses/koneksi.php';

$query = "SELECT * FROM tbl_pengembalian ";
// $query = "SELECT tbl_anggota.id_anggota, tbl_buku.kd_buku
// FROM tbl_anggota
// INNER JOIN buku ON tbl_anggota.id_buku = tbl_buku.id_buku";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/styleDataBuku.css">
</head>

<body>
    <div id="container">
        <div id="header-top">
            <div id="title-container">
                <div class="subtitle-container">
                    <h1 class="judul">PERPUSTAKAAN UMUM</h1>
                </div>
                <div class="subtitle-container">
                    Jl. Pendidikan No.10 Desa Babakan Kelurahan Rumpin Kota Tangerang Kabupaten Bogor
                </div>
            </div>
        </div>
        <div id="header2-top">
            <h3>
                <marquee behavior="alternate" height="50" scrollamount="6">Hallo Gilang Fauzi
                </marquee>
            </h3>
        </div>
        <div id="sidebar">
            <a href="../../index.php">Beranda</a>
            <p class="label-navigasi">Data Master</p>
            <ul>
                <li><a href="../anggota/dataAnggota.php">Data Anggota</a></li>
                <li><a href="../buku/dataBuku.php">Data Buku</a></li>
            </ul>
            <p class="label-navigasi">Data Transaksi</p>
            <ul>
                <li><a href="../pinjaman/dataPinjaman.php">Transaksi Pinjaman</a></li>
                <li><a href="../pengembalian/dataPengembalian.php">Transaksi Pengembalian</a></li>
            </ul>
            <p class="label-navigasi">Laporan Transaksi</p>
            <ul>
                <li><a href="../../cetakTransaksi.php">Cetak Laporan Transaksi</a></li>
            </ul>
            <a href="#">Logout</a>
        </div>
        <div id="content-container">
            <div class="container">
                <div class="row">
                    <br>
                    <div id="label-page">
                        <h3>Tampilan Data Pengembalian</h3>
                    </div>
                    <div id="beranda-konten">
                        <a href="../pengembalian/inputPengembalian.php" class="button">Tambah Data Pengembalian</a>
                        <form action="post" action="">
                            <table id="customers">
                                <tr>
                                    <th width="30px">No</th>
                                    <th width="90px">Tanggal Pengembalian</th>
                                    <th width="90px">Denda</th>
                                    <th width="20px">ID Peminjaman</th>
                                    <th width="20px">Opsi</th>
                                </tr>
                                <?php
                                // $sql = "SELECT * FROM tbl_peminjaman INNER JOIN tbl_anggota ON
                                // tbl_peminjaman.id_anggota = tbl_anggota.id_anggota";
                                $i = 1;
                                $result = mysqli_query($conn, $query);
                                while ($pengembalian = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $pengembalian['tgl_pengembalian']; ?></td>
                                    <td><?php echo $pengembalian['denda']; ?></td>
                                    <td><?php echo $pengembalian['id_peminjaman']; ?></td>
                                    <td>
                                        <a href="#" type="submit" class="buttonEdit">Edit</a>
                                        <a href="#" type="submit" class="buttonHapus">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">Sistem Informasi Perpustakaan</div>
    </div>

    <script src="../../assets/package/dist/sweetalert2.all.js"></script>
</body>

</html>