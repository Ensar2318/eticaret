<?php
require_once 'header.php';

//bütün kisileri secme
$slidersor = $db->prepare("SELECT * FROM slider ORDER BY slider_sira ASC");
$slidersor->execute();
$slidercek = $slidersor->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title" style="display: flex; align-items: center;">
            <h2>slider Listeleme
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
            <a href="slider-ekle.php" class="btn btn-success btn-xs" style="margin: 0 20px 0 0;margin-left:auto">Yeni Ekle</a>
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
                  <th>Resim</th>
                  <th>Ad</th>
                  <th>Url</th>
                  <th>Sıra</th>
                  <th>Durum</th>
                  <th>Fiyat</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>


              <tbody>
                <?php foreach ($slidercek as $key => $value) { ?>
                  <tr>
                    <td width='20'><?php echo $key ?></td>
                    <td><img width="100" src="../../<?php echo $value['slider_resimyol'] ?>"></td>
                    <td><?php echo $value['slider_ad'] ?></td>
                    <td><?php echo $value['slider_link'] ?></td>
                    <td><?php echo $value['slider_sira'] ?></td>
                    <td style="vertical-align: middle !important;" class="text-center"><?php echo $value['slider_durum'] ? '<button class="btn btn-xs btn-success">Aktif</button>' : '<button class="btn btn-xs btn-danger">Pasif</button>' ?></td>
                    <td style="vertical-align: middle !important;" class="text-center"><div class="badge "><?php echo $value['slider_fiyat']." $" ?></div></td>
                    <td style="vertical-align: middle !important;" class="text-center"><a href="slider-duzenle.php?slider_id=<?php echo $value['slider_id'] ?>" class="btn btn-xs btn-primary">Düzenle</a></td>
                    <td style="vertical-align: middle !important;" class="text-center"><a href="../nesting/islem.php?slider_resimyol=<?php echo $value['slider_resimyol'] ?>&slidersil=ok&slider_id=<?php echo $value['slider_id'] ?>" class="btn btn-xs btn-danger">Sil</a></td>

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