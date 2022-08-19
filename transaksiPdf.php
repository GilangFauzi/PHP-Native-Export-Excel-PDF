<?php
ob_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    td {
        padding: 3px 3px;
    }
    </style>
    <title>Laporan Transaksi</title>
</head>

<body>
    <h3 align="center">Laporan Transaksi</h3>
    <table style="border-collapse:collapse;border-spacing:0;" align="center" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Tanggal Pengembalian</th>
                <th>Denda</th>
                <th>ID Buku</th>
                <th>ID Anggota</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'proses/koneksi.php';

            $query = "SELECT * FROM tbl_pengembalian INNER JOIN tbl_peminjaman ON
            tbl_pengembalian.id_peminjaman = tbl_peminjaman.id_peminjaman";
            $result = mysqli_query($conn, $query);

            $i = 1;
            while ($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td align="center"><?= $i++; ?></td>
                <td align="center"><?= $data['tgl_pinjam'] ?></td>
                <td align="center"><?= $data['tgl_kembali'] ?></td>
                <td align="center"><?= $data['tgl_pengembalian'] ?></td>
                <td align="center"><?= $data['denda'] ?></td>
                <td align="center"><?= $data['id_buku'] ?></td>
                <td align="center"><?= $data['id_anggota'] ?></td>
            </tr>
            <?php
            }
            // die;
            ?>

        </tbody>
    </table>
</body>

</html>
<?php
require 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'margin_top' => 25, 'margin_bottom' => 25, 'margin_left' => 25, 'margin_right' => 25]);

$html = ob_get_contents();

ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));

// biar langsung download
// $content = $mpdf->Output("Laporan-Transaksi.pdf", "D");

// biar bisa di view dulu
$mpdf->Output('Laporan Transaksi.pdf', \Mpdf\Output\Destination::INLINE);
?>