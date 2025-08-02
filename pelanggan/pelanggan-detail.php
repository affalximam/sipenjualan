<?php $pageAccess = "allUser"; ?>
<?php $redirect = "pelanggan-list.php"; ?>
<?php $page = "pelanggan-detail"; ?>
<?php include ('../backend/connect/conn.php'); ?>
<?php include ('../backend/controllers/sessionController.php'); ?>
<?php include ('../backend/controllers/pelangganControllers.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($sessionUser); ?> - PELANGGAN - DETAIL <?= htmlspecialchars($dataPelangganDetail['nama_pelanggan']) ?></title>
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
            <h1 class="my-2">PELANGGAN <span class="fs-4 text-secondary">DETAIL <?= htmlspecialchars($dataPelangganDetail['nama_pelanggan']) ?></span></h1>
            <div class="bg-light p-2 pt-3 pb-5">
                <div class="container rounded-2 container-type-1">
                    <div class="row px-4 pt-3">
                        <p class="fs-5 m-0 fw-bold">
                            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" width="20" height="20" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="-1 -256 1792 1792" id="svg3025" version="1.1" inkscape:version="0.48.3.1 r9886" width="100%" height="100%" sodipodi:docname="book_font_awesome.svg">
                                <defs id="defs3033" />
                                <sodipodi:namedview pagecolor="#ffffff" bordercolor="#666666" borderopacity="1" objecttolerance="10" gridtolerance="10" guidetolerance="10" inkscape:pageopacity="0" inkscape:pageshadow="2" inkscape:window-width="640" inkscape:window-height="480" id="namedview3031" showgrid="false" inkscape:zoom="0.13169643" inkscape:cx="896" inkscape:cy="896" inkscape:window-x="0" inkscape:window-y="25" inkscape:window-maximized="0" inkscape:current-layer="svg3025" />
                                <g transform="matrix(1,0,0,-1,53.152542,1270.2373)" id="g3027">
                                    <path d="m 1639,1058 q 40,-57 18,-129 L 1382,23 Q 1363,-41 1305.5,-84.5 1248,-128 1183,-128 H 260 q -77,0 -148.5,53.5 Q 40,-21 12,57 q -24,67 -2,127 0,4 3,27 3,23 4,37 1,8 -3,21.5 -4,13.5 -3,19.5 2,11 8,21 6,10 16.5,23.5 Q 46,347 52,357 q 23,38 45,91.5 22,53.5 30,91.5 3,10 0.5,30 -2.5,20 -0.5,28 3,11 17,28 14,17 17,23 21,36 42,92 21,56 25,90 1,9 -2.5,32 -3.5,23 0.5,28 4,13 22,30.5 18,17.5 22,22.5 19,26 42.5,84.5 23.5,58.5 27.5,96.5 1,8 -3,25.5 -4,17.5 -2,26.5 2,8 9,18 7,10 18,23 11,13 17,21 8,12 16.5,30.5 8.5,18.5 15,35 6.5,16.5 16,36 9.5,19.5 19.5,32 10,12.5 26.5,23.5 16.5,11 36,11.5 19.5,0.5 47.5,-5.5 l -1,-3 q 38,9 51,9 h 761 q 74,0 114,-56 40,-56 18,-130 L 1225,316 Q 1189,197 1153.5,162.5 1118,128 1025,128 H 156 Q 129,128 118,113 107,97 117,70 141,0 261,0 h 923 q 29,0 56,15.5 27,15.5 35,41.5 l 300,987 q 7,22 5,57 38,-15 59,-43 z m -1064,-2 q -4,-13 2,-22.5 6,-9.5 20,-9.5 h 608 q 13,0 25.5,9.5 12.5,9.5 16.5,22.5 l 21,64 q 4,13 -2,22.5 -6,9.5 -20,9.5 H 638 q -13,0 -25.5,-9.5 Q 600,1133 596,1120 z M 492,800 q -4,-13 2,-22.5 6,-9.5 20,-9.5 h 608 q 13,0 25.5,9.5 12.5,9.5 16.5,22.5 l 21,64 q 4,13 -2,22.5 -6,9.5 -20,9.5 H 555 q -13,0 -25.5,-9.5 Q 517,877 513,864 z" id="path3029" inkscape:connector-curvature="0" style="fill:currentColor" />
                                </g>
                            </svg>
                            TANGGAL DAFTAR
                        </p>
                        <p class="fw-normal"><?= htmlspecialchars(date('M d, Y', strtotime($dataPelangganDetail['created_at']))) ?></p>
                    </div>

                    <div class="row px-4 pt-1">
                        <p class="fs-5 m-0 fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                           KOTA
                        </p>
                        <p class="fw-normal">Jakarta</p>
                    </div>

                    <div class="row px-4 pt-1">
                        <p class="fs-5 m-0 fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                            ALAMAT
                        </p>
                        <p class="fw-normal"><?= htmlspecialchars($dataPelangganDetail['alamat']) ?></p>
                    </div>

                    <div class="row px-4 pt-1">
                        <p class="fs-5 m-0 fw-bold">
                            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" width="20" height="20" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="-1 -256 1792 1792" id="svg3025" version="1.1" inkscape:version="0.48.3.1 r9886" width="100%" height="100%" sodipodi:docname="book_font_awesome.svg">
                                <defs id="defs3033" />
                                <sodipodi:namedview pagecolor="#ffffff" bordercolor="#666666" borderopacity="1" objecttolerance="10" gridtolerance="10" guidetolerance="10" inkscape:pageopacity="0" inkscape:pageshadow="2" inkscape:window-width="640" inkscape:window-height="480" id="namedview3031" showgrid="false" inkscape:zoom="0.13169643" inkscape:cx="896" inkscape:cy="896" inkscape:window-x="0" inkscape:window-y="25" inkscape:window-maximized="0" inkscape:current-layer="svg3025" />
                                <g transform="matrix(1,0,0,-1,53.152542,1270.2373)" id="g3027">
                                    <path d="m 1639,1058 q 40,-57 18,-129 L 1382,23 Q 1363,-41 1305.5,-84.5 1248,-128 1183,-128 H 260 q -77,0 -148.5,53.5 Q 40,-21 12,57 q -24,67 -2,127 0,4 3,27 3,23 4,37 1,8 -3,21.5 -4,13.5 -3,19.5 2,11 8,21 6,10 16.5,23.5 Q 46,347 52,357 q 23,38 45,91.5 22,53.5 30,91.5 3,10 0.5,30 -2.5,20 -0.5,28 3,11 17,28 14,17 17,23 21,36 42,92 21,56 25,90 1,9 -2.5,32 -3.5,23 0.5,28 4,13 22,30.5 18,17.5 22,22.5 19,26 42.5,84.5 23.5,58.5 27.5,96.5 1,8 -3,25.5 -4,17.5 -2,26.5 2,8 9,18 7,10 18,23 11,13 17,21 8,12 16.5,30.5 8.5,18.5 15,35 6.5,16.5 16,36 9.5,19.5 19.5,32 10,12.5 26.5,23.5 16.5,11 36,11.5 19.5,0.5 47.5,-5.5 l -1,-3 q 38,9 51,9 h 761 q 74,0 114,-56 40,-56 18,-130 L 1225,316 Q 1189,197 1153.5,162.5 1118,128 1025,128 H 156 Q 129,128 118,113 107,97 117,70 141,0 261,0 h 923 q 29,0 56,15.5 27,15.5 35,41.5 l 300,987 q 7,22 5,57 38,-15 59,-43 z m -1064,-2 q -4,-13 2,-22.5 6,-9.5 20,-9.5 h 608 q 13,0 25.5,9.5 12.5,9.5 16.5,22.5 l 21,64 q 4,13 -2,22.5 -6,9.5 -20,9.5 H 638 q -13,0 -25.5,-9.5 Q 600,1133 596,1120 z M 492,800 q -4,-13 2,-22.5 6,-9.5 20,-9.5 h 608 q 13,0 25.5,9.5 12.5,9.5 16.5,22.5 l 21,64 q 4,13 -2,22.5 -6,9.5 -20,9.5 H 555 q -13,0 -25.5,-9.5 Q 517,877 513,864 z" id="path3029" inkscape:connector-curvature="0" style="fill:currentColor" />
                                </g>
                            </svg>
                            NO. TELEPON
                        </p>
                        <p class="fw-normal"><?= htmlspecialchars($dataPelangganDetail['no_telepon']) ?></p>
                    </div>

                    <div class="row px-4 pt-1">
                        <p class="fs-5 m-0 fw-bold">
                            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" width="20" height="20" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="-1 -256 1792 1792" id="svg3025" version="1.1" inkscape:version="0.48.3.1 r9886" width="100%" height="100%" sodipodi:docname="book_font_awesome.svg">
                                <defs id="defs3033" />
                                <sodipodi:namedview pagecolor="#ffffff" bordercolor="#666666" borderopacity="1" objecttolerance="10" gridtolerance="10" guidetolerance="10" inkscape:pageopacity="0" inkscape:pageshadow="2" inkscape:window-width="640" inkscape:window-height="480" id="namedview3031" showgrid="false" inkscape:zoom="0.13169643" inkscape:cx="896" inkscape:cy="896" inkscape:window-x="0" inkscape:window-y="25" inkscape:window-maximized="0" inkscape:current-layer="svg3025" />
                                <g transform="matrix(1,0,0,-1,53.152542,1270.2373)" id="g3027">
                                    <path d="m 1639,1058 q 40,-57 18,-129 L 1382,23 Q 1363,-41 1305.5,-84.5 1248,-128 1183,-128 H 260 q -77,0 -148.5,53.5 Q 40,-21 12,57 q -24,67 -2,127 0,4 3,27 3,23 4,37 1,8 -3,21.5 -4,13.5 -3,19.5 2,11 8,21 6,10 16.5,23.5 Q 46,347 52,357 q 23,38 45,91.5 22,53.5 30,91.5 3,10 0.5,30 -2.5,20 -0.5,28 3,11 17,28 14,17 17,23 21,36 42,92 21,56 25,90 1,9 -2.5,32 -3.5,23 0.5,28 4,13 22,30.5 18,17.5 22,22.5 19,26 42.5,84.5 23.5,58.5 27.5,96.5 1,8 -3,25.5 -4,17.5 -2,26.5 2,8 9,18 7,10 18,23 11,13 17,21 8,12 16.5,30.5 8.5,18.5 15,35 6.5,16.5 16,36 9.5,19.5 19.5,32 10,12.5 26.5,23.5 16.5,11 36,11.5 19.5,0.5 47.5,-5.5 l -1,-3 q 38,9 51,9 h 761 q 74,0 114,-56 40,-56 18,-130 L 1225,316 Q 1189,197 1153.5,162.5 1118,128 1025,128 H 156 Q 129,128 118,113 107,97 117,70 141,0 261,0 h 923 q 29,0 56,15.5 27,15.5 35,41.5 l 300,987 q 7,22 5,57 38,-15 59,-43 z m -1064,-2 q -4,-13 2,-22.5 6,-9.5 20,-9.5 h 608 q 13,0 25.5,9.5 12.5,9.5 16.5,22.5 l 21,64 q 4,13 -2,22.5 -6,9.5 -20,9.5 H 638 q -13,0 -25.5,-9.5 Q 600,1133 596,1120 z M 492,800 q -4,-13 2,-22.5 6,-9.5 20,-9.5 h 608 q 13,0 25.5,9.5 12.5,9.5 16.5,22.5 l 21,64 q 4,13 -2,22.5 -6,9.5 -20,9.5 H 555 q -13,0 -25.5,-9.5 Q 517,877 513,864 z" id="path3029" inkscape:connector-curvature="0" style="fill:currentColor" />
                                </g>
                            </svg>
                            JENIS KELAMIN
                        </p>
                        <p class="fw-normal"><?= htmlspecialchars($dataPelangganDetail['jk']) ?></p>
                    </div>

                    <div class="row px-4 pt-1">
                        <p class="fs-5 m-0 fw-bold">
                            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" width="20" height="20" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="-1 -256 1792 1792" id="svg3025" version="1.1" inkscape:version="0.48.3.1 r9886" width="100%" height="100%" sodipodi:docname="book_font_awesome.svg">
                                <defs id="defs3033" />
                                <sodipodi:namedview pagecolor="#ffffff" bordercolor="#666666" borderopacity="1" objecttolerance="10" gridtolerance="10" guidetolerance="10" inkscape:pageopacity="0" inkscape:pageshadow="2" inkscape:window-width="640" inkscape:window-height="480" id="namedview3031" showgrid="false" inkscape:zoom="0.13169643" inkscape:cx="896" inkscape:cy="896" inkscape:window-x="0" inkscape:window-y="25" inkscape:window-maximized="0" inkscape:current-layer="svg3025" />
                                <g transform="matrix(1,0,0,-1,53.152542,1270.2373)" id="g3027">
                                    <path d="m 1639,1058 q 40,-57 18,-129 L 1382,23 Q 1363,-41 1305.5,-84.5 1248,-128 1183,-128 H 260 q -77,0 -148.5,53.5 Q 40,-21 12,57 q -24,67 -2,127 0,4 3,27 3,23 4,37 1,8 -3,21.5 -4,13.5 -3,19.5 2,11 8,21 6,10 16.5,23.5 Q 46,347 52,357 q 23,38 45,91.5 22,53.5 30,91.5 3,10 0.5,30 -2.5,20 -0.5,28 3,11 17,28 14,17 17,23 21,36 42,92 21,56 25,90 1,9 -2.5,32 -3.5,23 0.5,28 4,13 22,30.5 18,17.5 22,22.5 19,26 42.5,84.5 23.5,58.5 27.5,96.5 1,8 -3,25.5 -4,17.5 -2,26.5 2,8 9,18 7,10 18,23 11,13 17,21 8,12 16.5,30.5 8.5,18.5 15,35 6.5,16.5 16,36 9.5,19.5 19.5,32 10,12.5 26.5,23.5 16.5,11 36,11.5 19.5,0.5 47.5,-5.5 l -1,-3 q 38,9 51,9 h 761 q 74,0 114,-56 40,-56 18,-130 L 1225,316 Q 1189,197 1153.5,162.5 1118,128 1025,128 H 156 Q 129,128 118,113 107,97 117,70 141,0 261,0 h 923 q 29,0 56,15.5 27,15.5 35,41.5 l 300,987 q 7,22 5,57 38,-15 59,-43 z m -1064,-2 q -4,-13 2,-22.5 6,-9.5 20,-9.5 h 608 q 13,0 25.5,9.5 12.5,9.5 16.5,22.5 l 21,64 q 4,13 -2,22.5 -6,9.5 -20,9.5 H 638 q -13,0 -25.5,-9.5 Q 600,1133 596,1120 z M 492,800 q -4,-13 2,-22.5 6,-9.5 20,-9.5 h 608 q 13,0 25.5,9.5 12.5,9.5 16.5,22.5 l 21,64 q 4,13 -2,22.5 -6,9.5 -20,9.5 H 555 q -13,0 -25.5,-9.5 Q 517,877 513,864 z" id="path3029" inkscape:connector-curvature="0" style="fill:currentColor" />
                                </g>
                            </svg>
                            STATUS
                        </p>
                        <p class="fw-normal"><?= htmlspecialchars($dataPelangganDetail['status']) ?></p>
                        <hr>
                    </div>

                    <hr>

                    <div class="row px-4 pb-4 px-2">
                        <a href="../pelanggan/" class="btn btn-md btn-primary border-0 w-auto bg-template-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg align-self-center" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                </svg>
                            KEMBALI
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </main>
        
    <script src="../asset/js/jquery-3.7.1.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/script.js"></script>
</body>
</html>
