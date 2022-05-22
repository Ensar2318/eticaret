<?php
require_once 'header.php';

$menusor = $db->prepare("SELECT * FROM menu where menu_seourl=:seourl");
$menusor->execute([
	'seourl' =>  $_GET['sef']
]);
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);
?>


<div class="container">
	<!--small-nav -->
	<div class="title-bg">
		<div class="title"><?php echo $menucek["menu_ad"] ?></div>
	</div>
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<!--Main content-->
			<div class="page-content">
				<p>
					<?php echo $menucek["menu_detay"] ?>
				</p>
			</div>
		</div>
		<div class="col-md-3">
			<?php include_once 'sidebar.php' ?>
		</div>
		<div class="spacer"></div>
	</div>
</div>

<?php
include_once 'footer.php'
?>