<?php
require_once 'header.php';
// izinsiz girmeyi engeller
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
							<div class="bigtitle">Hesap Bilgilerim</div>
							<p>Hesap Bilgilerinizi aşağıdaki form araclığı ile güncelleyebilirsiniz.</p>
						</div>
					</div>
				</div>
			</div>
			<?php if (isset($_GET['durum'])) { ?>

				<?php if ($_GET['durum'] == "ok") { ?>
					<div class="alert alert-success">
						Bilgileriniz başarılı bir şekilde güncellenmiştir.
					</div>
				<?php } elseif ($_GET['durum'] == "no") { ?>
					<div class="alert alert-danger">
						<b>Hata!</b> Bilgileriniz güncellenemedi.
					</div>
				<?php } ?>

			<?php } ?>
		</div>
	</div>

	<form action="admin/nesting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Kişisel Bilgiler</div>
				</div>
				<!-- id -->
				<div style="display: none;" class="form-group dob">
					<div class="col-sm-12">
						<input type="text" class="form-control" required name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
					</div>
				</div>
				<!-- id -->

				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="text" class="form-control" id="name" placeholder="Adınız ve Soyadınız..." required name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" class="form-control" id="email" disabled placeholder="Email Adresiniz..." require name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail'] ?>">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-4">
						<input type="text" class="form-control" id="phone" placeholder="Telefon No" maxlength="10" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>">
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="unvan" placeholder="Ünvan" name="kullanici_unvan" value="<?php echo $kullanicicek['kullanici_unvan'] ?>">
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="tc" maxlength="11" placeholder="Tc Kimlik Numaranız.." name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc'] ?>">
					</div>
				</div>
				<div class="text-start"><button name="userkullaniciguncelle" class="btn btn-default btn-red">Bilgilerimi Güncelle</button></div>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Adres Bilgilerim</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" class="form-control" id="address" placeholder="Adres" name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres'] ?>">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="il" placeholder="il" name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il'] ?>">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="ilce" placeholder="ilçe" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce'] ?>">
					</div>
				</div>

			</div>
		</div>
	</form>

	<div class="spacer"></div>
</div>

<?php
include_once 'footer.php'
?>