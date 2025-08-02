<?php
include '../backend/connect/conn.php';
require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

if (isset($_GET['jenis_laporan']) && isset($_GET['dari']) && isset($_GET['sampai'])) {
    $jenis_laporan = $_GET['jenis_laporan'];
    $tgl_awal = mysqli_real_escape_string($conn, $_GET['dari']);
    $tgl_akhir = mysqli_real_escape_string($conn, $_GET['sampai']);

    // Start output buffering
    ob_start();
    include($jenis_laporan . '.php');
    $html = ob_get_clean();

    // Load HTML content into dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($_GET['jenis_laporan'] . '.pdf', array("Attachment" => 1));

} else if (isset($_GET['jenis_laporan'])) {

    $jenis_laporan = $_GET['jenis_laporan'];

    // Start output buffering
    ob_start();
    include($jenis_laporan . '.php');
    $html = ob_get_clean();

    // Load HTML content into dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($_GET['jenis_laporan'] . '.pdf', array("Attachment" => 1));

} else {
    die("Error: Missing required parameters.");
}

$conn->close();
