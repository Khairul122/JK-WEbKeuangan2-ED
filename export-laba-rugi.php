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
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #000;
    }

    .right-info {
        float: right;
        text-align: right;
        padding-top: 100px;
    }

    /* Tambahkan gaya untuk tabel */
    table {
        border-collapse: collapse;
        width: 100%;
        margin: 20px 0;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }
</style>

<h1>Alfara Motor</h1>
<h4>Jl. Sutan Syahrir No.215, Mata Air</h4>
<h4>Kec. Padang Selatan., Kota Padang, Sumatera Barat 25121</h4>
<hr class="custom-line">

<!-- Tabel data -->
<table>
    <thead>
        <tr>
            <th colspan="3">Pendapatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Pendapatan dari Penjualan</td>
        </tr>
        <?php
        // Sisipkan file koneksi.php yang berisi koneksi ke database
        include('koneksi.php');

        // Query untuk menampilkan data dari tabel laba_rugi yang memiliki status 1
        $query_pendapatan = "SELECT sumber, jumlah FROM laba_rugi WHERE status = 1 AND id_user = 1"; // Sesuaikan dengan kondisi Anda

        // Jalankan query pendapatan
        $result_pendapatan = mysqli_query($koneksi, $query_pendapatan);

        // Inisialisasi variabel total pendapatan
        $total_pendapatan = 0;

        // Periksa apakah query pendapatan berhasil dijalankan
        if ($result_pendapatan && mysqli_num_rows($result_pendapatan) > 0) {
            // Loop untuk menampilkan data pendapatan
            while ($row = mysqli_fetch_assoc($result_pendapatan)) {
                echo "<tr>";
                echo "<td>" . $row['sumber'] . "</td>";
                echo "<td>" . $row['jumlah'] . "</td>";
                echo "</tr>";

                // Tambahkan nilai jumlah pendapatan ke dalam total_pendapatan
                $total_pendapatan += $row['jumlah'];
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada data pendapatan dari penjualan</td></tr>";
        }

        // Tampilkan total pendapatan dari penjualan
        echo "<tr><td colspan='1'><strong>Total Pendapatan dari Penjualan</strong></td><td><strong>" . $total_pendapatan . "</strong></td></tr>";

        // Tambahkan label "Harga Pokok Penjualan"
        echo "<tr><td colspan='2'>Harga Pokok Penjualan</td></tr>";

        // Query untuk menampilkan data dari tabel laba_rugi yang memiliki status 2
        $query_harga_pokok = "SELECT sumber, jumlah FROM laba_rugi WHERE status = 2 AND id_user = 1"; // Sesuaikan dengan kondisi Anda

        // Jalankan query harga pokok
        $result_harga_pokok = mysqli_query($koneksi, $query_harga_pokok);

        // Inisialisasi variabel total harga pokok
        $total_harga_pokok = 0;

        // Periksa apakah query harga pokok berhasil dijalankan
        if ($result_harga_pokok && mysqli_num_rows($result_harga_pokok) > 0) {
            // Loop untuk menampilkan data harga pokok
            while ($row = mysqli_fetch_assoc($result_harga_pokok)) {
                echo "<tr>";
                echo "<td>" . $row['sumber'] . "</td>";
                echo "<td>" . $row['jumlah'] . "</td>";
                echo "</tr>";

                // Tambahkan nilai jumlah harga pokok ke dalam total_harga_pokok
                $total_harga_pokok += $row['jumlah'];
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada data harga pokok penjualan</td></tr>";
        }

        // Tampilkan total harga pokok penjualan
        echo "<tr><td colspan='1'><strong>Total Harga Pokok Penjualan</strong></td><td><strong>" . $total_harga_pokok . "</strong></td></tr>";

        // Hitung laba kotor (Total Pendapatan - Total Harga Pokok)
        $laba_kotor = $total_pendapatan - $total_harga_pokok;

        // Tampilkan laba kotor
        echo "<tr><td colspan='1'><strong>Laba Kotor</strong></td><td><strong>" . $laba_kotor . "</strong></td></tr>";

        // Tambahkan label "Biaya Operasional"
        echo "<tr><td colspan='2'>Biaya Operasional</td></tr>";

        // Query untuk menampilkan data dari tabel laba_rugi yang memiliki status 3
        $query_biaya_operasional = "SELECT sumber, jumlah FROM laba_rugi WHERE status = 3 AND id_user = 1"; // Sesuaikan dengan kondisi Anda

        // Jalankan query biaya operasional
        $result_biaya_operasional = mysqli_query($koneksi, $query_biaya_operasional);

        // Inisialisasi variabel total biaya operasional
        $total_biaya_operasional = 0;

        // Periksa apakah query biaya operasional berhasil dijalankan
        if ($result_biaya_operasional && mysqli_num_rows($result_biaya_operasional) > 0) {
            // Loop untuk menampilkan data biaya operasional
            while ($row = mysqli_fetch_assoc($result_biaya_operasional)) {
                echo "<tr>";
                echo "<td>" . $row['sumber'] . "</td>";
                echo "<td>" . $row['jumlah'] . "</td>";
                echo "</tr>";

                // Tambahkan nilai jumlah biaya operasional ke dalam total_biaya_operasional
                $total_biaya_operasional += $row['jumlah'];
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada data biaya operasional</td></tr>";
        }

        // Tampilkan total biaya operasional
        echo "<tr><td colspan='1'><strong>Total Biaya Operasional</strong></td><td><strong>" . $total_biaya_operasional . "</strong></td></tr>";

        // Tambahkan label "Pendapatan Bersih" dan hitung nilai pendapatan bersih (Laba Kotor - Total Biaya Operasional)
        $pendapatan_bersih = $laba_kotor - $total_biaya_operasional;
        echo "<tr><td colspan='1'><strong>Pendapatan Bersih</strong></td><td><strong>" . $pendapatan_bersih . "</strong></td></tr>";
        echo "<tr><td colspan='1'><strong>Total Pendapatan Komprehesif Periode Ini</strong></td><td><strong>" . $pendapatan_bersih . "</strong></td></tr>";

        // Tutup koneksi ke database
        mysqli_close($koneksi);
        ?>
    </tbody>
</table>

<div style="margin-top: 20px; text-align: left;">
    <div style="float: right;">
        Padang, <?php echo date('j F Y'); ?><br>
        Pimpinan Toko Alfara Motor
        <br>
        <br>
        <br>
        <br>
        (Pimpinan)
    </div>
</div>



<!-- <div class="right-info">
    <p style="padding-right:55px;">Padang, <?php echo date('d F Y'); ?></p>
    <p>Pimpinan Toko Alfara Motor</p>
    <br>
    <p style="padding-right:125px;">Pimpinan</p>
</div> -->

<?php

// Get the buffered content
$html = ob_get_clean();

// Add the HTML content to the PDF
$mpdf->WriteHTML($html);

// Set PDF headers
$mpdf->Output('Laporan Laba Rugi.pdf', 'D'); // 'D' option will force a download

// Exit to prevent any additional output
exit;
?>