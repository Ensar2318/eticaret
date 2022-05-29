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
							<div class="bigtitle">Şifre Güncelle</div>
							<p>Hesap Bilgilerinizi aşağıdaki form araclığı ile güncelleyebilirsiniz.</p>
						</div>
					</div>
				</div>
			</div>
			<?php if (isset($_GET['durum'])) { ?>

				<?php if ($_GET['durum'] == "eskisifreyanlis") { ?>
					<div class="alert alert-danger">
						<b>Hata!</b> Girdiğiniz önceki şifre yalnış.
					</div>
				<?php } elseif ($_GET['durum'] == "yenisifreeslesmedi") { ?>
					<div class="alert alert-danger">
						<b>Hata!</b> Girdiğiniz Yeni şifre eşleşmedi!
					</div>
				<?php } elseif ($_GET['durum'] == "kisasifre") { ?>
					<div class="alert alert-danger">
						<b>Hata!</b> Girdiğiniz Yeni şifre 6 uzunluğunda olmalıdır!
					</div>
				<?php } elseif ($_GET['durum'] == "ok") { ?>
					<div class="alert alert-success">
						Şifreniz başarılı bir şekilde güncellenmiştir.
					</div>
				<?php } elseif ($_GET['durum'] == "no") { ?>
					<div class="alert alert-danger">
						<b>Hata!</b> Şifre değiştirilirken bir hata oluştu lütfen tekrar deneyiniz.
					</div>
				<?php } ?>

			<?php } ?>
		</div>
	</div>

	<form action="admin/nesting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifre Güncelle</div>
				</div>
				<!-- id -->
				<div style="display: none;" class="form-group dob">
					<div class="col-sm-12">
						<input type="hidden" class="form-control" hidden required name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
					</div>
				</div>
				<!-- id -->

				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="password" class="form-control" required name="kullanici_password" placeholder="Eski Şifrenizi Giriniz." value="">
					</div>
				</div>

				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" required name="kullanici_passwordone" value="" placeholder="Yeni Şifrenizi Giriniz.">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" required name="kullanici_passwordtwo" value="" placeholder="Yeni Şifrenizi Tekrar Giriniz.">
					</div>
				</div>
				<div class="text-start"><button name="usersifreguncelle" class="btn btn-default btn-red">Şifre Değiştir</button></div>
			</div>

		</div>
	</form>

	<div class="spacer"></div>
</div>

<?php
include_once 'footer.php'
?>