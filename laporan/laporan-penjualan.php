<?php $pageAccess = "allUser"; ?>
<?php $redirect = "./"; ?>
<?php $page = "laporan-penjualan"; ?>
<?php include ('../backend/connect/conn.php'); ?>
<?php include ('../backend/controllers/sessionController.php'); ?>
<?php include ('../backend/controllers/laporanControllers.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KASIR - LAPORAN - PENJUALAN</title>
</head>
<body>

	<div style="margin-bottom: 5rem;">
		<div>
			<hr style="border: 1px solid black;">
			<h1 style="font-weight: bolder; font-size: 2rem;">LAPORAN PENJUALAN</h1>
		</div>

		<div>
			<?php if ($showTanggal == 1) :?>
				<p style="margin: 0; font-weight: bold;">DARI TANGGAL : <?= date('d/m/Y', strtotime($dariTgl)); ?></p>
				<p style="margin: 0; font-weight: bold;">SAMPAI TANGGAL : <?= date('d/m/Y', strtotime($sampaiTgl)); ?></p>
			<?php endif; ?>
			<hr style="border: 1px solid black;">
		</div>

		<?php foreach ($dataPenjualanList as $key => $value) : ?>

			<div>
				<p style="margin: 0; font-weight: bold;">KODE PENJUALAN : <?= htmlspecialchars($value['kd_penjualan']); ?></p>
				<p style="margin: 0; font-weight: bold;">TANGGAL PENJUALAN : <?= date('d/m/Y', strtotime($value['created_at'])); ?></p>
				<?php $id_pelanggan = htmlspecialchars($value['id_pelanggan']); $nama_pelanggan = getNamaPelanggan($conn, $id_pelanggan)  ?>
				<p style="margin: 0; font-weight: bold;">NAMA PELANGGAN : <?= htmlspecialchars($nama_pelanggan); ?></p>
			</div>

			<div>
				<table style="width: 100%; border-collapse: collapse; margin-bottom: 1rem; margin-top: 1.5rem;">
					<thead>
						<tr>
							<th scope="col" style="font-weight: 500; border-bottom: 1px solid black; padding: 0.5rem;">No</th>
							<td scope="col" style="font-weight: 500; border-bottom: 1px solid black; padding: 0.5rem;">Kode Barang</td>
							<td scope="col" style="font-weight: 500; border-bottom: 1px solid black; padding: 0.5rem;">Nama Barang</td>
							<td scope="col" style="font-weight: 500; border-bottom: 1px solid black; padding: 0.5rem;">Harga</td>
							<td scope="col" style="font-weight: 500; border-bottom: 1px solid black; padding: 0.5rem;">Qty</td>
							<td scope="col" style="font-weight: 500; border-bottom: 1px solid black; padding: 0.5rem;">Subtotal</td>
						</tr>
					</thead>
					<tbody>
						<?php $kd_penjualan = intval($value['kd_penjualan']);?>
						<?php $id_barang = intval($value['id_barang']);?>
						<?php $dataPenjualanListDetail = getDataPenjualanListDetail($conn, $kd_penjualan);?>
						<?php  foreach ($dataPenjualanListDetail as $index => $row) : ?>
							<?php $kd_penjualan = intval($row['kd_penjualan']);?>
							<?php $id_barang = intval($row['id_barang']);?>
							<?php $dataBarang = getDataBarang($conn, $id_barang);?>
							<?php $dataPenjualanDetailQty = getDataPenjualanDetailQty($conn, $kd_penjualan, $id_barang);?>
							<tr>
								<th scope="row" style="font-weight: 500; padding: 0.5rem;"><?= htmlspecialchars($index + 1); ?></th>
								<td scope="col" style="padding: 0.5rem;"><?= htmlspecialchars($dataBarang['kd_barang']); ?></td>
								<td scope="col" style="padding: 0.5rem;"><?= htmlspecialchars($dataBarang['nama_barang']); ?></td>
								<td scope="col" style="padding: 0.5rem;"><?= htmlspecialchars($row['subtotal_harga']); ?></td>
								<td scope="col" style="padding: 0.5rem;"><?= intval($dataPenjualanDetailQty); ?></td>
								<td scope="col" style="padding: 0.5rem;"><?= htmlspecialchars($row['subtotal_harga'] * intval($dataPenjualanDetailQty)); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php $subtotal_harga = getSubtotalHarga($conn, $kd_penjualan)?>
				<p style="margin: 0; font-weight: bold;">Subtotal : <?= htmlspecialchars($subtotal_harga); ?></p>
				<p style="margin: 0; font-weight: bold;">Pajak : 0</p>
				<p style="margin: 0; font-weight: bold;">Total : <?= htmlspecialchars($subtotal_harga); ?></p>
				<hr style="margin-top: 1rem; border: 1px solid black;">
			</div>
		<?php endforeach; ?>
	</div>


       
</body>
</html>
