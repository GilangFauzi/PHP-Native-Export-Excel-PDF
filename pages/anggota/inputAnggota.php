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
                        <h3>Input Data Anggota</h3>
                    </div>
                    <div class="form">
                        <form action="../../proses/addAnggota.php" method="post">
                            <p>
                                <label for="">Kode Anggota</label>
                                <input type="text" name="kd_anggota" value="AGT" required>
                            </p>
                            <p>
                                <label for="">Nama</label>
                                <input type="text" name="nama_anggota" required placeholder="Masukan Nama Anggota">
                            </p>
                            <p>
                                <label for="">Jenis Kelamin</label>
                                <input type="radio" value="Laki-laki" checked="checked" name="jk">Laki-laki
                                <input type="radio" value="Perempuan" name="jk">Perempuan
                            </p>
                            <p>
                                <label for="">Nomor Telepon</label>
                                <input type="text" name="no_telp_anggota" required placeholder="Ex:085523xxxx"
                                    onkeypress="return hanyaAngka(event)">
                            </p>
                            <p>
                                <label for="">Alamat</label>
                                <textarea id="" cols="30" rows="7" name="alamat_anggota" required
                                    aria-valuetext="Mau"></textarea>
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