<?php 

    if($page == "stok-list"){      

        if (empty($_GET['s'])) {

            if (empty($_GET['entries'])) {

                if (empty($_GET['page'])) {

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

                    $entries = intval(isset($_GET['entries']) ? $_GET['entries'] : 10);
                    echo "<script>window.location.href = '?entries=$entries&page=1'; </script>";
                
                } else if (!empty($_GET['page'])) {

                    $entries = intval(isset($_GET['entries']) ? $_GET['entries'] : 10);
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

                    $queryTotalRecords = "SELECT COUNT(*) AS total FROM barang";
                    $stmt = $conn->prepare($queryTotalRecords);
                    $stmt->execute();
                    $resultTotalRecords = $stmt->get_result();
                    $totalRecords = $resultTotalRecords->fetch_assoc()['total'];

                    
                    $totalPages = ceil($totalRecords / $entries);
                    $queryShowbarang = "SELECT * FROM barang LIMIT ?, ?";
                    $stmt = $conn->prepare($queryShowbarang);
                    $stmt->bind_param("ii", $start_from, $entries);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $databarangList = array();
                    $showBarang = 0;

                    if ($result->num_rows > 0) {
                        $showBarang = 1;
                        while ($row = $result->fetch_assoc()) {
                            $databarangList[] = $row;
                        }
                    } else {
                        $showBarang = 0;
                        // echo "<script>alert('Tidak ada data ditemukan');</script>";
                        // echo "<script>window.location.href = '?entries=$entries&page=1'; </script>";
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

                if (empty($_GET['page'])) {

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
                    $entries = intval(isset($_GET['entries']) ? $_GET['entries'] : 10);
                    echo "<script>window.location.href = '?s=$search&entries=$entries&page=1'; </script>";
                
                } else if (!empty($_GET['page'])) {

                    $search = mysqli_real_escape_string($conn, $_GET['s']);
                    $entries = intval(isset($_GET['entries']) ? $_GET['entries'] : 10);
                    $page = intval(isset($_GET['page']) ? $_GET['page'] : 1);
                    $start_from = ($page - 1) * $entries;

                    if ($entries === false || $entries <= 0) {

                        $entries = 10;
                        echo "<script>window.location.href = '?s=$search&entries=$entries&page=1';</script>";
                    }

                    if ($page === false || $page <= 0) {
                        $page = 1;
                        echo "<script>window.location.href = '?s=$search&entries=$entries&page=1';</script>";
                    }

                    $queryTotalRecords = "SELECT COUNT(*) AS total FROM barang WHERE kd_barang LIKE ? OR nama_barang LIKE ?";
                    $stmt = $conn->prepare($queryTotalRecords);
                    $searchTerm = "%$search%";
                    $stmt->bind_param("ss", $searchTerm, $searchTerm);
                    $stmt->execute();
                    $resultTotalRecords = $stmt->get_result();

                    $totalRecords = $resultTotalRecords->fetch_assoc()['total'];
                    $totalPages = ceil($totalRecords / $entries);
                    $queryShowbarang = "SELECT * FROM barang WHERE kd_barang LIKE ? OR nama_barang LIKE ? LIMIT ?, ?";
                    $stmt = $conn->prepare($queryShowbarang);
                    $stmt->bind_param("ssii", $searchTerm, $searchTerm, $start_from, $entries);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $databarangList = array();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $databarangList[] = $row;
                        }
                    } else {
                        echo "<script>alert('Tidak ada data ditemukan');</script>";
                        echo "<script>window.location.href = '?entries=$entries&page=$page'; </script>";
                    }

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
                            $html .= '<a href="?s=' . $_GET['s'] . '&entries=' . $_GET['entries'] . '&page=' . ($currentPage - 1) . '" class="btn w-auto rounded-0">Previous</a>';
                        } else {
                            $html .= '<button class="btn w-auto rounded-0 d-none">Previous</button>';
                        }

                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i == $currentPage) {
                                $html .= '<button class="btn w-auto bg-template-blue-2 rounded-0 text-white">' . $i . '</button>';
                            } else {
                                $html .= '<a href="?s=' . $_GET['s'] . '&entries=' . $_GET['entries'] . '&page=' . $i . '" class="btn w-auto rounded-0">' . $i . '</a>';
                            }
                        }

                        if ($currentPage < $totalPages) {
                            $html .= '<a href="?s=' . $_GET['s'] . '&entries=' . $_GET['entries'] . '&page=' . ($currentPage + 1) . '" class="btn w-auto rounded-0">Next</a>';
                        } else {
                            $html .= '<button class="btn w-auto rounded-0 d-none">Next</button>';
                        }

                        $html .= '</div>';
                        return $html;

                    }
                }
            }
        }

        function getTotalQuantity($conn, $id_barang) {

            $queryShowQtyBarang = "SELECT * FROM stok WHERE id_barang = ?";
            $stmt = $conn->prepare($queryShowQtyBarang);
            $stmt->bind_param("i", $id_barang);
            $stmt->execute();
            $resultQtyBarang = $stmt->get_result();

            $totalQty = 0;

            if ($resultQtyBarang->num_rows > 0) {
                while ($rowdataQtyBarang = $resultQtyBarang->fetch_assoc()) {
                    $totalQty = $rowdataQtyBarang['jumlah_barang'];
                }
            }

            $stmt->close();
            return $totalQty;

        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['hapus_barang'])) {

                $id_barang = htmlspecialchars($_POST['id_barang']);
                $queryHapusbarang = "DELETE FROM barang WHERE id = ?";
                $stmt = $conn->prepare($queryHapusbarang);
                $stmt->bind_param("i", $id_barang);

                if ($stmt->execute()) {

                    $queryHapusbarang = "DELETE FROM stok WHERE id_barang = ?";
                    $stmt = $conn->prepare($queryHapusbarang);
                    $stmt->bind_param("i", $id_barang);
                    $stmt->execute();
                    $stmt->close();

                    $queryHapusbarang = "DELETE FROM log WHERE id_barang = ?";
                    $stmt = $conn->prepare($queryHapusbarang);
                    $stmt->bind_param("i", $id_barang);
                    $stmt->execute();
                    $stmt->close();

                    echo "<script>";
                    echo "alert('Data barang berhasil dihapus');";
                    echo "window.location.href = 'stok-list.php';";
                    echo "</script>";
                } else {
                    echo "Error: " . $queryHapusbarang . "<br>" . $conn->error;
                }
            }
        }
        

    } else if ($page == "stok-detail") {

        if (isset($_GET['b'])) {
            $b = mysqli_real_escape_string($conn, $_GET['b']);

            $sql = "SELECT * FROM barang WHERE kd_Barang = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $b);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $dataBarangDetail = $result->fetch_assoc();
            } else {
                header("Location: stok-list.php");
                exit();
            }

            $id_barang = $dataBarangDetail['id'];

            $queryShowLog = "SELECT * FROM log WHERE id_barang = ? ORDER BY id DESC";
            $stmtLog = $conn->prepare($queryShowLog);
            $stmtLog->bind_param("i", $id_barang);
            $stmtLog->execute();
            $resultLog = $stmtLog->get_result();

            $dataLog = [];

            if ($resultLog->num_rows > 0) {
                $showDataLog = 1;
                while ($row = $resultLog->fetch_assoc()) {
                    $dataLog[] = $row;
                }
            } else {
                $showDataLog = 0;
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (isset($_POST['tambah_stok'])) {

                    $kd_barang = intval($_POST['kd_barang']);
                    $id_barang = intval($_POST['id_barang']);
                    $jumlah_barang = intval($_POST['jumlah_barang']);

                    $sql = "SELECT * FROM stok WHERE id_barang = ?";
                    $stmtStokOld = $conn->prepare($sql);
                    $stmtStokOld->bind_param("i", $id_barang);
                    $stmtStokOld->execute();
                    $result = $stmtStokOld->get_result();

                    if ($result->num_rows <= 0) {
                        $sql = "INSERT INTO stok (id_barang, jumlah_barang) VALUES (?, ?)";
                        $stmtInsertStok = $conn->prepare($sql);
                        $stmtInsertStok->bind_param("ii", $id_barang, $jumlah_barang);
                        $stmtInsertStok->execute();
                        $stmtInsertStok->close();
                        
                    } else {
                        $dataStokOld = $result->fetch_assoc();
                        $jumlah_barang += $dataStokOld['jumlah_barang'];

                        $sqlUpdateStok = "UPDATE `stok` SET `jumlah_barang` = ? WHERE `id_barang` = ?";
                        $stmtUpdateStok = $conn->prepare($sqlUpdateStok);
                        $stmtUpdateStok->bind_param("ii", $jumlah_barang, $id_barang);
                        $stmtUpdateStok->execute();
                        $stmtUpdateStok->close();

                    }
            
                    $jumlah_barang = intval($_POST['jumlah_barang']);
                    $sqlInputLog = "INSERT INTO log (id_barang, jumlah_stok) VALUES (?, ?)";
                    $stmtLog = $conn->prepare($sqlInputLog);
                    $stmtLog->bind_param("ii", $id_barang, $jumlah_barang);
                    $stmtLog->execute();
                    $stmtLog->close();
            
                    echo "<script>";
                    echo "alert('Stok Berhasil Ditambahkan');";
                    echo "window.location.href = 'stok-detail.php?b=" . htmlspecialchars($b) . "';";
                    echo "</script>";
                
                } else if (isset($_POST['hapus_stok_terakhir'])) {

                    $id_barang = intval($_POST['id_barang']);

                    $sql = "SELECT * FROM log WHERE id_barang = ? ORDER BY id DESC LIMIT 1";
                    $stmtLogOld = $conn->prepare($sql);
                    $stmtLogOld->bind_param("i", $id_barang);
                    $stmtLogOld->execute();
                    $result = $stmtLogOld->get_result();
                    $dataLogOld = $result->fetch_assoc();

                    $sql = "SELECT * FROM stok WHERE id_barang = ?";
                    $stmtStokOld = $conn->prepare($sql);
                    $stmtStokOld->bind_param("i", $id_barang);
                    $stmtStokOld->execute();
                    $result = $stmtStokOld->get_result();
                    $dataStokOld = $result->fetch_assoc();

                    $jumlah_barang_log_old = $dataLogOld['jumlah_stok'];
                    $jumlah_barang_stok_old = $dataStokOld['jumlah_barang'];
                    $jumlah_barang = $jumlah_barang_stok_old - $jumlah_barang_log_old;

                    $sqlUpdateStok = "UPDATE `stok` SET `jumlah_barang` = ? WHERE `id_barang` = ?";
                    $stmtUpdateStok = $conn->prepare($sqlUpdateStok);
                    $stmtUpdateStok->bind_param("ii", $jumlah_barang, $id_barang);
                    $stmtUpdateStok->execute();
                    $stmtUpdateStok->close();

                    $queryDeleteLastLog = "DELETE FROM `log` WHERE id_barang = ? ORDER BY id DESC LIMIT 1";
                    $stmtLog = $conn->prepare($queryDeleteLastLog);
                    $stmtLog->bind_param("i", $id_barang);
                    $stmtLog->execute();
                    $affectedRowsLog = $stmtLog->affected_rows;
                    $stmtLog->close();

                    if ($affectedRowsLog > 0) {
                        echo "<script>";
                        echo "alert('Stok Terakhir Berhasil Dihapus');";
                        echo "window.location.href = 'stok-detail.php?b=" . htmlspecialchars($b) . "';";
                        echo "</script>";
                    } else {
                        echo "<script>";
                        echo "alert('Stok Kosong');";
                        echo "window.location.href = 'stok-detail.php?b=" . htmlspecialchars($b) . "';";
                        echo "</script>";
                    }

                }
            }   
                
        } else {
            header("Location: stok-list.php");
            exit();
        };
       

    } else if ($page == "stok-tambah") {

        $kd_barang = "";
        $nama_barang = "";
        $harga_barang = "";
        $satuan = "";
        $jenis_barang = "";
        $pemasok = "";
        $qty = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['tambah_barang'])) {

                $kd_barang = htmlspecialchars($_POST['kd_barang']);
                $nama_barang = htmlspecialchars($_POST['nama_barang']);
                $harga_barang = intval($_POST['harga_barang']);
                $satuan = htmlspecialchars($_POST['satuan']);
                $jenis_barang = htmlspecialchars($_POST['jenis_barang']);
                $pemasok = htmlspecialchars($_POST['pemasok']);
                $jumlah_barang = intval($_POST['qty']);

                // Prepared statement
                $stmt = $conn->prepare("SELECT * FROM barang WHERE kd_barang = ?");
                $stmt->bind_param("s", $kd_barang);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows < 1) {
                    // Prepared statement for insertion
                    $stmt = $conn->prepare("INSERT INTO barang (kd_barang, nama_barang, harga_barang, satuan, jenis_barang, pemasok) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssisss", $kd_barang, $nama_barang, $harga_barang, $satuan, $jenis_barang, $pemasok);

                    if ($stmt->execute()) {
                        // Get the inserted id_barang
                        $id_barang = $stmt->insert_id;

                        // Insert into stok table
                        $sqlInputStok = "INSERT INTO stok (id_barang, jumlah_barang) VALUES (?, ?)";
                        $stmtStok = $conn->prepare($sqlInputStok);
                        $stmtStok->bind_param("ii", $id_barang, $jumlah_barang);
                        if ($stmtStok->execute()) {
                            // Insert into log table
                            $sqlInputLog = "INSERT INTO log (id_barang, jumlah_stok) VALUES (?, ?)";
                            $stmtLog = $conn->prepare($sqlInputLog);
                            $stmtLog->bind_param("ii", $id_barang, $jumlah_barang);
                            if ($stmtLog->execute()) {
                                echo "<script>";
                                echo "alert('Data barang berhasil ditambahkan.');";
                                echo "window.location.href = 'stok-detail.php?b=" . htmlspecialchars($kd_barang) . "';";
                                echo "</script>";
                            } else {
                                echo "Error inserting into log table: " . $stmtLog->error;
                            }
                        } else {
                            echo "Error inserting into stok table: " . $stmtStok->error;
                        }
                    } else {
                        echo "Error inserting into barang table: " . $stmt->error;
                    }
                } else {
                    echo "<script>alert('Kd Barang Sudah Ada.');</script>";
                }

                $stmt->close();

            } 

        }

    }

