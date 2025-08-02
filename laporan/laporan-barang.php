<?php $pageAccess = "allUser"; ?>
<?php $redirect = "./"; ?>
<?php $page = "laporan-barang"; ?>
<?php include ('../backend/connect/conn.php'); ?>
<?php include ('../backend/controllers/sessionController.php'); ?>
<?php include ('../backend/controllers/laporanControllers.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KASIR - LAPORAN - BARANG</title>
</head>
<body>

	<div style="margin-bottom: 5rem;">
		<div>
			<hr style="border: 1px solid black;">
			<h1 style="font-weight: bolder; font-size: 2rem;">LAPORAN BARANG</h1>
		</div>

		<div>
			<p style="margin: 0; font-weight: bold;">DICETAK TANGGAL : <?= date('d/m/Y'); ?></p>
			<hr style="border: 1px solid black;">
		</div>

		<?php foreach ($dataBarang as $key => $value) : ?>

            <?php $id_barang = intval($value['id']); ?>
            <?php $stok = getStok($conn, $id_barang)?>

			<div style="margin-bottom: 30px; margin-top: 30px;">
				<p style="margin: 0; font-weight: bold;">KODE BARANG : <?= htmlspecialchars($value['kd_barang']); ?></p>
				<p style="margin: 0; font-weight: bold;">NAMA BARANG : <?= htmlspecialchars($value['nama_barang']); ?></p>
				<p style="margin: 0; font-weight: bold;">HARGA BARANG : <?= htmlspecialchars($value['harga_barang']); ?></p>
				<p style="margin: 0; font-weight: bold;">TANGGAL DITAMBAHKAN :  <?= date('d/m/Y', strtotime($value['created_at'])); ?></p>
                
				<p style="margin: 0; font-weight: bold;">JUMLAH STOK :  <?= htmlspecialchars($stok); ?></p>
			</div>
            
            
            
            <div style="text-align: center;">
                <?php $logBarang = getLogBarang($conn, $id_barang); ?>
                <?php if ($logBarang == 0) {?>
                
                <?php } else { ?>
                    <h3>LOG BARANG</h3>
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 1rem;">
                        <thead>
                            <tr>
                                <th scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">No</th>
                                <th scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Kode Barang</th>
                                <th scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Jumlah Stok</th>
                                <th scope="col" style="border-bottom: 1px solid black; padding: 0.5rem;">Tanggal Restok</th>
                            </tr>
                        </thead>
                        <tbody>
                                
                            <?php  foreach ($logBarang as $index => $row) : ?>
                                <tr>
                                    <th scope="row" style="font-weight: 500; padding: 0.5rem;"><?= htmlspecialchars($index + 1); ?></th>
                                    <th scope="col" style="font-weight: 500; padding: 0.5rem;"><?= htmlspecialchars($row['jumlah_stok']); ?></th>
                                    <th scope="col" style="font-weight: 500; padding: 0.5rem;"><?= htmlspecialchars($row['jumlah_stok']); ?></th>
                                    <th scope="col" style="font-weight: 500; padding: 0.5rem;"><?= date('d/m/Y', strtotime($row['restock_at'])); ?></th>
                                </tr>
                            <?php endforeach; ?>
                                
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            
				<hr style="margin-top: 20px; border: 1px solid black;">
		<?php endforeach; ?>
	</div>
       
</body>
</html>
