<?php $pageAccess = "Kasir"; ?>
<?php $redirect = "pelanggan-list.php"; ?>
<?php $page = "pelanggan-tambah"; ?>
<?php include ('../backend/connect/conn.php'); ?>
<?php include ('../backend/controllers/sessionController.php'); ?>
<?php include ('../backend/controllers/pelangganControllers.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($sessionUser); ?> - PELANGGAN - TAMBAH</title>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/boxicons.min.css" rel="stylesheet">
    <link href="../asset/css/style.css" rel="stylesheet">
</head>
<body class="row">

    <aside class="sidebar d-none d-lg-block col-lg-3 col-xxl-2 pe-0 bg-dark">
        <div class="sidebar-content d-flex flex-column text-bg-dark">
            <a href="" class="sidebar-title py-3 text-white text-center text-decoration-none bg-template-blue-2 fs-3">
                SI Penjualan
            </a>
            <h2 class="ms-4 my-3 fs-5">MENU</h2>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a href="../" class="nav-link text-white border-bottom py-3 ps-4" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="white" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64 24c0 22.1 17.9 40 40 40h24 32.5c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1h16c22.1 0 40-17.9 40-40V455.8c.3-2.6 .5-5.3 .5-8.1l-.7-160.2h32z"/></svg>
                        Home
                    </a>
                </li>
                <?php if ($sessionLayoutType == 1) : ?>
                    <li>
                        <a href="../penjualan/" class="nav-link text-white border-bottom py-3 ps-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg"  class="me-2" width="16" height="16" fill="white" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H69.5c3.8 0 7.1 2.7 7.9 6.5l51.6 271c6.5 34 36.2 58.5 70.7 58.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H199.7c-11.5 0-21.4-8.2-23.6-19.5L170.7 288H459.2c32.6 0 61.1-21.8 69.5-53.3l41-152.3C576.6 57 557.4 32 531.1 32H360V134.1l23-23c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-64 64c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l23 23V32H120.1C111 12.8 91.6 0 69.5 0H24zM176 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm336-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/></svg>
                            Penjualan
                        </a>
                    </li>
                    <li>
                        <a href="../stok/" class="nav-link text-white border-bottom py-3 ps-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg"class="me-2" width="16" height="16" fill="white"  viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/></svg>
                            Stok
                        </a>
                    </li>
                    <li>
                        <a href="../pelanggan/" class="nav-link active text-white border-bottom py-3 ps-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="white" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                            Pelanggan
                        </a>
                    </li>
                <?php elseif( $sessionLayoutType == 2) : ?>
                    <li class="nav-link nav-link-dropdown text-white border-bottom py-3 ps-4">
                        <div class="d-flex justify-content-between">
                            <a class="text-white m-0 p-0 text-decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="white" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"/></svg>
                                Data
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="white" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                        </div>
                    </li>
                    <li class="nav-link-dropdown-content d-none">
                        <a href="../penjualan/" class="nav-link text-white border-bottom py-2 ps-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg"  class="me-2" width="16" height="16" fill="white" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H69.5c3.8 0 7.1 2.7 7.9 6.5l51.6 271c6.5 34 36.2 58.5 70.7 58.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H199.7c-11.5 0-21.4-8.2-23.6-19.5L170.7 288H459.2c32.6 0 61.1-21.8 69.5-53.3l41-152.3C576.6 57 557.4 32 531.1 32H360V134.1l23-23c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-64 64c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l23 23V32H120.1C111 12.8 91.6 0 69.5 0H24zM176 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm336-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/></svg>
                            Penjualan
                        </a>
                        <a href="../stok/" class="nav-link text-white border-bottom py-2 ps-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg"class="me-2" width="16" height="16" fill="white"  viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/></svg>
                            Stok
                        </a>
                        <a href="../pelanggan/" class="nav-link text-white border-bottom py-2 ps-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="white" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                            Pelanggan
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="../laporan/" class="nav-link text-white border-bottom py-3 ps-4 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="white" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg>
                        Laporan
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="main col-12 col-md-12 col-lg-9 col-xxl-10 p-0">
        <nav class="navbar navbar-expand-none bg-template-blue navbar-dark ps-3 py-0">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand d-flex bg-template-blue-1 m-0 px-5 py-4 align-items-center" href="#">
                    <img src="../asset/images/person-1.webp" alt="Bootstrap" width="30" height="30">
                    <p class="ms-3 my-auto pb-0"><?= htmlspecialchars($sessionUser); ?></p>
                </a>
                <div class="card account-dropdown text-center d-none border-none">
                    <div class="bg-template-blue pt-3 pb-2">
                        <figure class="border rounded-circle border-5 mx-auto">
                            <img src="../asset/images/person-1.webp" alt="...">
                        </figure>
                        <p class="text-white"><?= htmlspecialchars($sessionUser); ?> - Admin </p>
                    </div>
                    <div class="bg-white py-3">
                        <a href="../logout.php" class="btn btn-md bg-transparent text-black border border-secondary-subtle">Logout</a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="content p-5 pt-1 bg-secondary-subtle">
            <h1 class="my-2">PELANGGAN <span class="fs-4 text-secondary">TAMBAH</span></h1>
            <form class="bg-light px-3 pt-3" method="post">
                <div class="row py-3 px-3">
                    <table class="table table-light">
                        <tr class="border-top">
                            <td class="col-3">
                                <p class="fw-bold">Kode Pelanggan</p>
                            </td>
                            <td class="col-6">
                                <div class="d-flex">
                                    <label class="pe-2">:</label>
                                    <?php if (isset($_POST['tambah_pelanggan'])) { ?>
                                        <input type="text" class="form-control w-100 border border-3 border-danger" checked name="kd_pelanggan" required value="">
                                    <?php } else { ?>
                                        <input type="text" class="form-control w-100" name="kd_pelanggan" required value="">
                                    <?php } ?>
                                </td>
                            </div>
                        </tr>
                        <tr class="border-top">
                            <td class="col-3">
                                <p class="fw-bold">Nama Pelanggan</p>
                            </td>
                            <td class="col-6">
                                <div class="d-flex">
                                    <label class="pe-2">:</label>
                                    <input type="text" class="form-control w-100" name="nama_pelanggan" required value="<?= htmlspecialchars($nama_pelanggan); ?>">
                                </td>
                            </di>
                        </tr>
                        <tr class="border-top">
                            <td class="col-3">
                                <p class="fw-bold">Jenis Kelamin</p>
                            </td>
                            <td class="col-6">
                                <div class="d-flex">
                                    <label class="pe-2">:</label>
                                    <div class="d-flex flex-column ps-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk" id="jenisKelaminPria" value="Pria" required <?php if ($jk == "Pria") echo "checked"; ?>>
                                            <label class="form-check-label" for="jenisKelaminPria">
                                                Pria
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk" id="jenisKelaminWanita" value="Wanita" required <?php if ($jk == "Wanita") echo "checked"; ?>>
                                            <label class="form-check-label" for="jenisKelaminWanita">
                                                Wanita
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-top">
                            <td class="col-3">
                                <p class="fw-bold">Kota</p>
                            </td>
                            <td class="col-6">
                                <div class="d-flex">
                                    <label class="pe-2">:</label>
                                    <input type="text" class="form-control w-100" name="kota" required value="<?= htmlspecialchars($kota); ?>">
                                </td>
                            </div>
                        </tr>
                        <tr class="border-top">
                            <td class="col-3">
                                <p class="fw-bold">Alamat</p>
                            </td>
                            <td class="col-6">
                                <div class="d-flex">
                                    <label class="pe-2">:</label>
                                    <textarea type="text" class="form-control w-100" name="alamat" required ><?= htmlspecialchars($alamat); ?></textarea>
                                </td>
                            </div>
                        </tr>
                        <tr class="border-top">
                            <td class="col-3">
                                <p class="fw-bold">Nomor Telepon</p>
                            </td>
                            <td class="col-6">
                                <div class="d-flex">
                                    <label class="pe-2">:</label>
                                    <input type="number" class="form-control w-100" name="no_telepon" required value="<?= htmlspecialchars($no_telepon); ?>">
                                </td>
                            </div>
                        </tr>
                        <tr class="border-top">
                            <td class="col-3">
                                <p class="fw-bold">Status</p>
                            </td>
                            <td class="col-6">
                                <div class="d-flex">
                                    <label class="pe-2">:</label>
                                    <div class="d-flex flex-column ps-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="statusInternal" value="Internal" required <?php if ($status == "Internal") echo "checked"; ?>>
                                            <label class="form-check-label" for="statusInternal">
                                                Internal
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="statusExternal" value="External" required <?php if ($status == "External") echo "checked"; ?>>
                                            <label class="form-check-label" for="statusExternal">
                                                External
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    </table>
                </div>

                <div class="row pb-4 px-2">
                    <div class="col-6 d-flex justify-content-start">
                        <a href="../pelanggan/" class="btn btn-md btn-primary w-auto bg-template-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg align-self-center" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                            </svg>
                            BATAL
                        </a>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <button type="submit" class="btn btn-md btn-success w-auto" name="tambah_pelanggan">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                            SIMPAN
                        </button>
                    </div>
                </div>

            </form>
        </section>
    </main>
        
    <script src="../asset/js/jquery-3.7.1.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/script.js"></script>
</body>
</html>
