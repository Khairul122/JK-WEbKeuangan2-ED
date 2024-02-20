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
                    <h6 class="m-0 font-weight-bold text-primary">Neraca Saldo</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

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
