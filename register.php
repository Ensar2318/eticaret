<?php
require_once 'header.php';

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Kullanıcı Kaydı</div>
							<p>Kullanıcı kayıt işlemlerini aşağıdaki form araclığı ile gerçekleştirebilirsiniz.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="admin/nesting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Kayıt Bilgileri</div>
				</div>
				<?php if (isset($_GET['durum'])) { ?>

					<?php if ($_GET['durum'] == 'farklisifre') { ?>
						<div class="alert alert-danger"><b>Hata!</b> Girdiginiz Şifreler Eşleşmiyor.</div>
					<?php } ?>

					<?php if ($_GET['durum'] == 'eksiksifre') { ?>
						<div class="alert alert-danger"><b>Hata!</b> Girdiginiz Şifre 6 karakterden uzun olmalı.</div>
					<?php } ?>

					<?php if ($_GET['durum'] == 'kullanicivar') { ?>
						<div class="alert alert-danger"><b>Hata!</b> Girdiginiz Eposta kullanılıyor.</div>
					<?php } ?>
					<?php if ($_GET['durum'] == 'hata') { ?>
						<div class="alert alert-danger"><b>Hata!</b> kayıt esnasında bir hata oluştu.</div>
					<?php } ?>

				<?php } ?>
				<div class="form-group dob">
					<div class="col-sm-12">
						<input name="kullanici_adsoyad" type="text" class="form-control" id="name" placeholder="Ad ve Soyadınızı Giriniz..." required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input name="kullanici_mail" type="email" class="form-control" id="email" placeholder="Dikkat Mail Adresiniz Kullanıcı Adınız Olacaktır..." required>
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input name="kullanici_passwordone" type="password" class="form-control" id="phone" placeholder="Şifrenizi Giriniz" required>
					</div>
					<div class="col-sm-6">
						<input name="kullanici_passwordtwo" type="password" class="form-control" id="fax" placeholder="Şifrenizi Tekrar Giriniz..." required>
					</div>
				</div>

				<button class="btn btn-default btn-red" name="kullanicikaydet">Kayıt İşlemi Yap</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz ?</div>
				</div>
				<a href="" style="display: block;" class="text-center"><img width="90%" src="images/lockkey.jpg"></a>
			</div>
		</div>
	</form>
	<div class="spacer"></div>
</div>

<?php
include_once 'footer.php'
?>