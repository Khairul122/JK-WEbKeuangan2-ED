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
    <tr>
        <th rowspan="2" style="text-align:center">Nama Akun</th>
        <th colspan="2" style="text-align:center">Saldo Awal</th>
        <th colspan="2" style="text-align:center">Pergerakan</th>
        <th colspan="2" style="text-align:center">Saldo Akhir</th>

    </tr>
    <tr>
        <th style="text-align:center">Debit</th>
        <th style="text-align:center">Credit</th>
        <th style="text-align:center">Debit</th>
        <th style="text-align:center">Credit</th>
        <th style="text-align:center">Debit</th>
        <th style="text-align:center">Credit</th>
    </tr>
    <tr>
        <th colspan="8" style="text-align:left">Asset</th>
    </tr>
    <?php
    include('koneksi.php');
    $sql = "SELECT * FROM neraca_saldo WHERE status = 1";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nama_akun"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_kredit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_kredit"] . "</td>";
            $saldo_akhir_debit = $row["saldo_awal_debit"] + $row["pergerakan_debit"];
            $saldo_akhir_kredit = $row["saldo_awal_kredit"] + $row["pergerakan_kredit"];
            echo "<td style='text-align:right'>" . $saldo_akhir_debit . "</td>";
            echo "<td style='text-align:right'>" . $saldo_akhir_kredit . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7' style='text-align:center'>Tidak ada data</td></tr>";
    }
    $koneksi->close();
    ?>
    <tr>
        <th colspan="8" style="text-align:left">Kewajiban</th>
    </tr>
    <?php
    include('koneksi.php');
    $sql = "SELECT * FROM neraca_saldo WHERE status = 2";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nama_akun"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_kredit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_kredit"] . "</td>";
            $saldo_akhir_debit = $row["saldo_awal_debit"] + $row["pergerakan_debit"];
            $saldo_akhir_kredit = $row["saldo_awal_kredit"] + $row["pergerakan_kredit"];
            echo "<td style='text-align:right'>" . $saldo_akhir_debit . "</td>";
            echo "<td style='text-align:right'>" . $saldo_akhir_kredit . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7' style='text-align:center'>Tidak ada data</td></tr>";
    }
    $koneksi->close();
    ?>
    <tr>
        <th colspan="8" style="text-align:left">Ekuitas</th>
    </tr>
    <?php
    include('koneksi.php');
    $sql = "SELECT * FROM neraca_saldo WHERE status = 3";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nama_akun"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_kredit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_kredit"] . "</td>";
            $saldo_akhir_debit = $row["saldo_awal_debit"] + $row["pergerakan_debit"];
            $saldo_akhir_kredit = $row["saldo_awal_kredit"] + $row["pergerakan_kredit"];
            echo "<td style='text-align:right'>" . $saldo_akhir_debit . "</td>";
            echo "<td style='text-align:right'>" . $saldo_akhir_kredit . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7' style='text-align:center'>Tidak ada data</td></tr>";
    }
    $koneksi->close();
    ?>
    <tr>
        <th colspan="8" style="text-align:left">Pendapatan</th>
    </tr>
    <?php
    include('koneksi.php');
    $sql = "SELECT * FROM neraca_saldo WHERE status = 4";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nama_akun"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_kredit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_kredit"] . "</td>";
            $saldo_akhir_debit = $row["saldo_awal_debit"] + $row["pergerakan_debit"];
            $saldo_akhir_kredit = $row["saldo_awal_kredit"] + $row["pergerakan_kredit"];
            echo "<td style='text-align:right'>" . $saldo_akhir_debit . "</td>";
            echo "<td style='text-align:right'>" . $saldo_akhir_kredit . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7' style='text-align:center'>Tidak ada data</td></tr>";
    }
    $koneksi->close();
    ?>
    <tr>
        <th colspan="8" style="text-align:left">Beban</th>
    </tr>
    <?php
    include('koneksi.php');
    $sql = "SELECT * FROM neraca_saldo WHERE status = 5";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nama_akun"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["saldo_awal_kredit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_debit"] . "</td>";
            echo "<td style='text-align:right'>" . $row["pergerakan_kredit"] . "</td>";
            $saldo_akhir_debit = $row["saldo_awal_debit"] + $row["pergerakan_debit"];
            $saldo_akhir_kredit = $row["saldo_awal_kredit"] + $row["pergerakan_kredit"];
            echo "<td style='text-align:right'>" . $saldo_akhir_debit . "</td>";
            echo "<td style='text-align:right'>" . $saldo_akhir_kredit . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7' style='text-align:center'>Tidak ada data</td></tr>";
    }
    $koneksi->close();
    ?>
    <tr>
        <th style="text-align:left">Total</th>
        <?php
        include('koneksi.php');

        // Query untuk menghitung total saldo_awal_debit
        $sql_total_debit = "SELECT SUM(saldo_awal_debit) AS total_debit FROM neraca_saldo";
        $result_total_debit = $koneksi->query($sql_total_debit);

        // Periksa jika query berhasil dijalankan
        if ($result_total_debit) {
            $row_total_debit = $result_total_debit->fetch_assoc();
            $total_debit = $row_total_debit['total_debit'];
        } else {
            $total_debit = 0; // Jika query tidak berhasil, total dianggap 0
        }

        // Query untuk menghitung total saldo_awal_kredit
        $sql_total_kredit = "SELECT SUM(saldo_awal_kredit) AS total_kredit FROM neraca_saldo";
        $result_total_kredit = $koneksi->query($sql_total_kredit);

        // Periksa jika query berhasil dijalankan
        if ($result_total_kredit) {
            $row_total_kredit = $result_total_kredit->fetch_assoc();
            $total_kredit = $row_total_kredit['total_kredit'];
        } else {
            $total_kredit = 0; // Jika query tidak berhasil, total dianggap 0
        }

        // Query untuk menghitung total pergerakan_debit
        $sql_total_pergerakan_debit = "SELECT SUM(pergerakan_debit) AS total_pergerakan_debit FROM neraca_saldo";
        $result_total_pergerakan_debit = $koneksi->query($sql_total_pergerakan_debit);

        // Periksa jika query berhasil dijalankan
        if ($result_total_pergerakan_debit) {
            $row_total_pergerakan_debit = $result_total_pergerakan_debit->fetch_assoc();
            $total_pergerakan_debit = $row_total_pergerakan_debit['total_pergerakan_debit'];
        } else {
            $total_pergerakan_debit = 0; // Jika query tidak berhasil, total dianggap 0
        }

        // Query untuk menghitung total pergerakan_kredit
        $sql_total_pergerakan_kredit = "SELECT SUM(pergerakan_kredit) AS total_pergerakan_kredit FROM neraca_saldo";
        $result_total_pergerakan_kredit = $koneksi->query($sql_total_pergerakan_kredit);

        // Periksa jika query berhasil dijalankan
        if ($result_total_pergerakan_kredit) {
            $row_total_pergerakan_kredit = $result_total_pergerakan_kredit->fetch_assoc();
            $total_pergerakan_kredit = $row_total_pergerakan_kredit['total_pergerakan_kredit'];
        } else {
            $total_pergerakan_kredit = 0; // Jika query tidak berhasil, total dianggap 0
        }

        // Query untuk menghitung total saldo_akhir_debit
        $sql_total_saldo_akhir_debit = "SELECT SUM(saldo_awal_debit + pergerakan_debit) AS total_saldo_akhir_debit FROM neraca_saldo";
        $result_total_saldo_akhir_debit = $koneksi->query($sql_total_saldo_akhir_debit);

        // Periksa jika query berhasil dijalankan
        if ($result_total_saldo_akhir_debit) {
            $row_total_saldo_akhir_debit = $result_total_saldo_akhir_debit->fetch_assoc();
            $total_saldo_akhir_debit = $row_total_saldo_akhir_debit['total_saldo_akhir_debit'];
        } else {
            $total_saldo_akhir_debit = 0; // Jika query tidak berhasil, total dianggap 0
        }

        // Query untuk menghitung total saldo_akhir_kredit
        $sql_total_saldo_akhir_kredit = "SELECT SUM(saldo_awal_kredit + pergerakan_kredit) AS total_saldo_akhir_kredit FROM neraca_saldo";
        $result_total_saldo_akhir_kredit = $koneksi->query($sql_total_saldo_akhir_kredit);

        // Periksa jika query berhasil dijalankan
        if ($result_total_saldo_akhir_kredit) {
            $row_total_saldo_akhir_kredit = $result_total_saldo_akhir_kredit->fetch_assoc();
            $total_saldo_akhir_kredit = $row_total_saldo_akhir_kredit['total_saldo_akhir_kredit'];
        } else {
            $total_saldo_akhir_kredit = 0; // Jika query tidak berhasil, total dianggap 0
        }

        $koneksi->close();
        ?>
        <td style='text-align:right'><?php echo $total_debit; ?></td>
        <td style='text-align:right'><?php echo $total_kredit; ?></td>
        <td style='text-align:right'><?php echo $total_pergerakan_debit; ?></td>
        <td style='text-align:right'><?php echo $total_pergerakan_kredit; ?></td>
        <td style='text-align:right'><?php echo $total_saldo_akhir_debit; ?></td>
        <td style='text-align:right'><?php echo $total_saldo_akhir_kredit; ?></td>
    </tr>
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

<?php

// Get the buffered content
$html = ob_get_clean();

// Add the HTML content to the PDF
$mpdf->WriteHTML($html);

// Set PDF headers
$mpdf->Output('Laporan Neraca Saldo.pdf', 'D'); // 'D' option will force a download

// Exit to prevent any additional output
exit;
?>
