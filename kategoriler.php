﻿<?php
require_once 'header.php';
$kategoricek = "";
if (isset($_GET['kategori_id'])) {
	$urunsor = $db->prepare("SELECT * FROM urun WHERE kategori_id=:kategori_id AND urun_durum=:urun_durum ORDER BY urun_id DESC ");
	$urunsor->execute([
		"kategori_id" => $_GET['kategori_id'],
		"urun_durum" => 1
	]);
	$kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_id=:kategori_id");
	$kategorisor->execute([
		"kategori_id" => $_GET['kategori_id'],
	]);
	$kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);
} else {
	$urunsor = $db->prepare("SELECT * FROM urun ORDER BY urun_id DESC ");
	$urunsor->execute();
}
$urunsay = $urunsor->rowcount();
$uruncek = $urunsor->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container">
	<!--small-nav -->
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<!--Main content-->
			<div class="title-bg">
				<div class="title">
					Kategoriler -
					<?php if (!empty($kategoricek)) {
						echo $kategoricek['kategori_ad'];
					?>
					<?php } else { ?>
						All products
					<?php } ?>
				</div>
				<div class="title-nav">
					<a href="javascript:void(0)"><i class="fa fa-th-large"></i>grid</a>
					<a href="javascript:void(0)"><i class="fa fa-bars"></i>List</a>
				</div>
			</div>
			<div class="row prdct">
				<!--Products-->
				<?php if (!$urunsay) {
					echo "<h4 class='text-center'>Bu Kategoride Ürün Bulunamadı.</h4>";
				} ?>
				<?php foreach ($uruncek as $key => $value) { ?>
					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="<?php echo "urun-" . $value['urun_seourl'] . "-" . $value['urun_id'] ?>"><img style="width: 100%;" src="<?php echo $value['urun_photo'] ?>" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale">
									<div class="inner on-sale"><span class="onsale"><?php echo $value['urun_fiyat'] . " $" ?></span></div>
								</div>
							</div>
							<span class="smalltitle"><a href="product.htm"><?php echo $value['urun_ad'] ?></a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
				<?php } ?>
			</div>
			<!--Products-->

			<!--pagination
			<ul class="pagination shop-pag">
				<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
			</ul>
			-->

		</div>
		<!--sidebar-->
		<div class="col-md-3">
			<?php include_once 'sidebar.php' ?>
		</div>
		<!--sidebar-->

	</div>
	<div class="spacer"></div>
</div>
<?php
include_once 'footer.php'
?>