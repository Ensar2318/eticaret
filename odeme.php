<?php
require_once 'header.php';
if (!$say) {
	header('location:index.php');
}
if (!$sepetsay) {
	header('location:index.php');
}
?>

<div class="container">

	<div class="title-bg">
		<div class="title">Ödeme Sayfası</div>
	</div>


	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
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

							<td><img src="<?php echo $uruncek['urun_photo'] ?>" width="100" alt=""></td>
							<td><?php echo $uruncek['urun_ad'] ?></td>
							<td><?php echo $uruncek['urun_id'] ?></td>
							<td>
								<?php echo $value['urun_adet'] ?>
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
					<!-- <a href="odeme.php" class="btn btn-default btn-yellow">Ödeme Sayfası</a> -->
				</div>
				<div class="clearfix"></div>
			</div>
		<?php } ?>
	</div>
	<div class="tab-review">
		<ul id="myTab" class="nav nav-tabs shop-tab">
			<li><a href="#desc" data-toggle="tab">Kredi Kartı</a></li>
			<li class="active"><a href="#rev" data-toggle="tab">Banka Havalesi </a></li>
		</ul>
		<div id="myTabContent" class="tab-content shop-tab-ct">

			<div class="tab-pane fade active in" id="rev">
				<p>Ödeme yapacağınız hesap numarasını seçerek işlemi tamamlayınız.</p>

				<div class="row">
					<form action="admin/nesting/islem.php" method="POST">
						<?php
						$bankasor = $db->prepare("SELECT * FROM banka WHERE banka_durum=:durum ORDER BY banka_id ASC");
						$bankasor->execute(["durum" => 1]);
						while ($bankacek = $bankasor->fetch(PDO::FETCH_ASSOC)) { ?>

							<div style="display: flex; margin-bottom: 10px;" class="form-group col-md-12">
								<input style="box-shadow: none; background: none; margin-right: 6px;" type="radio" name="banka_ad" required value="<?php echo $bankacek['banka_ad'] ?>">
								<label style="font-weight: normal;" class="control-label" for="first-name"><?php echo $bankacek['banka_ad'] ?>
								</label>
							</div>

						<?php } ?>
						<?php if ($sepetsay) { ?>
							<?php foreach ($sepetcek as $key => $value) {
								$urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:urun_id");
								$urunsor->execute([
									"urun_id" => $value['urun_id']
								]);
								$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
							?>

								<input type="hidden" name="urun_bilgiler[]" value="<?php echo $uruncek['urun_id'] . "-" . $uruncek['urun_fiyat'] . "-" . $value['urun_adet'] ?>">

								<!-- <input type="hidden" name="urun_id[]" value="<?php //echo $uruncek['urun_id'] 
																					?>">
								<input type="hidden" name="urun_fiyat[]" value="<?php //echo $uruncek['urun_fiyat'] 
																				?>">
								<input type="hidden" name="urun_adet[]" value="<?php //echo $value['urun_adet'] 
																				?>"> -->
							<?php } ?>

						<?php } ?>
						<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
						<input type="hidden" name="siparis_toplam" value="<?php echo $fiyat ?>">
						<div style="margin-top: 16px;" class="col-md-12">
							<button name="bankasiparisekle" class="btn btn-success">Sipariş Ver</button>
						</div>
					</form>
				</div>
			</div>

			<div class="tab-pane fade " id="desc">

			</div>
		</div>
	</div>

</div>

<?php
include_once 'footer.php'
?>