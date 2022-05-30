<?php
require_once 'header.php';

$urunsor = $db->prepare("SELECT * FROM urun WHERE urun_onecikar=:urun_onecikar and urun_durum=:urun_durum ORDER BY urun_id DESC ");
$urunsor->execute([
	"urun_onecikar" => 1,
	"urun_durum" => 1
]);
$uruncek = $urunsor->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">

	<!--small-nav -->
	<div class="clearfix"></div>
	<div class="lines"></div>
	<?php require_once 'slider.php' ?>
</div>

<?php if ($urunsor->rowcount()) { ?>
	<div class="f-widget featpro">
		<div class="container">
			<div class="title-widget-bg">
				<div class="title-widget">Öne Çıkan Ürünler</div>
				<div class="carousel-nav">
					<a class="prev"></a>
					<a class="next"></a>
				</div>
			</div>
			<div id="product-carousel" class="owl-carousel owl-theme">

				<?php foreach ($uruncek as $key => $value) { ?>
					<div class="item">
						<div class="productwrap" style="height: 370px;">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="<?php echo "urun-" . $value['urun_seourl'] . "-" . $value['urun_id'] ?>"><img src="<?php echo $value['urun_photo'] ?>" alt="" class="img-responsive"></a>
								<div class="pricetag blue">
									<div class="inner"><span><?php echo $value['urun_fiyat'] . " $" ?></span></div>
								</div>
							</div>
							<span class="smalltitle"><a href="<?php echo "urun-" . $value['urun_seourl'] . "-" . $value['urun_id'] ?>"><?php echo $value['urun_ad'] ?></a></span>
							<span class="smalldesc">Ürün Kodu : <?php echo $value['urun_id'] ?></span>
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
<?php } ?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<!--Main content-->
			<div class="title-bg">
				<div class="title">Hakkımızda</div>
			</div>
			<?php
			echo substr($hakkimizdacek['hakkimizda_icerik'], 0, 1100) . "..." ?>

			<div><a href="about.php" class="btn btn-default btn-red btn-sm">Devamını Oku</a></div>
			<div class="title-bg">
				<div class="title">Lastest Products</div>
			</div>
			<div class="row prdct">
				<!--Products-->
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag on-sale">
								<div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span>$199</span></div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Black Shoes</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Nikon Camera</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Red T- Shirt</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Nikon Camera</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Black Shoes</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Red T-Shirt</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
			</div>
			<!--Products-->
			<div class="spacer"></div>
		</div>
		<!--Main content-->
		<div class="col-md-3">
			<!--sidebar-->
			<div class="title-bg">
				<div class="title">Categories</div>
			</div>

			<div class="categorybox">
				<ul>
					<li><a href="category.htm">Women Accessories</a></li>
					<li><a href="category.htm">Men Shoes</a></li>
					<li><a href="category.htm">Gift Specials</a></li>
					<li><a href="category.htm">Electronics</a>
						<ul>
							<li><a href="#">iPhone 4S</a></li>
							<li><a href="#">Samsung Galaxy</a></li>
							<li><a href="#">MacBook Pro 17"</a></li>
						</ul>
					</li>
					<li><a href="category.htm">On sale</a></li>
					<li><a href="category.htm">Summer Specials</a></li>
					<li><a href="category.htm">Electronics</a></li>
					<li class="lastone"><a href="category.htm">Unique Stuff</a></li>
				</ul>
			</div>

			<div class="ads">
				<a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
			</div>

		</div>
		<!--sidebar-->
	</div>
</div>

<?php
include_once 'footer.php'
?>