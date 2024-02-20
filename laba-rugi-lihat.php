<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Keuangan</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php
    require 'koneksi.php';
    require 'sidebar.php'; ?>

    <!-- Main Content -->
    <div id="content">

        <?php require 'navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laba Rugi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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




                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php require 'footer.php' ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php require 'logout-modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
