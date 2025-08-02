<?php 

    if ($page == "laporan-index") {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['print'])) {

                $jenis_laporan = $_POST['jenis_laporan'];
                $tgl_awal = mysqli_real_escape_string($conn, $_POST['tgl_awal']);
                $tgl_akhir = mysqli_real_escape_string($conn, $_POST['tgl_akhir']);

                $pageToPrint = "print.php?jenis_laporan=$jenis_laporan&dari=$tgl_awal&sampai=$tgl_akhir";

                echo "<script>";
                echo "window.open('$pageToPrint', '_blank');";
                echo "</script>";

            } else if (isset($_POST['generatePDF'])) {

                $jenis_laporan = $_POST['jenis_laporan'];
                $tgl_awal = mysqli_real_escape_string($conn, $_POST['tgl_awal']);
                $tgl_akhir = mysqli_real_escape_string($conn, $_POST['tgl_akhir']);

                $pageToPrint = "generate_pdf.php?jenis_laporan=$jenis_laporan&dari=$tgl_awal&sampai=$tgl_akhir";

                echo "<script>";
                echo "window.open('$pageToPrint', '_blank');";
                echo "</script>";
            }
        }

    } else if ($page == "laporan-penjualan") {

        $showPenjualan = 0;

        if(empty($_GET['dari']) AND empty($_GET['sampai'])) {

            $showTanggal = 0;

            $query = "SELECT * FROM penjualan GROUP BY kd_penjualan ORDER BY 'id'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resultPenjualan = $stmt->get_result();
            $stmt->close();

            $dataPenjualanList = array();

            if($resultPenjualan->num_rows > 0) {
                $showPenjualan = 1;
                while($row = $resultPenjualan->fetch_assoc()) { 
                    $dataPenjualanList[] = $row;
                }
            }

            function getDataPenjualanListDetail($conn,  $kd_penjualan) {

                $query = "SELECT * FROM penjualan WHERE kd_penjualan = ? GROUP BY id_barang ORDER BY 'id'";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $kd_penjualan);
                $stmt->execute();
                $resultPenjualan = $stmt->get_result();
                $stmt->close();

                $dataPenjualanListDetail = array();

                if($resultPenjualan->num_rows > 0) {
                    while($row = $resultPenjualan->fetch_assoc()) { 
                        $showPenjualan = 1;
                        $dataPenjualanListDetail[] = $row;
                        
                    }
                }
                return $dataPenjualanListDetail;
            }

            function getDataPenjualanDetailQty($conn, $kd_penjualan, $id_barang){
                $query = "SELECT COUNT(*) AS qty FROM penjualan WHERE kd_penjualan = ? AND id_barang = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ii', $kd_penjualan, $id_barang);
                $stmt->execute();
                $dataPenjualanDetail = $stmt->get_result();
                $dataPenjualanDetailQty = $dataPenjualanDetail->fetch_assoc();
                $stmt->close();
                return $dataPenjualanDetailQty['qty'];
                
            }

            function getDataBarang($conn, $id_barang){
                $query = "SELECT * FROM barang WHERE id = ? LIMIT 1";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $id_barang);
                $stmt->execute();
                $ResultdataBarang = $stmt->get_result();
                $dataBarang = $ResultdataBarang->fetch_assoc();
                $stmt->close();

                return $dataBarang;
                
            }

            function getSubtotalHarga($conn, $kd_penjualan) {

                $query = "SELECT * FROM penjualan WHERE kd_penjualan = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $kd_penjualan);
                $stmt->execute();
                $resultSubtotalHarga = $stmt->get_result();
                $stmt->close();

                $dataSubtotalHarga = array();
                $subtotal_harga = 0;

                if($resultSubtotalHarga->num_rows > 0) {
                    while($row = $resultSubtotalHarga->fetch_assoc()) { 
                        $dataSubtotalHarga[] = $row;
                    }
                }

                foreach ($dataSubtotalHarga as $row) {
                    $subtotal_harga += $row['subtotal_harga'];
                }
                return $subtotal_harga;
            }

            function getNamaPelanggan($conn, $id_pelanggan){
                $query = "SELECT * FROM pelanggan WHERE id_pelanggan = ? ";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $id_pelanggan);
                $stmt->execute();
                $dataPelangganDetail = $stmt->get_result();
                $dataPelangganDetail = $dataPelangganDetail->fetch_assoc();
                $stmt->close();
                return $dataPelangganDetail['nama_pelanggan'];
            }

        } else if (!empty($_GET['dari']) AND !empty($_GET['sampai'])) {

            $showTanggal = 1;

            $dariTgl = mysqli_real_escape_string($conn, $_GET['dari']);
            $sampaiTgl = mysqli_real_escape_string($conn, $_GET['sampai']);

            $query = "SELECT * FROM penjualan WHERE created_at BETWEEN ? AND ? GROUP BY kd_penjualan ORDER BY id";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $dariTgl, $sampaiTgl);
            $stmt->execute();
            $resultPenjualan = $stmt->get_result();
            $stmt->close();

            $dataPenjualanList = array();

            if ($resultPenjualan->num_rows > 0) {
                while ($row = $resultPenjualan->fetch_assoc()) {
                    $showPenjualan = 1;
                    $dataPenjualanList[] = $row;
                }
            }

            function getDataPenjualanListDetail($conn,  $kd_penjualan) {

                $query = "SELECT * FROM penjualan WHERE kd_penjualan = ? GROUP BY id_barang ORDER BY 'id'";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $kd_penjualan);
                $stmt->execute();
                $resultPenjualan = $stmt->get_result();
                $stmt->close();

                $dataPenjualanListDetail = array();

                if($resultPenjualan->num_rows > 0) {
                    while($row = $resultPenjualan->fetch_assoc()) { 
                        $showPenjualan = 1;
                        $dataPenjualanListDetail[] = $row;
                        
                    }
                }
                return $dataPenjualanListDetail;
            }

            function getDataPenjualanDetailQty($conn, $kd_penjualan, $id_barang){
                $query = "SELECT COUNT(*) AS qty FROM penjualan WHERE kd_penjualan = ? AND id_barang = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ii', $kd_penjualan, $id_barang);
                $stmt->execute();
                $dataPenjualanDetail = $stmt->get_result();
                $dataPenjualanDetailQty = $dataPenjualanDetail->fetch_assoc();
                $stmt->close();
                return $dataPenjualanDetailQty['qty'];
            }

            function getDataBarang($conn, $id_barang){
                $query = "SELECT * FROM barang WHERE id = ? LIMIT 1";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $id_barang);
                $stmt->execute();
                $ResultdataBarang = $stmt->get_result();
                $dataBarang = $ResultdataBarang->fetch_assoc();
                $stmt->close();

                return $dataBarang;
                
            }

            function getSubtotalHarga($conn, $kd_penjualan) {

                $query = "SELECT * FROM penjualan WHERE kd_penjualan = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $kd_penjualan);
                $stmt->execute();
                $resultSubtotalHarga = $stmt->get_result();
                $stmt->close();

                $dataSubtotalHarga = array();
                $subtotal_harga = 0;

                if($resultSubtotalHarga->num_rows > 0) {
                    while($row = $resultSubtotalHarga->fetch_assoc()) { 
                        $dataSubtotalHarga[] = $row;
                    }
                }

                foreach ($dataSubtotalHarga as $row) {
                    $subtotal_harga += $row['subtotal_harga'];
                }
                return $subtotal_harga;
            }

            function getNamaPelanggan($conn, $id_pelanggan){
                $query = "SELECT * FROM pelanggan WHERE id_pelanggan = ? ";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $id_pelanggan);
                $stmt->execute();
                $dataPelangganDetail = $stmt->get_result();
                $dataPelangganDetail = $dataPelangganDetail->fetch_assoc();
                $stmt->close();
                return $dataPelangganDetail['nama_pelanggan'];
            }

        }

    } else if($page == "laporan-barang") {

        $showLog = 0;

        $query = "SELECT * FROM barang ORDER BY nama_barang ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $resultBarang = $stmt->get_result();
        $stmt->close();

        $dataBarang = array();

        if ($resultBarang->num_rows > 0) {
            while ($row = $resultBarang->fetch_assoc()) {
                $showPenjualan = 1;
                $dataBarang[] = $row;
            }
        }

        function getLogBarang($conn, $id_barang) {
            $query = "SELECT * FROM log WHERE id_barang = ? ORDER BY id DESC";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $id_barang);
            $stmt->execute();
            $Resultdatalog = $stmt->get_result();
            $logBarang = array();

            if ($Resultdatalog->num_rows > 0) {
                while ($row = $Resultdatalog->fetch_assoc()) {
                    $showLog = 1;
                    $logBarang[] = $row;
                }
                return $logBarang;
            } else {
                $logBarang = 0;
                return $logBarang;
            }
        }

        function getStok($conn, $id_barang){
            $query = "SELECT * FROM stok WHERE id_barang = ? ";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $id_barang);
            $stmt->execute();
            $resultStok = $stmt->get_result();
            $stok = 0;
            $dataStokDetail = $resultStok->fetch_assoc();
            $stmt->close();
            $stok = $dataStokDetail['jumlah_barang'];
            return $stok;
        }

    } else if($page == "laporan-pelanggan") {

        $showPelanggan = 0;

        $query = "SELECT * FROM pelanggan ORDER BY nama_pelanggan ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $resultPelanggan = $stmt->get_result();
        $stmt->close();

        $dataPelanggan = array();

        if ($resultPelanggan->num_rows > 0) {
            while ($row = $resultPelanggan->fetch_assoc()) {
                $showPelanggan = 1;
                $dataPelanggan[] = $row;
            }
        } else {
            $showPelanggan = 0;
        }

    }