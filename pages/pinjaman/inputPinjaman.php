<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/stylePinjaman.css">
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
                        <h3>Input Data Pinjaman</h3>
                    </div>
                    <div id="beranda-konten">

                        <form action="../../proses/addPinjaman.php" method="post">
                            <div class="row">
                                <label>Tanggal Peminjaman</label>
                                <input type="date" name="tgl_pinjam" required>
                            </div>
                            <div class="row">
                                <label>Tanggal Pengembalian</label>
                                <input type="date" name="tgl_kembali" required><br>
                            </div>
                            <div class="row">
                                <label>ID Buku</label>
                                <select name="id_buku">
                                    <?php
                                    require '../../proses/koneksi.php';
                                    $buku = mysqli_query($conn, "SELECT * FROM tbl_buku ORDER BY id_buku ASC");
                                    while ($bku = mysqli_fetch_array($buku)) {
                                    ?>
                                    <option value="<?= $bku['id_buku']; ?>"><?= $bku['id_buku']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row">
                                <label>ID Anggota</label>
                                <select name="id_anggota">
                                    <?php
                                    require '../../proses/koneksi.php';
                                    $anggota = mysqli_query($conn, "SELECT * FROM tbl_anggota ORDER BY id_anggota ASC");
                                    while ($agt = mysqli_fetch_array($anggota)) {
                                    ?>
                                    <option value="<?= $agt['id_anggota']; ?>"><?= $agt['id_anggota']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button class="button" type="Submit" name="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">Sistem Informasi Perpustakaan</div>
    </div>
</body>

</html>