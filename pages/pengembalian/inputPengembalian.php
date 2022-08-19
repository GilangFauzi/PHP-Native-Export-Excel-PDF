<?php
require '../../proses/koneksi.php';

$query = "SELECT * FROM tbl_peminjaman";
// $query = "SELECT * FROM tbl_peminjaman INNER JOIN tbl_anggota ON
//         tbl_peminjaman.id_anggota = tbl_anggota.id_anggota";

// $query = "SELECT * FROM tbl_pengembalian INNER JOIN tbl_peminjaman ON
//         tbl_pengembalian.id_peminjaman = tbl_peminjaman.id_peminjaman

//         ";

// $sql = "SELECT * FROM tbl_buku";

// $buku = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/stylePengembalian.css">
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
                        <h3>Input Data Pengembalian</h3>
                    </div>
                    <div class="form">
                        <form action="../../proses/addPengembalian.php" method="post">
                            <p>
                                <label>Denda</label>
                                <input type="text" name="denda" required placeholder="Masukan Denda">
                            </p>
                            <p>
                                <label>ID Peminjaman</label>
                                <select name="id_peminjaman">
                                    <?php
                                    while ($pengembalian = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?= $pengembalian['id_peminjaman']; ?>">
                                        <?= $pengembalian['id_peminjaman']; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label>Tanggal Pengembalian</label>
                                <input type="date" name="tgl_pengembalian">
                            </p>

                            <p>
                                <button type="submit" name="submit">Simpan</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">Sistem Informasi Perpustakaan</div>
    </div>
</body>

</html>