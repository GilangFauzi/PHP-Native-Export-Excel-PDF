<?php
require 'proses/koneksi.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


$spreadsheet = new Spreadsheet();

// style JUDUL
$spreadsheet->getActiveSheet()
    ->setCellValue('A1', "LAPORAN TRANSAKSI");

$spreadsheet->getActiveSheet()
    ->mergeCells("A1:G1");

$spreadsheet->getActiveSheet()
    ->getStyle('A1')
    ->getFont()
    ->setSize(15);

$spreadsheet->getActiveSheet()
    ->getStyle('A1')
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

// style lebar kolom
$spreadsheet->getActiveSheet()
    ->getColumnDimension('A')
    ->setWidth(5);
$spreadsheet->getActiveSheet()
    ->getColumnDimension('B')
    ->setWidth(18);
$spreadsheet->getActiveSheet()
    ->getColumnDimension('C')
    ->setWidth(18);
$spreadsheet->getActiveSheet()
    ->getColumnDimension('D')
    ->setWidth(25);
$spreadsheet->getActiveSheet()
    ->getColumnDimension('E')
    ->setWidth(15);
$spreadsheet->getActiveSheet()
    ->getColumnDimension('F')
    ->setWidth(15);
$spreadsheet->getActiveSheet()
    ->getColumnDimension('G')
    ->setWidth(15);

$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'Tanggal Pinjam');
$sheet->setCellValue('C2', 'Tanggal Kembali');
$sheet->setCellValue('D2', 'Tanggal Pengembalian');
$sheet->setCellValue('E2', 'Denda');
$sheet->setCellValue('F2', 'ID Buku');
$sheet->setCellValue('G2', 'ID Anggota');


$query = "SELECT * FROM tbl_pengembalian INNER JOIN tbl_peminjaman ON
tbl_pengembalian.id_peminjaman = tbl_peminjaman.id_peminjaman";
$result = mysqli_query($conn, $query);
$i = 3;
$no = 1;
while ($row = mysqli_fetch_array($result)) {
    $sheet->setCellValue('A' . $i, $no++);
    $sheet->setCellValue('B' . $i, $row['tgl_pinjam']);
    $sheet->setCellValue('C' . $i, $row['tgl_kembali']);
    $sheet->setCellValue('D' . $i, $row['tgl_pengembalian']);
    $sheet->setCellValue('E' . $i, $row['denda']);
    $sheet->setCellValue('F' . $i, $row['id_buku']);
    $sheet->setCellValue('G' . $i, $row['id_anggota']);
    $i++;
}


$i = $i - 1;
$styleArray = [
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$sheet->getStyle('A2:G' . $i)->applyFromArray($styleArray);

// $writer = new Xlsx($spreadsheet);
// $writer->save('Report Data Transaksi.xlsx');
// redirect to the file
// echo "<meta http-equiv='refresh' content='0;url=Report Data Transaksi.xlsx'/>";

// NEW SAVE
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header('Content-Disposition: attachment;filename="Laporan Transaksi.xlsx"');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');