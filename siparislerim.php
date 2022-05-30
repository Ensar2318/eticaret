<?php
require_once 'header.php';
if (!$say) {
	header('location:index.php');
}
$siparisSor = $db->prepare("SELECT * FROM siparis where kullanici_id=:id");
$siparisSor->execute([
	'id' => $kullanicicek['kullanici_id']
]);
$siparisCek = $siparisSor->fetchAll(PDO::FETCH_ASSOC);
$siparisSay = $siparisSor->rowCount();

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Sipariş Bilgilerim</div>
							<p>Vermiş oldugunuz siparişleri listeliyorsunuz.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="title-bg">
		<div class="title">Sipariş Bilgilerim</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Sipariş No</th>
					<th>Tarih</th>
					<th>Tutar</th>
					<th>Ödeme Tip</th>
					<th>Durum</th>
					<th>Detay</th>

				</tr>
			</thead>
			<tbody>
				<?php foreach ($siparisCek as $value) { ?>
					<tr>
						<td><?php echo $value['siparis_id'] ?></td>
						<td><?php echo $value['siparis_zaman'] ?></td>
						<td><?php echo $value['siparis_toplam'] ?> $</td>
						<td><?php echo $value['siparis_tip'] ?></td>
						<td><?php echo $value['siparis_odeme'] ? " <a style='color:white;' href='#' class='btn btn-small btn-success'>Ödendi</a> ":"<a style='color:white;' href='#' class='btn btn-xs btn-danger'>Ödenmedi</a>" ?></td>
						<td><a style="color: white;" class="btn btn-xs btn-primary" href="siparis-detay.php?siparis_id=<?php echo $value['siparis_id'] ?>">Detay</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<p>
			<?php if (!$siparisSay) { ?>
				Hiç Siparişiniz Yok.
			<?php } ?>
		</p>
	</div>
	<div class="spacer"></div>
</div>

<?php
include_once 'footer.php'
?>