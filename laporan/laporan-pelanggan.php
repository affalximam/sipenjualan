<?php $pageAccess = "allUser"; ?>
<?php $redirect = "./"; ?>
<?php $page = "laporan-pelanggan"; ?>
<?php include ('../backend/connect/conn.php'); ?>
<?php include ('../backend/controllers/sessionController.php'); ?>
<?php include ('../backend/controllers/laporanControllers.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KASIR - LAPORAN - PELANGGAN</title>
</head>
<body>

	<div style="margin-bottom: 5rem;">
		<div>
			<hr style="border: 1px solid black;">
			<h1 style="font-weight: bolder; font-size: 2rem;">LAPORAN PELANGGAN</h1>
		</div>

		<div>
			<p style="margin: 0; font-weight: bold;">DICETAK TANGGAL : <?= date('d/m/Y'); ?></p>
			<hr style="border: 1px solid black;">
		</div>

        <?php if ($showPelanggan == 1) : ?>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 1rem;">
            <thead>
                <tr>
                    <th scope="row" style="border-bottom: 1px solid black; padding: 0.5rem;">NO</th>
                    <td scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Kode Pelanggan</td>
                    <td scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Nama</td>
                    <td scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Alamat</td>
                    <td scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Telepon</td>
                    <td scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Status</td>
                    <td scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Jenis Kelamin</td>
                    <td scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Tanggal Ditambahkan</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataPelanggan as $index => $value) : ?>
                <tr style="border-bottom: 1px solid black">
                    <th scope="row" style="padding: 0.5rem;"><?= htmlspecialchars($index + 1); ?></th>
                    <td scope="col" style="padding: 0.5rem;"><?= htmlspecialchars($value['kd_pelanggan']); ?></td>
                    <td scope="col" style="padding: 0.5rem;"><?= htmlspecialchars($value['nama_pelanggan']); ?></td>
                    <td scope="col" style="padding: 0.5rem;"> <?= htmlspecialchars($value['alamat'] . ', '  . $value['kota']); ?></td>
                    <td scope="col" style="padding: 0.5rem;"><?= htmlspecialchars($value['no_telepon']); ?></td>
                    <td scope="col" style="padding: 0.5rem;"><?= htmlspecialchars($value['status']); ?></td>
                    <td scope="col" style="padding: 0.5rem;"><?= htmlspecialchars($value['jk']); ?></td>
                    <td scope="col" style="padding: 0.5rem;"><?= date('d/m/Y', strtotime($value['created_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <hr style="margin-top: 20px; border: 1px solid black;">
        <?php  endif; ?>

            

	</div>
       
</body>
</html>
