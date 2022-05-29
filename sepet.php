<?php
require_once 'header.php';
if (!$say) {
	header('location:index.php');
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<?php if ($sepetsay) { ?>
								<div class="bigtitle">Alışveriş Sepetim</div>
								<p>Alışveriş Sepetinizi Görüntülüyorsunuz.</p>
							<?php } else { ?>
								<div class="bigtitle">Sepetiniz Şu Anda Boş</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="title-bg">
		<div class="title">Alışveriş Sepetim</div>
	</div>


	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Sil</th>
					<th>Ürün Resim</th>
					<th>Ürün Adı</th>
					<th>Ürün Kodu</th>
					<th>Miktar</th>
					<th>Miktar Fiyatı</th>
					<th>Toplam</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($sepetsay) { ?>
					<?php foreach ($sepetcek as $key => $value) {
						$urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:urun_id");
						$urunsor->execute([
							"urun_id" => $value['urun_id']
						]);
						$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
						$urunAdetFiyat = $uruncek['urun_fiyat'];
						$urunToplamFiyat = $urunAdetFiyat * $value['urun_adet'];

					?>
						<tr>
							<td>
								<form><input type="checkbox"></form>
							</td>
							<td><img src="images\demo-img.jpg" width="100" alt=""></td>
							<td><?php echo $uruncek['urun_ad'] ?></td>
							<td><?php echo $uruncek['urun_id'] ?></td>
							<td>
								<form action="admin/nesting/islem.php" method="POST">
									<input type="text" name='sepet_id' hidden value="<?php echo $value['sepet_id'] ?>">
									<input type="text" maxlength="2" autocomplete="off" pattern="\d*" name="urun_adet" require value="<?php echo $value['urun_adet'] ?>" class="form-control quantity">
									<button name="sepetAdetGuncelle" style="margin-top: 6px;" class="btn btn-warning btn-sm">Güncelle</button>
								</form>
							</td>
							<td>$<?php echo number_format((float)$urunAdetFiyat, 2, ".", "") ?></td>
							<td>$<?php echo number_format((float)$urunToplamFiyat, 2, ".", "") ?></td>
						</tr>
					<?php } ?>

				<?php } else { ?>

				<?php } ?>

			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-6">

		</div>
		<?php if ($sepetsay) { ?>
			<div class="col-md-3 col-md-offset-3">
				<div class="subtotal-wrap">
					<div class="subtotal">
						<p>Ara Toplam : $<?php echo number_format((float)$vergisizfiyat, 2, ".", "") ?></p>
						<p>Vergi 17.5% : $<?php echo number_format((float)$vergi, 2, ".", "") ?></p>
					</div>
					<div class="total">Toplam : <span class="bigprice">$<?php echo number_format((float)$fiyat, 2, ".", "") ?></span></div>

					<div class="clearfix"></div>
					<a href="odeme.php" class="btn btn-default btn-yellow">Ödeme Sayfası</a>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php } ?>
	</div>
	<div class="spacer"></div>

</div>

<?php
include_once 'footer.php'
?>