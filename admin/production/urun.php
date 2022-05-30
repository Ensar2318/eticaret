<?php
require_once 'header.php';

//bütün kisileri secme
$urunsor = $db->prepare("SELECT * FROM urun ");
$urunsor->execute();
$uruncek = $urunsor->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title" style="display: flex; align-items: center;">
            <h2>urun Listeleme
              <small>
                <?php if (isset($_GET["durum"])) { ?>
                  <?php if ($_GET["durum"] == "ok") { ?>
                    <b class="text-success" role="alert">
                      işlem başarılı....
                    </b>
                  <?php } elseif ($_GET["durum"] == "no") { ?>
                    <b class="text-danger" role="alert">
                      işlem başarısız...
                    </b>
                  <?php } ?>
                <?php } ?>
              </small>
            </h2>
            <a href="urun-ekle.php" class="btn btn-success btn-xs" style="margin: 0 20px 0 0;margin-left:auto">Yeni Ekle</a>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Urun Fotorafı</th>
                  <th>Ürün Ad</th>
                  <th>Ürün Stok</th>
                  <th>Ürün Fiyat</th>
                  <th>Ürün Durum</th>
                  <th>Ürünü Öne Çıkar</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>


              <tbody>
                <?php foreach ($uruncek as $key => $value) { ?>
                  <tr>
                    <td width='20'><?php echo $key ?></td>
                    <td class="text-center">
                      <p>Resim Yüklü Değil</p>
                    </td>
                    <td><?php echo $value['urun_ad'] ?></td>
                    <td><?php echo $value['urun_stok'] ?></td>
                    <td><?php echo $value['urun_fiyat'] . " $" ?></td>
                    <td class="text-center"><?php echo $value['urun_durum'] ? '<button class="btn btn-xs btn-success">Aktif</button>' : '<button class="btn btn-xs btn-danger">Pasif</button>' ?></td>
                    <td class="text-center"><?php echo $value['urun_onecikar'] ? "<a href='../nesting/islem.php?urun_hizlionecikar=1&urun_id=$value[urun_id]' class='btn btn-xs btn-success'>Öne çıkar aktif</a>" : "<a href='../nesting/islem.php?urun_hizlionecikar=0&urun_id=$value[urun_id]' class='btn btn-xs btn-danger'>Öne çıkar pasif</a>" ?></td>
                    <td class="text-center"><a href="urun-duzenle.php?urun_id=<?php echo $value['urun_id'] ?>" class="btn btn-xs btn-primary">Düzenle</a></td>
                    <td class="text-center"><a href="../nesting/islem.php?urunsil=ok&urun_id=<?php echo $value['urun_id'] ?>" class="btn btn-xs btn-danger">Sil</a></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /page content -->

<?php
require_once 'footer.php';

?>