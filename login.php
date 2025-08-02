<?php include 'backend/connect/conn.php'; ?>
<?php include 'backend/controllers/loginController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body class="bg-dark-subtle">

    <section class="login d-flex flex-column justify-content-center align-items-center text-center">
        <div class="container">
            <img src="asset/images/person-1.webp" width="150px">
            <div class="card bg-light p-5">
                <h1 class="mb-3">Login untuk masuk ke dalam sistem</h1>
                <form method="POST">
                    <div class="row">
                        <div class="col-xl-4 offset-xl-4 col-sm-6 offset-sm-3">
                            <div class="form-floating mb-3 mx-auto w-100">
                                <input type="text" name="username" class="form-control bg-light border border-dark-subtle rounded-3" id="floatingInput" placeholder="nama" required>
                                <label for="floatingInput" class="text-body-tertiary">Nama</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 offset-xl-4 col-sm-6 offset-sm-3">
                            <div class="form-floating mb-3 mx-auto w-100">
                                <input type="password" name="password" class="form-control bg-light border border-dark-subtle rounded-3" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword" class="text-body-tertiary">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <button type="submit" name="login" class="btn btn-primary bg-template-blue w-100">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <script src="asset/js/jquery-3.7.1.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/script.js"></script>
</body>
</html>