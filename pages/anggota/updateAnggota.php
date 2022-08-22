<?php
require '../../proses/koneksi.php';
$id = $_GET['id_anggota'];
$anggota = mysqli_query($conn, "SELECT * FROM tbl_anggota WHERE id_anggota='$id'");

function active_radio_button($value, $input)
{
    $result = $value == $input ? 'checked' : '';
    return $result;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/styleAnggota.css">
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
                        <h3>Update Data Anggota</h3>
                    </div>
                    <div class="form">
                        <form action="../../proses/updateAnggota.php" method="post">
                            <?php while ($agt = mysqli_fetch_array($anggota)) { ?>
                            <input type="hidden" name="id_anggota" value="<?= $agt['id_anggota'] ?>">
                            <p>
                                <label for="">Kode Anggota</label>
                                <input type="text" name="kd_anggota" value="<?= $agt['kd_anggota'] ?>" readonly>
                            </p>
                            <p>
                                <label for="">Nama</label>
                                <input type="text" name="nama_anggota" value="<?= $agt['nama_anggota']; ?>">
                            </p>
                            <p>
                                <label for="">Jenis Kelamin</label>
                                <input type="radio" value="Laki-laki" name="jk"
                                    <?= active_radio_button('Laki-laki', $agt['jk']); ?>>Laki-laki
                                <input type="radio" value="Perempuan" name="jk"
                                    <?= active_radio_button('Perempuan', $agt['jk']); ?>>Perempuan
                            </p>
                            <p>
                                <label for="">Nomor Telepon</label>
                                <input type="text" name="no_telp_anggota" value="<?= $agt['no_telp_anggota']; ?>"
                                    onkeypress="return hanyaAngka(event)">
                            </p>
                            <p>
                                <label for="">Alamat</label>
                                <textarea id="" cols="30" rows="7" name="alamat_anggota" required
                                    aria-valuetext="Mau"><?= $agt['alamat_anggota']; ?></textarea>
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
    <script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
    </script>
</body>

</html>