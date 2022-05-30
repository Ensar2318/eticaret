<?php
require_once 'header.php';
if (!$say) {
	header('location:index.php');
}
$siparisdetaySor = $db->prepare("SELECT * FROM siparisdetay where siparis_id=:id");
$siparisdetaySor->execute([
	'id' => $_GET['siparis_id']
]);
$siparisSay = $siparisdetaySor->rowCount();
if ($siparisSay == 0) {
	header('location:siparislerim.php');
	exit;
}
$siparisCek = $siparisdetaySor->fetchAll(PDO::FETCH_ASSOC);
$siparisDetayToplamFiyat = 0;
?>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-10">
							<div class="bigtitle">Sipariş Detayı</div>
							<p> "<?php echo $_GET['siparis_id'] ?>" kodlu Sipariş Detayını Görüntülüyorsunuz.</p>
						</div>
						<div class="col-md-2">
							<div style="display: flex; align-items: center; height: 72px;">
						<a href="siparislerim.php" class="btn btn-primary">Geri Dön</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="title-bg">
		<div class="title">"<?php echo $_GET['siparis_id'] ?>" kodlu Sipariş Detayı</div>
	</div>


	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Ürün Resim</th>
					<th>Ürün Adı</th>
					<th>Ürün Kodu</th>
					<th>Adet</th>
					<th>Miktar Fiyatı</th>
					<th>Toplam</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($siparisCek as $key => $value) {
					$urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:urun_id");
					$urunsor->execute([
						"urun_id" => $value['urun_id']
					]);
					$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
					$urunAdetFiyat = $uruncek['urun_fiyat'];
					$urunToplamFiyat = $urunAdetFiyat * $value['urun_adet'];
					$siparisDetayToplamFiyat += $urunToplamFiyat;

				?>
					<tr>
						<td><img src="<?php echo $uruncek['urun_photo'] ?>" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad'] ?></td>
						<td><?php echo $uruncek['urun_id'] ?></td>
						<td>
							<?php echo $value['urun_adet'] ?> Adet
						</td>
						<td>$<?php echo number_format((float)$urunAdetFiyat, 2, ".", "") ?></td>
						<td>$<?php echo number_format((float)$urunToplamFiyat, 2, ".", "") ?></td>
					</tr>
				<?php } ?>



			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-6">

		</div>
		<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">
				<div class="subtotal">
					<?php
					$siparisDetayVergi = $siparisDetayToplamFiyat * 0.175;
					$siparisDetayVergisizFiyat = $siparisDetayToplamFiyat - $siparisDetayVergi;
					?>
					<p>Ara Toplam : $<?php echo number_format((float)$siparisDetayVergisizFiyat, 2, ".", "") ?></p>
					<p>Vergi 17.5% : $<?php echo number_format((float)$siparisDetayVergi, 2, ".", "") ?></p>
				</div>
				<div class="total">Toplam : <span class="bigprice">$<?php echo number_format((float)$siparisDetayToplamFiyat, 2, ".", "") ?></span></div>

				<div class="clearfix"></div>
		
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="spacer"></div>

</div>

<?php
include_once 'footer.php'
?>