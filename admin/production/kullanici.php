<?php
require_once 'header.php';

//bütün kisileri secme
$kullanicisor = $db->prepare("SELECT * FROM kullanici");
$kullanicisor->execute();
$kullanicicek = $kullanicisor->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Sipariş İşlemleri
              <small>
                <?php if (isset($_GET["durum"])) { ?>
                  <?php if ($_GET["durum"] == "ok") { ?>
                    <b class="text-success" role="alert">
                      işlem başarılı...
                    </b>
                  <?php } elseif ($_GET["durum"] == "no") { ?>
                    <b class="text-danger" role="alert">
                      işlem başarısız...
                    </b>
                  <?php } ?>
                <?php } ?>
              </small>
            </h2>
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
                  <th>sıra</th>
                  <th>Kayıt Tarihi</th>
                  <th>Ad Soyad</th>
                  <th>Mail Adresi</th>
                  <th>Telefon</th>
                  <th>Durum</th>
                  <th>İşlem</th>
                  <th>İşlem</th>
                </tr>
              </thead>


              <tbody>
                <?php foreach ($kullanicicek as $key => $value) { ?>
                  <tr>
                    <td><?php echo ($key + 1) ?></td>
                    <td><?php echo $value['kullanici_zaman'] ?></td>
                    <td><?php echo $value['kullanici_adsoyad'] ?></td>
                    <td><?php echo $value['kullanici_mail'] ?></td>
                    <td><?php echo $value['kullanici_gsm'] ?></td>
                    <td><?php echo $value['kullanici_durum'] == 1 ? 'Aktif' : 'Pasif' ?></td>
                    <td class="text-center"><a href="kullanici-duzenle.php?kullanici_id=<?php echo $value['kullanici_id'] ?>" class="btn btn-xs btn-primary">Düzenle</a></td>
                    <td class="text-center"><a href="../nesting/islem.php?kullanicisil=ok&kullanici_id=<?php echo $value['kullanici_id'] ?>" class="btn btn-xs btn-danger">Sil</a></td>

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