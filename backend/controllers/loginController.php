<?php 

    session_start();

    if (isset($_SESSION['user'])) {
        $redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        header("Location: $redirect_url");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $stmt = $conn->prepare("SELECT * FROM user WHERE name=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $_SESSION['user'] = $username;
            $stmt->close();
            $conn->close();
            header("Location: index.php"); 
            exit();
        } else {
            echo "<script>alert('Nama dan Password Salah')</script>";
            header("Refresh:0; url=login.php"); 
            exit();
        }
    }