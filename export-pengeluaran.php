<?php
// Include the mpdf library
require_once 'vendor/vendor/autoload.php'; // Sesuaikan path sesuai struktur proyek Anda

// Create an instance of the mPDF class
$mpdf = new \Mpdf\Mpdf();

// Start buffering the output
ob_start();

// HTML content for the PDF
?>
<style>
    h1,
    h4 {
        text-align: center;
    }

    hr.custom-line {
        margin-top: 0px;
        /* Atur jarak di atas garis */
        margin-bottom: 20px;
        /* Atur jarak di bawah garis */
        border: 0;
        border-top: 1px solid #000;
        /* Ganti warna dan tipe garis sesuai kebutuhan */
    }

    .right-info {
        float: right;
        text-align: right;
        padding-top: 100px;
    }
</style>

<h1>CV METRO TANI</h1>
<h4>Jl. Sutan Syahrir No.215, Mata Air</h4>
<h4>Kec. Padang Selatan., Kota Padang, Sumatera Barat 25121</h4>
<hr class="custom-line">

<table border="1" cellpadding="5" style="margin: 0 auto;">
    <tr>
        <th>No</th>
        <th>Tgl Pengeluaran</th>
        <th>Jumlah</th>
        <th>Sumber</th>
    </tr>
    <?php
    // Load file koneksi.php
    include "koneksi.php";
    // Buat query untuk menampilkan semua data siswa
    $query = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
    // Untuk penomoran tabel, di awal set dengan 1
    while ($data = mysqli_fetch_array($query)) {
        // Ambil semua data dari hasil eksekusi $sql
        echo "<tr>";
        echo "<td>" . $data['id_pengeluaran'] . "</td>";
        echo "<td>" . $data['tgl_pengeluaran'] . "</td>";
        echo "<td>" . $data['jumlah'] . "</td>";
        echo "<td>" . $data['sumber'] . "</td>";
        echo "</tr>";
    } ?>
</table>

<div class="right-info">
    <p style="padding-right:55px;">Padang, <?php echo date('Y-m-d'); ?></p>
    <p>Pimpinan CV Metro Tani</p>
    <br>
    <p style="padding-right:125px;">Pimpinan</p>
</div>

<?php

// Get the buffered content
$html = ob_get_clean();

// Add the HTML content to the PDF
$mpdf->WriteHTML($html);

// Set PDF headers
$mpdf->Output('Data_Pengeluaran.pdf', 'D'); // 'D' option will force a download

// Exit to prevent any additional output
exit;
?>
