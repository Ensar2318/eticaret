<?php
require_once 'header.php';

$urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:urun_id and urun_seourl=:urun_seourl");
$urunsor->execute([
	"urun_id" => $_GET['urun_id'],
	"urun_seourl" => $_GET['sef']

]);
$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

$yorumsor = $db->prepare("SELECT * FROM yorumlar WHERE urun_id=:urun_id AND yorum_durum=:yorum_durum ORDER BY yorum_zaman DESC");
$yorumsor->execute([
	"urun_id" => $uruncek['urun_id'],
	"yorum_durum" => 1
]);
$yorumcek = $yorumsor->fetchAll(PDO::FETCH_ASSOC);

$yorumsay = $yorumsor->rowcount();

// Benzer urunleri cekme kısmı
$urunlersor = $db->prepare("SELECT * FROM urun WHERE kategori_id=:kategori_id and urun_durum=:urun_durum and urun_id!=:urun_id ORDER BY RAND() limit 3");
$urunlersor->execute([
	"kategori_id" => $uruncek['kategori_id'],
	"urun_durum" => 1,
	"urun_id" => $uruncek['urun_id']
]);
$urunlercek = $urunlersor->fetchAll(PDO::FETCH_ASSOC);

if (!$urunsor->rowcount()) {
	header("Location:page_404.php");
	exit;
}
?>

<div class="container">

	<?php if (isset($_GET['yorum-durum'])) { ?>
		<?php if ($_GET['yorum-durum'] == "ok") { ?>
			<div style="margin: 0;" class="alert alert-success">Ürün Başarı Bir Şekilde Sepete Eklendi</div>
		<?php } elseif ($_GET['yorum-durum'] == "no") { ?>
			<div style="margin: 0;" class="alert alert-danger"><b>Hata!</b> Ürün Sepete Eklenemedi</div>
		<?php } ?>
	<?php } ?>

	<div class="row">
		<div class="col-md-9">
			<!--Main content-->
			<div class="title-bg">
				<div class="title"><?php echo $uruncek['urun_ad'] ?></div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="dt-img">
						<div class="detpricetag">
							<div class="inner"><?php echo $uruncek['urun_fiyat'] ?> $</div>
						</div>
						<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="thumb-img">
						<a class="fancybox" href="images\sample-4.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="thumb-img">
						<a class="fancybox" href="images\sample-5.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-5.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="thumb-img">
						<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-6 det-desc">
					<div class="productdata">
						<div class="infospan">Ürün Kodu <span><?php echo $uruncek['urun_id'] ?></span></div>
						<div class="infospan">Ürün Fiyat <span><?php echo $uruncek['urun_fiyat'] . "$" ?></span></div>

						<?php if ($uruncek['urun_stok'] != 0) { ?>
							<form action="admin/nesting/islem.php" method="POST">
								<div style="margin-top: 1rem;" class="form-group">
									<label for="qty" class="col-sm-2 control-label">Adet </label>
									<div class="col-sm-4">
										<select name="urun_adet" class="form-control" id="qty">
											<option>1
											<option>2
											<option>3
											<option>4
											<option>5
										</select>
									</div>
									<div class="col-sm-4">
										<input hidden value="<?php echo $kullanicicek['kullanici_id'] ?>" name="kullanici_id" type="text">
										<input hidden value="<?php echo $uruncek['urun_id'] ?>" name="urun_id" type="text">
										<input hidden value="<?php echo $uruncek['urun_seourl'] ?>" name="urun_seourl" type="text">
										<?php if ($say) { ?>
											<button name="sepeteekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></button>
										<?php } else { ?>
											<a href="#" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></a>
											<?php } ?>
									</div>
									<div class="clearfix"></div>
								</div>
							</form>
						<?php }  ?>

						<div style="margin-top: 2rem;" class="sharing">

							<div class="avatock"><span><?php echo $uruncek['urun_stok'] > 0 ? 'Stok Adeti : ' . $uruncek['urun_stok'] : 'Stokta Yok' ?></span></div>
						</div>

					</div>



				</div>
			</div>

			<div class="tab-review">
				<ul id="myTab" class="nav nav-tabs shop-tab">
					<li class="<?php echo isset($_GET['durum']) ? '' : 'active' ?>"><a href="#desc" data-toggle="tab">Açıklama</a></li>
					<li class="<?php echo isset($_GET['durum']) ? 'active' : '' ?>"><a href="#rev" data-toggle="tab">Yorumlar (<?php echo $yorumsay ?>)</a></li>
					<?php if (!empty($uruncek['urun_video'])) { ?>
						<li class=""><a href="#video" data-toggle="tab">Ürün Videosu</a></li>
					<?php } ?>
				</ul>
				<div id="myTabContent" class="tab-content shop-tab-ct">

					<div class="tab-pane fade <?php echo isset($_GET['durum']) ? '' : 'active in' ?> " id="desc">
						<?php echo $uruncek['urun_detay'] ?>
					</div>

					<div class="tab-pane fade <?php echo isset($_GET['durum']) ? 'active in' : '' ?>" id="rev">
						<!-- yorumlar -->

						<?php echo $yorumsay == 0 ? '<p>Henüz Hiç Yorum Yok</p>' : ''  ?>

						<?php if (isset($_GET['durum'])) { ?>
							<?php if ($_GET['durum'] == "ok") { ?>
								<p style="padding-left:10px" class="bg-success">Yorum Başarılı Şekilde Paylaşılmıştır.</p>
							<?php } elseif ($_GET['durum'] == "no") { ?>
								<p style="padding-left:10px" class="bg-danger ">Yorum Paylaşırken Bir Hata Oluştu.</p>
							<?php } ?>
						<?php } ?>

						<?php foreach ($yorumcek as $key => $value) {
							$zaman_tarih = explode(" ", $value['yorum_zaman']);

							$idilekullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
							$idilekullanicisor->execute([
								'kullanici_id' => $value['kullanici_id']
							]);
							$idilekullanicicek = $idilekullanicisor->fetch(PDO::FETCH_ASSOC);
						?>
							<p class="dash">
								<span><?php echo $idilekullanicicek['kullanici_adsoyad'] ?></span> (<?php echo $zaman_tarih[0]; ?>)<br><br>
								<?php echo $value['yorum_detay'] ?>
							</p>
						<?php } ?>

						<h4>Yorum Yazın</h4>
						<?php if ($say) { ?>
							<form action="admin/nesting/islem.php" method="POST" role="form">
								<input value="<?php echo $kullanicicek['kullanici_id'] ?>" name="kullanici_id" type="text" hidden>
								<input value="<?php echo $uruncek['urun_seourl'] ?>" name="urun_seourl" type="text" hidden>
								<input value="<?php echo $uruncek['urun_id'] ?>" name="urun_id" type="text" hidden>
								<div class="form-group">
									<textarea placeholder="Lütfen Yorumunuzu belirtiniz." name="yorum_detay" class="form-control" id="text"></textarea>
								</div>

								<button type="submit" name="yorumyap" class="btn btn-default btn-red btn-sm">Yorum Gönder</button>
							</form>
						<?php } else {
							echo "<p style='margin:0;'>Yorum yapmak için giriş yapmalısınız. Hesabınız yoksa <a style='color:red' href='register.php'>kayıt ol</a></p>";
						} ?>
					</div>

					<div class="tab-pane fade" id="video">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $uruncek["urun_video"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>

				</div>
			</div>

			<div id="title-bg">
				<?php if ($urunlersor->rowcount()) { ?>
					<div class="title">Benzer Ürünler</div>
				<?php } ?>
			</div>
			<div class="row prdct">
				<!--Products-->

				<?php foreach ($urunlercek as $key => $value) { ?>
					<?php if ($uruncek['urun_id']) { ?>
						<div class="col-md-4">
							<div style="height: 220px;" class="productwrap">
								<div class="pr-img">
									<div class="hot"></div>
									<a href="<?php echo "urun-" . $value['urun_seourl'] . "-" . $value['urun_id'] ?>"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
									<div class="pricetag on-sale">
										<div class="inner on-sale"><span class="onsale"><?php echo $value['urun_fiyat'] ?>$</span></div>
									</div>
								</div>
								<span class="smalltitle"><a href="<?php echo "urun-" . $value['urun_seourl'] . "-" . $value['urun_id'] ?>"><?php echo $value['urun_ad'] ?></a></span>
								<span class="smalldesc">Ürün Kodu : <?php echo $value['urun_id'] ?></span>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			<!--Products-->
			<div class="spacer"></div>
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