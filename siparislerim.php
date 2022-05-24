<?php
require_once 'header.php';
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
					<th>Detay</th>
				
				</tr>
			</thead>
			<tbody>
				<tr>
				<td>Some Camera</td>
				<td>PR-2</td>
				<td>228583</td>
				<td><a style="color: white;" class="btn btn-xs btn-primary" href="">Detay</a></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="spacer"></div>
</div>

<?php
include_once 'footer.php'
?>