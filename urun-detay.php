<?php
require_once 'header.php';

$urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:urun_id and urun_seourl=:urun_seourl");
$urunsor->execute([
	"urun_id" => $_GET['urun_id'],
	"urun_seourl" => $_GET['sef']

]);
$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

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
	<!--small-nav -->
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
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
					

						<div style="margin-top: 1rem;" class="form-group">
							<label for="qty" class="col-sm-2 control-label">Adet </label>
							<div class="col-sm-4">
								<select class="form-control" id="qty">
									<option>1
									<option>2
									<option>3
									<option>4
									<option>5
								</select>
							</div>
							<div class="col-sm-4">
								<button class="btn btn-default btn-red btn-sm"><span class="addchart">Add To Chart</span></button>
							</div>
							<div class="clearfix"></div>
						</div>

						<div style="margin-top: 2rem;" class="sharing">

							<div class="avatock"><span><?php echo $uruncek['urun_stok'] > 0 ? 'Stok Adeti : ' . $uruncek['urun_stok'] : 'Stokta Yok' ?></span></div>
						</div>

					</div>



				</div>
			</div>

			<div class="tab-review">
				<ul id="myTab" class="nav nav-tabs shop-tab">
					<li class="active"><a href="#desc" data-toggle="tab">Açıklama</a></li>
					<li class=""><a href="#rev" data-toggle="tab">Reviews (0)</a></li>
					<?php if (!empty($uruncek['urun_video'])) { ?>
						<li class=""><a href="#video" data-toggle="tab">Ürün Videosu</a></li>
					<?php } ?>
				</ul>
				<div id="myTabContent" class="tab-content shop-tab-ct">

					<div class="tab-pane fade active in" id="desc">
						<?php echo $uruncek['urun_detay'] ?>
					</div>

					<div class="tab-pane fade" id="rev">
						<p class="dash">
							<span>Jhon Doe</span> (11/25/2012)<br><br>
							Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.
						</p>
						<h4>Yorum Yazın</h4>
						<?php if ($say) { ?>
							<form role="form">
								<div class="form-group">
									<textarea placeholder="Lütfen Yorumunuzu belirtiniz." class="form-control" id="text"></textarea>
								</div>

								<button type="submit" class="btn btn-default btn-red btn-sm">Submit</button>
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