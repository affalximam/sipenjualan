<?php 

    if($page == "penjualan-list") {

        if(empty($_GET['s'])) {

            if (empty($_GET['entries'])) {

                if (empty($_GET['page'])){

                    echo "<script>window.location.href = '?entries=10&page=1';</script>";

                } else if (!empty($_GET['page'])) {

                    $entries = 10;
                    $page = intval(isset($_GET['page']) ? $_GET['page'] : 1);

                    if ($entries === false || $entries <= 0) {
                        $entries = 10;
                        echo "<script>window.location.href = '?entries=$entries&page=1';</script>";
                    }
                    if ($page === false || $page <= 0) {
                        $page = 1;
                    }

                    echo "<script>window.location.href = '?entries=$entries&page=$page';</script>";
                }

            } else if (!empty($_GET['entries'])) {

                if (empty($_GET['page'])) {

                    $entries = intval( isset($_GET['entries']) ? $_GET['entries'] : 10);                            
                    echo "<script>window.location.href = '?entries=$entries&page=1'; </script>";

                } else if (!empty($_GET['page'])) {

                    $entries = intval( isset($_GET['entries']) ? $_GET['entries'] : 10);
                    $page = intval(isset($_GET['page']) ? $_GET['page'] : 1);
                    $start_from = ($page - 1) * $entries;
        
                    if ($entries === false || $entries <= 0) {
                        $entries = 10;
                        echo "<script>window.location.href = '?entries=$entries&page=1';</script>";
                    }
                    if ($page === false || $page <= 0) {
                        $page = 1;
                        echo "<script>window.location.href = '?entries=$entries&page=1';</script>";
                    }
        
                    $queryTotalRecords = "SELECT COUNT(DISTINCT kd_penjualan) AS total FROM Penjualan";
                    $stmtTotalRecords = $conn->prepare($queryTotalRecords);
                    $stmtTotalRecords->execute();
                    $resultTotalRecords = $stmtTotalRecords->get_result();
                    $totalRecords = $resultTotalRecords->fetch_assoc()['total'];
                    $totalPages = ceil($totalRecords / $entries);

                    $queryShowPenjualan = "SELECT * FROM Penjualan GROUP BY kd_penjualan LIMIT ?, ?";
                    $stmtShowPenjualan = $conn->prepare($queryShowPenjualan);
                    $stmtShowPenjualan->bind_param("ii", $start_from, $entries);
                    $stmtShowPenjualan->execute();
                    $result = $stmtShowPenjualan->get_result();

                    $dataPenjualanList = array();

                    if ($result->num_rows > 0) {
                        $showPenjualan = 1;
                        while ($row = $result->fetch_assoc()) {
                            $dataPenjualanList[] = $row;
                        }
                    } else {
                        $showPenjualan = 0;
                        // echo "<script>alert('Tidak ada data ditemukan');</script>";
                        // echo "<script>window.location.href = 'penjualan-list.php'; </script>";
                    }

                    echo "<script>";
                    echo "    document.addEventListener('DOMContentLoaded', function() {";
                    echo "        var entriesSelect = document.getElementById('entries');";
                    echo "        entriesSelect.addEventListener('change', function() {";
                    echo "            var selectedValue = entriesSelect.value;";
                    echo "            window.location.href = '?entries=' + encodeURIComponent(selectedValue);";
                    echo "        });";
                    echo "    });";
                    echo "</script>";

                    $stmtTotalRecords->close();
                    $stmtShowPenjualan->close();

                    function generatePaginationButtons($totalPages, $currentPage) {
                        $html = '<div class="row d-flex flex-row border border-2 rounded-3 me-2">';
                        
                        if ($currentPage > 1) {
                            $html .= '<a href="?entries=' . $_GET['entries'] . '&page=' . ($currentPage - 1) . '" class="btn w-auto rounded-0">Previous</a>';
                        } else {
                            $html .= '<button class="btn w-auto rounded-0 d-none">Previous</button>';
                        }
                        
                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i == $currentPage) {
                                $html .= '<button class="btn w-auto bg-template-blue-2 rounded-0 text-white">' . $i . '</button>';
                            } else {
                                $html .= '<a href="?entries=' . $_GET['entries'] . '&page=' . $i . '" class="btn w-auto rounded-0">' . $i . '</a>';
                            }
                        }
                        
                        if ($currentPage < $totalPages) {
                            $html .= '<a href="?entries=' . $_GET['entries'] . '&page=' . ($currentPage + 1) . '" class="btn w-auto rounded-0">Next</a>';
                        } else {
                            $html .= '<button class="btn w-auto rounded-0 d-none">Next</button>';
                        }
                        
                        $html .= '</div>';
                        
                        return $html;
                    }


                }
            }
        
        } else if (!empty($_GET['s'])) {

            if (empty($_GET['entries'])) {

                if (empty($_GET['page'])){

                    $search = mysqli_real_escape_string($conn, $_GET['s']);
                    echo "<script>window.location.href = '?s=$search&entries=10&page=1';</script>";

                } else if (!empty($_GET['page'])) {

                    $entries = 10;
                    $search = mysqli_real_escape_string($conn, $_GET['s']);
                    $page = intval(isset($_GET['page']) ? $_GET['page'] : 1);

                    if ($entries === false || $entries <= 0) {
                        $entries = 10;
                        echo "<script>window.location.href = '?s=$search&entries=$entries&page=1';</script>";
                    }
                    if ($page === false || $page <= 0) {
                        $page = 1;
                    }

                    echo "<script>window.location.href = '?s=$search&entries=$entries&page=$page';</script>";
                }

            } else if (!empty($_GET['entries'])) {

                if (empty($_GET['page'])) {

                    $search = mysqli_real_escape_string($conn, $_GET['s']);
                    $entries = intval( isset($_GET['entries']) ? $_GET['entries'] : 10);                            
                    echo "<script>window.location.href = '?s=$search&entries=$entries&page=1'; </script>";

                } else if (!empty($_GET['page'])) {

                    $search = mysqli_real_escape_string($conn, $_GET['s']);
                    $entries = intval(isset($_GET['entries']) ? $_GET['entries'] : 10);
                    $page = intval(isset($_GET['page']) ? $_GET['page'] : 1);
                    $start_from = ($page - 1) * $entries;

                    if ($entries <= 0) {
                        $entries = 10;
                        echo "<script>window.location.href = '?s=$search&entries=$entries&page=1';</script>";
                    }
                    if ($page <= 0) {
                        $page = 1;
                        echo "<script>window.location.href = '?s=$search&entries=$entries&page=1';</script>";
                    }

                    $search = "%$search%";
                    $queryTotalRecords = "SELECT COUNT(DISTINCT kd_penjualan) AS total FROM penjualan WHERE kd_penjualan LIKE ?";
                    $stmtTotalRecords = $conn->prepare($queryTotalRecords);
                    $stmtTotalRecords->bind_param("s", $search);
                    $stmtTotalRecords->execute();
                    $resultTotalRecords = $stmtTotalRecords->get_result();

                    if ($resultTotalRecords) {
                        $totalRecords = $resultTotalRecords->fetch_assoc()['total'];
                        $totalPages = ceil($totalRecords / $entries);

                        $queryShowPelanggan = "SELECT * FROM penjualan WHERE kd_penjualan LIKE ? GROUP BY kd_penjualan LIMIT ?, ?";
                        $stmtShowPelanggan = $conn->prepare($queryShowPelanggan);
                        $stmtShowPelanggan->bind_param("sii", $search, $start_from, $entries);
                        $stmtShowPelanggan->execute();
                        $result = $stmtShowPelanggan->get_result();

                        $dataPenjualanList = array();

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $showPenjualan = 1;
                                $dataPenjualanList[] = $row;
                            }
                        } else {
                            echo "<script>alert('Tidak ada data ditemukan');</script>";
                            echo "<script>window.location.href = '?entries=$entries&page=$page'; </script>";
                        }
                    } else {
                        echo "<script>alert('Terjadi kesalahan dalam mengambil data');</script>";
                    }

                    $stmtTotalRecords->close();
                    $stmtShowPelanggan->close();
                    
                    echo "<script>";
                    echo "    document.addEventListener('DOMContentLoaded', function() {";
                    echo "        var entriesSelect = document.getElementById('entries');";
                    echo "        entriesSelect.addEventListener('change', function() {";
                    echo "            var selectedValue = entriesSelect.value;";
                    echo "            window.location.href = '?s=$search&entries=' + encodeURIComponent(selectedValue);";
                    echo "        });";
                    echo "    });";
                    echo "</script>";

                    function generatePaginationButtons($totalPages, $currentPage) {
                        $html = '<div class="row d-flex flex-row border border-2 rounded-3 me-2">';
                        
                        if ($currentPage > 1) {
                            $html .= '<a href="?s=' . $_GET['s'] .'&entries=' . $_GET['entries'] . '&page=' . ($currentPage - 1) . '" class="btn w-auto rounded-0">Previous</a>';
                        } else {
                            $html .= '<button class="btn w-auto rounded-0 d-none">Previous</button>';
                        }
                        
                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i == $currentPage) {
                                $html .= '<button class="btn w-auto bg-template-blue-2 rounded-0 text-white">' . $i . '</button>';
                            } else {
                                $html .= '<a href="?s=' . $_GET['s'] .'&entries=' . $_GET['entries'] . '&page=' . $i . '" class="btn w-auto rounded-0">' . $i . '</a>';
                            }
                        }
                        
                        if ($currentPage < $totalPages) {
                            $html .= '<a href="?s=' . $_GET['s'] .'&entries=' . $_GET['entries'] . '&page=' . ($currentPage + 1) . '" class="btn w-auto rounded-0">Next</a>';
                        } else {
                            $html .= '<button class="btn w-auto rounded-0 d-none">Next</button>';
                        }
                        
                        $html .= '</div>';
                        
                        return $html;
                    }

                }
            }
        }

        function getNamaPelanggan($conn, $id_pelanggan) {

            $queryShowNamaPelanggan = "SELECT * FROM pelanggan WHERE id_pelanggan = ?";
            $stmtGetNamaPelanggan = $conn->prepare($queryShowNamaPelanggan);
            $stmtGetNamaPelanggan->bind_param("i", $id_pelanggan);
            $stmtGetNamaPelanggan->execute();
            $resultNamaPelanggan = $stmtGetNamaPelanggan->get_result();
            $rowdataNamaPelanggan = $resultNamaPelanggan->fetch_assoc();
            $namaPelanggan = $rowdataNamaPelanggan['nama_pelanggan'];
            $stmtGetNamaPelanggan->close();
            return $namaPelanggan;

        }
        function getTotalPenjualan($conn, $kd_penjualan) {
            $queryShowNamapenjualan = "SELECT COUNT(*) AS total FROM penjualan WHERE kd_penjualan = ?";
            $stmtGetNamapenjualan = $conn->prepare($queryShowNamapenjualan);
            $stmtGetNamapenjualan->bind_param("i", $kd_penjualan);
            $stmtGetNamapenjualan->execute();
            $result = $stmtGetNamapenjualan->get_result();
            $row = $result->fetch_assoc();
            $stmtGetNamapenjualan->close();
            return $row['total'];
        }

        function getTotalHarga($conn, $id_barang) {

            $queryShowHarga = "SELECT * FROM penjualan WHERE kd_penjualan = ?";
            $stmt = $conn->prepare($queryShowHarga);
            $stmt->bind_param("i", $id_barang);
            $stmt->execute();
            $resultHarga = $stmt->get_result();

            $totalQty = 0;

            if ($resultHarga->num_rows > 0) {
                while ($rowdataHarga = $resultHarga->fetch_assoc()) {
                    $totalQty += $rowdataHarga['total_harga'];
                }
            }

            $stmt->close();
            return $totalQty;

        }
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['hapus_Penjualan'])) {
                $kd_penjualan = htmlspecialchars($_POST['kd_penjualan']);
                $queryHapusPenjualan = "DELETE FROM penjualan WHERE kd_penjualan = ?";
                $stmt = $conn->prepare($queryHapusPenjualan);
                $stmt->bind_param("s",  $kd_penjualan);
                $stmt->execute();
                $stmt->close();

                echo "<script>";
                echo "alert('Data Penjualan berhasil dihapus');";
                echo "</script>";
                header("Refresh:0");

            }
        };

    } else if ($page == "penjualan-detail") {

        if(isset($_GET['kd_penjualan'])) {

            $kd_penjualan = intval($_GET['kd_penjualan']);

            $sqlViewDataPenjualan = "SELECT * FROM penjualan WHERE kd_penjualan = ?";
            $stmt = $conn->prepare($sqlViewDataPenjualan);
            $stmt->bind_param("s", $kd_penjualan);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $dataPenjualanDetail = $result->fetch_assoc();
            } else {
                header("Location: stok-list.php");
                exit();
            }

            $id_pelanggan = $dataPenjualanDetail['id_pelanggan'];
            $sqlShowIdPelanggan = "SELECT * FROM pelanggan WHERE id_pelanggan = ?";
            $stmt = $conn->prepare($sqlShowIdPelanggan);
            $stmt->bind_param("i", $id_pelanggan);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $dataPelanggan = $result->fetch_assoc();
            } else {
                header("Location: stok-list.php");
                exit();
            }

            $queryShowDataPenjualan = "SELECT * FROM penjualan WHERE kd_penjualan = ? GROUP BY id_barang";
            $stmtDataPenjualan = $conn->prepare($queryShowDataPenjualan);
            $stmtDataPenjualan->bind_param("i", $kd_penjualan);
            $stmtDataPenjualan->execute();
            $resultDataPenjualan = $stmtDataPenjualan->get_result();

            $dataPenjualanDetailStruk = [];

            while ($row = $resultDataPenjualan->fetch_assoc()) {
                $dataPenjualanDetailStruk[] = $row;
            }

            function getQtybarang($conn, $kd_penjualan, $id_barang) {
                $queryShowQtyBarang = "SELECT COUNT(*) AS total FROM penjualan WHERE kd_penjualan = ? AND  id_barang = ?";
                $stmtGetQtyBarang = $conn->prepare($queryShowQtyBarang);
                $stmtGetQtyBarang->bind_param("ii", $kd_penjualan, $id_barang);
                $stmtGetQtyBarang->execute();
                $result = $stmtGetQtyBarang->get_result();
                $qtyBarang = $result->fetch_assoc();
                $stmtGetQtyBarang->close();
                return $qtyBarang['total'];
            }

            function getNamaBarang($conn, $id_barang) {
                $queryShowNamaBarang = "SELECT * FROM barang WHERE id = ? LIMIT 1";
                $stmt = $conn->prepare($queryShowNamaBarang);
                $stmt->bind_param("i", $id_barang);
                $stmt->execute();
                $resultBarang = $stmt->get_result();
            
                $nama_barang = "";
            
                if ($resultBarang->num_rows > 0) {
                    while ($rowdataBarang = $resultBarang->fetch_assoc()) {
                        $nama_barang = $rowdataBarang['nama_barang'];
                    }
                }
            
                $stmt->close();           
                return $nama_barang;
            }
            
            function getSubtotalBarang($subtotal_harga, $qtyBarang) {
                $subtotalBarang = $subtotal_harga * $qtyBarang;
                return $subtotalBarang;
            }

            function subtotal($conn, $kd_penjualan) {
                $queryShowSubtotal = "SELECT * FROM penjualan WHERE kd_penjualan = ?";
                $stmt = $conn->prepare($queryShowSubtotal);
                $stmt->bind_param("i", $kd_penjualan);
                $stmt->execute();
                $resultHarga = $stmt->get_result();

                $subtotal = 0;

                if ($resultHarga->num_rows > 0) {
                    while ($rowdataHarga = $resultHarga->fetch_assoc()) {
                        $subtotal += $rowdataHarga['subtotal_harga'];
                    }
                }

                $stmt->close();
                return $subtotal;
            }
            function total($pajak, $subtotal) {
                $total = $subtotal - $pajak;
                return $total;
            }



        } else {

            echo "<script>";
            echo "alert('Data tidak ditemukan');";
            echo "window.location.href = 'penjualan-list.php';"; 
            echo "</script>";
            
        }

    } else if ($page == "penjualan-tambah") {

        $queryShowPelanggan = "SELECT * FROM pelanggan";
        $stmtPelanggan = $conn->prepare($queryShowPelanggan);
        $stmtPelanggan->execute();
        $resultPelanggan = $stmtPelanggan->get_result();

        $dataShowPelanggan = [];

        if ($resultPelanggan->num_rows > 0) {
            
            while($row = $resultPelanggan->fetch_assoc()) {
                $dataShowPelanggan[] = $row; 
            }
        } else {
            echo "<script>";
            echo "alert('Tidak Ada Pelanggan');";
            echo "window.location.href = '../pelanggan/pelanggan-tambah.php';"; 
            echo "</script>";
        }

        $kasir = "";
        $id_pelanggan = "";
                
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['tambah_penjualan'])) {
                $id_pelanggan = intval($_POST['id_pelanggan']);
                $kd_penjualan = intval($_POST['kd_penjualan']);
                $kasir = mysqli_real_escape_string($conn, $_POST['kasir']);

                $query = "SELECT * FROM penjualan WHERE kd_penjualan = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $kd_penjualan);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 0) {
                    echo "<script>";
                    echo "window.location.href = 'penjualan-tambah-stok.php?kd_penjualan=$kd_penjualan&id_pelanggan=$id_pelanggan&kasir=$kasir';"; 
                    echo "</script>";
                } else {                    
                    echo "<script>";
                    echo "alert('KD Pelanggan Tidak Boleh Duplikat!');";
                    echo "</script>";
                    $id_pelanggan = intval($_POST['id_pelanggan']);
                    $kasir = mysqli_real_escape_string($conn, $_POST['kasir']);
                }
            }
        };

    } else if ($page == "penjualan-tambah-stok") {

        $transaksi = 0;
        if (!empty($_GET['transaksi'])) {
            $transaksi = 1;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET['tambah_transaksi_penjualan'])) {
            unset($_SESSION['penjualanData']);
        }

        if (!empty($_GET['kd_penjualan']) AND !empty($_GET['id_pelanggan']) AND !empty($_GET['kasir'])) {

            $queryShowBarang = "SELECT * FROM barang";
            $result = $conn->query($queryShowBarang);
            
            $dataShowBarang = array(); 
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    $dataShowBarang[] = $row;
                }
            } else {
                echo "Tidak ada data ditemukan.";
            }

            
            
            function getNamaPelanggan($conn, $id_pelanggan) {
                $queryShowSubtotal = "SELECT * FROM pelanggan WHERE id_pelanggan = ?";
                $stmt = $conn->prepare($queryShowSubtotal);
                $stmt->bind_param("i", $id_pelanggan);
                $stmt->execute();
                $resultNamaPelanggan = $stmt->get_result();

                if ($resultNamaPelanggan->num_rows > 0) {
                    while ($rowdataNamaPelanggan = $resultNamaPelanggan->fetch_assoc()) {
                        $nama_pelanggan = $rowdataNamaPelanggan['nama_pelanggan'];
                    }
                }

                $stmt->close();
                return $nama_pelanggan;
            }

            function getStokBarang($conn, $id_barang) {
                $queryShowSubtotal = "SELECT * FROM stok WHERE id_barang = ?";
                $stmt = $conn->prepare($queryShowSubtotal);
                $stmt->bind_param("i", $id_barang);
                $stmt->execute();
                $resultStok = $stmt->get_result();
            
                $jumlah_barang = 0;
            
                if ($resultStok->num_rows > 0) {
                    while ($rowdataStok = $resultStok->fetch_assoc()) {
                        $jumlah_barang = $rowdataStok['jumlah_barang'];
                    }
                }
            
                $stmt->close();
            
                // Kurangi jumlah stok berdasarkan data sesi
                if (!empty($_SESSION['penjualanData'])) {
                    foreach ($_SESSION['penjualanData'] as $item) {
                        if ($item['id_barang'] == $id_barang) {
                            $jumlah_barang -= $item['qty'];
                        }
                    }
                }
            
                return $jumlah_barang;
            }

            function getNamaBarang($conn, $id_barang) {
                $queryShowNamaBarang = "SELECT * FROM barang WHERE id = ? LIMIT 1";
                $stmt = $conn->prepare($queryShowNamaBarang);
                $stmt->bind_param("i", $id_barang);
                $stmt->execute();
                $resultBarang = $stmt->get_result();
            
                $nama_barang = "";
            
                if ($resultBarang->num_rows > 0) {
                    while ($rowdataBarang = $resultBarang->fetch_assoc()) {
                        $nama_barang = $rowdataBarang['nama_barang'];
                    }
                }
            
                $stmt->close();           
                return $nama_barang;
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (isset($_POST['tambah_transaksi_penjualan'])) {

                    // Inisialisasi array untuk menyimpan data penjualan
                    if (!isset($_SESSION['penjualanData'])) {
                        $_SESSION['penjualanData'] = [];
                    }

                    $kd_penjualan = intval($_POST['kd_penjualan']);
                    $id_pelanggan = intval($_POST['id_pelanggan']);
                    $kasir = mysqli_real_escape_string($conn, $_POST['kasir']);
                    $id_barang = intval($_POST['id_barang']);
                    $qty = intval($_POST['qty']);

                    $queryBarang = "SELECT * FROM barang WHERE id = ? LIMIT 1";
                    $stmt = $conn->prepare($queryBarang);
                    $stmt->bind_param("i", $id_barang);
                    $stmt->execute();
                    $resultqueryStok = $stmt->get_result();
                    $stmt->close();

                    $dataBarang = $resultqueryStok->fetch_assoc();
                    $subtotal_harga = $dataBarang['harga_barang'];

                    $queryStok = "SELECT * FROM stok WHERE id_barang = ? LIMIT 1";
                    $stmt = $conn->prepare($queryStok);
                    $stmt->bind_param("i", $id_barang);
                    $stmt->execute();
                    $resultqueryStok = $stmt->get_result();
                    $stmt->close();

                    $dataStok = $resultqueryStok->fetch_assoc();
                    $jumlah_barang = $dataStok['jumlah_barang'];

                    if (!empty($_SESSION['penjualanData'])) {
                        foreach ($_SESSION['penjualanData'] as $item) {
                            if ($item['id_barang'] == $id_barang) {
                                $jumlah_barang -= $item['qty'];
                            }
                        }
                    }

                    if ($qty <= $jumlah_barang) {
                        $jumlah_barang -= $qty;
                        $transaksi = 1;
                        // Simpan data ke dalam array sesi
                        $_SESSION['penjualanData'][] = [
                            'kd_penjualan' => $kd_penjualan,
                            'id_pelanggan' => $id_pelanggan,
                            'id_barang' => $id_barang,
                            'subtotal_harga' => $subtotal_harga,
                            'qty' => $qty,
                            'total_harga' => $subtotal_harga * $qty,
                            'kasir' => $kasir
                        ];
    
                    } else {
                        echo "<script>";
                        echo "alert('Stok Kurang');";
                        echo "</script>";
                    
                    }

                }
                
                if (isset($_POST['simpan_transaksi_penjualan'])) {
                    $kd_penjualan_array = $_POST['kd_penjualan'];
                    $id_pelanggan_array = $_POST['id_pelanggan'];
                    $id_barang_array = $_POST['id_barang'];
                    $subtotal_harga_array = $_POST['subtotal_harga'];
                    $qty_array = $_POST['qty'];
                    $total_harga_array = $_POST['total_harga'];
                    $kasir_array = $_POST['kasir'];
                
                    for ($i = 0; $i < count($kd_penjualan_array); $i++) {
                        $kd_penjualan = intval($kd_penjualan_array[$i]);
                        $id_pelanggan = intval($id_pelanggan_array[$i]);
                        $id_barang = intval($id_barang_array[$i]);
                        $subtotal_harga = intval($subtotal_harga_array[$i]);
                        $qty = intval($qty_array[$i]);
                        $total_harga = intval($total_harga_array[$i]);
                        $kasir = mysqli_real_escape_string($conn, $kasir_array[$i]);
                
                        // Insert into penjualan
                        for ($j = 1; $j <= $qty; $j++) {
                            $queryInsert = "INSERT INTO penjualan (kd_penjualan, id_pelanggan, id_barang, subtotal_harga, total_harga, kasir) VALUES (?, ?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($queryInsert);
                            $stmt->bind_param("iiiiis", $kd_penjualan, $id_pelanggan, $id_barang, $subtotal_harga, $total_harga, $kasir);
                            $stmt->execute();
                            $stmt->close();
                        }
                
                        // Update stok
                        $queryStok = "SELECT jumlah_barang FROM stok WHERE id_barang = ? LIMIT 1";
                        $stmt = $conn->prepare($queryStok);
                        $stmt->bind_param("i", $id_barang);
                        $stmt->execute();
                        $resultqueryStok = $stmt->get_result();
                        $stmt->close();
                
                        $dataStok = $resultqueryStok->fetch_assoc();
                        $jumlah_barang = $dataStok['jumlah_barang'];
                        $jumlah_barang -= $qty;
                
                        $queryUpdateStok = "UPDATE stok SET jumlah_barang = ? WHERE id_barang = ?";
                        $stmt = $conn->prepare($queryUpdateStok);
                        $stmt->bind_param("ii", $jumlah_barang, $id_barang);
                        $stmt->execute();
                        $stmt->close();
                    }
                
                    echo "<script>";
                    echo "alert('Transaksi Berhasil');";
                    echo "window.location.href = 'penjualan-detail.php?kd_penjualan=$kd_penjualan';"; 
                    echo "</script>";
                }
                
                

            }

        } else {
            echo "<script>";
            echo "alert('Data Sebelumnya Salah!');";
            echo "window.location.href = 'penjualan-tambah.php';"; 
            echo "</script>";
        }

        

    }
    
    