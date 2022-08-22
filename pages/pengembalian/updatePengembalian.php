<?php
require '../../proses/koneksi.php';
$id_pengembalian = $_GET['id_pengembalian'];
$query = "SELECT * FROM tbl_pengembalian WHERE id_pengembalian='$id_pengembalian'";
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
                        <h3>Update Data Pengembalian</h3>
                    </div>
                    <div class="form">
                        <form action="../../proses/updatePengembalian.php" method="post">
                            <?php
                            while ($pengembalian = mysqli_fetch_array($result)) {
                            ?>
                            <input type="hidden" name="id_pengembalian" value="<?= $pengembalian['id_pengembalian'] ?>">
                            <p>
                                <label>Denda</label>
                                <input type="text" name="denda" value="<?= $pengembalian['denda'] ?>">
                            </p>
                            <p>
                                <label>ID Peminjaman</label>
                                <select name="id_peminjaman">
                                    <option value="<?= $pengembalian['id_peminjaman']; ?>" selected>
                                        <?= $pengembalian['id_peminjaman']; ?></option>
                                    <?php
                                        $result2 = mysqli_query($conn, "SELECT * FROM tbl_pengembalian");
                                        while ($kembali = mysqli_fetch_array($result2)) {
                                        ?>
                                    <option value="<?= $kembali['id_peminjaman']; ?>">
                                        <?= $kembali['id_peminjaman']; ?> </option>
                                    <?php
                                        }
                                        ?>
                                </select>
                            </p>
                            <p>
                                <label>Tanggal Pengembalian</label>
                                <input type="date" name="tgl_pengembalian"
                                    value="<?= $pengembalian['tgl_pengembalian'] ?>">
                            </p>
                            <?php } ?>
                            <p>
                                <button type="submit" name="submit">Ubah</button>
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