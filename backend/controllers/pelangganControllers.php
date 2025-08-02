<?php 

    if($page == "pelanggan-list") {

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
        
                    $queryTotalRecords = "SELECT COUNT(*) AS total FROM pelanggan";
                    $stmtTotalRecords = $conn->prepare($queryTotalRecords);
                    $stmtTotalRecords->execute();
                    $resultTotalRecords = $stmtTotalRecords->get_result();
                    $totalRecords = $resultTotalRecords->fetch_assoc()['total'];
                    $totalPages = ceil($totalRecords / $entries);

                    $queryShowPelanggan = "SELECT * FROM pelanggan LIMIT ?, ?";
                    $stmtShowPelanggan = $conn->prepare($queryShowPelanggan);
                    $stmtShowPelanggan->bind_param("ii", $start_from, $entries);
                    $stmtShowPelanggan->execute();
                    $result = $stmtShowPelanggan->get_result();

                    $dataPelangganList = array();

                    if ($result->num_rows > 0) {
                        $showPelangganList = 1;
                        while ($row = $result->fetch_assoc()) {
                            $dataPelangganList[] = $row;
                        }
                    } else {
                        $showPelangganList = 0;
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

                    $stmtTotalRecords->close();
                    $stmtShowPelanggan->close();
                    $conn->close();

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

                    if ($entries === false || $entries <= 0) {
                        $entries = 10;
                        echo "<script>window.location.href = '?s=$search&entries=$entries&page=1';</script>";
                    }
                    if ($page === false || $page <= 0) {
                        $page = 1;
                        echo "<script>window.location.href = '?s=$search&entries=$entries&page=1';</script>";
                    }

                    $totalRow = 0;

                    $search = "%$search%";
                    $queryTotalRecords = "SELECT COUNT(*) AS total FROM pelanggan WHERE kd_pelanggan LIKE ? OR nama_pelanggan LIKE ?";
                    $stmtTotalRecords = $conn->prepare($queryTotalRecords);
                    $stmtTotalRecords->bind_param("ss", $search, $search);
                    $stmtTotalRecords->execute();
                    $resultTotalRecords = $stmtTotalRecords->get_result();

                    if ($resultTotalRecords) {
                        $totalRecords = $resultTotalRecords->fetch_assoc()['total'];
                        $totalPages = ceil($totalRecords / $entries);

                        $queryShowPelanggan = "SELECT * FROM pelanggan WHERE kd_pelanggan LIKE ? OR nama_pelanggan LIKE ? LIMIT ?, ?";
                        $stmtShowPelanggan = $conn->prepare($queryShowPelanggan);
                        $stmtShowPelanggan->bind_param("ssii", $search, $search, $start_from, $entries);
                        $stmtShowPelanggan->execute();
                        $result = $stmtShowPelanggan->get_result();

                        $dataPelangganList = array();

                        if ($result && $result->num_rows > 0) {
                            $showPelangganList = 1;
                            while ($row = $result->fetch_assoc()) {
                                $dataPelangganList[] = $row;
                            }
                        } else {
                            $showPelangganList = 0;
                            echo "<script>alert('Tidak ada data ditemukan');</script>";
                            echo "<script>window.location.href = '?entries=$entries&page=$page'; </script>";
                        }
                    } else {
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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['hapus_pelanggan'])) {
                $id_pelanggan = htmlspecialchars($_POST['id_pelanggan']);
                $queryHapusPelanggan = "DELETE FROM pelanggan WHERE id_pelanggan = $id_pelanggan";
                    
                if ($conn->query($queryHapusPelanggan)) {
                    echo "<script>";
                    echo "alert('Data pelanggan berhasil dihapus');";
                    echo "window.location.href = 'index.php';"; 
                    echo "</script>";
                } else {
                    echo "Error: " . $queryHapusPelanggan . "<br>" . $conn->error;
                }
            }
        };
        

        

        


    } else if ($page == "pelanggan-detail") {

        if (isset($_GET['p'])) {
            $p = mysqli_real_escape_string($conn, $_GET['p']);

            $sql = "SELECT * FROM pelanggan WHERE kd_pelanggan = '$p'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $dataPelangganDetail = $result->fetch_assoc();
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
            
        };

        $conn->close();

    } else if ($page == "pelanggan-tambah") {

        $kd_pelanggan = " ";
        $nama_pelanggan = " ";
        $jk = " ";
        $kota = " ";
        $alamat = " ";
        $no_telepon = " ";
        $status = " ";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['tambah_pelanggan'])) {

                $kd_pelanggan = htmlspecialchars($_POST['kd_pelanggan']);
                $nama_pelanggan = htmlspecialchars($_POST['nama_pelanggan']);
                $jk = htmlspecialchars($_POST['jk']);
                $kota = htmlspecialchars($_POST['kota']);
                $alamat = htmlspecialchars($_POST['alamat']);
                $no_telepon = htmlspecialchars($_POST['no_telepon']);
                $status = htmlspecialchars($_POST['status']);

                $sql = "SELECT * FROM pelanggan WHERE kd_pelanggan = '$kd_pelanggan'";
                $result = $conn->query($sql);

                if ($result->num_rows < 1) {
                    $sql = "INSERT INTO pelanggan (kd_pelanggan, nama_pelanggan, jk, kota, alamat, no_telepon, status) VALUES ('$kd_pelanggan', '$nama_pelanggan', '$jk', '$kota', '$alamat', '$no_telepon', '$status')";
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Data pelanggan berhasil ditambahkan.');</script>";
                        echo "<meta http-equiv='refresh' content='0; url=pelanggan-detail.php?p=$kd_pelanggan'>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    
                } else {
                    echo "<script>alert('Kd Pelanggan Sudah Ada.');</script>";
                    
                }
                $conn->close();

            } 

        }

    }