<?php
require_once 'header.php';

//bütün kisileri secme
$yorumlarisor = $db->prepare("SELECT * FROM yorumlar ORDER BY yorum_id ASC");
$yorumlarisor->execute();
$yorumlaricek = $yorumlarisor->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title" style="display: flex; align-items: center;">
            <h2>yorumlari Listeleme
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
            <ul style="margin: 0 20px 0 0;margin-left:auto" class="nav navbar-right panel_toolbox">
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
                  <th>Kullanıcı ID</th>
                  <th>Ürün ID</th>
                  <th>Yorum Detay</th>
                  <th>Yorum Zaman</th>
                  <th>Yorum Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>


              <tbody>
                <?php foreach ($yorumlaricek as $key => $value) {?>
                  <tr>                                                 
                    <td width='20'><?php echo $key ?></td>
                    <td><?php echo $value['kullanici_id'] ?></td>
                    <td><?php echo $value['urun_id'] ?></td>
                    <td><?php echo $value['yorum_detay'] ?></td>
                    <td><?php echo $value['yorum_zaman'] ?></td>
                    <td class="text-center"><?php echo $value['yorum_durum'] ? '<a href="../nesting/islem.php?yorum_id='.$value['yorum_id'].'&yorum_durum=1" class="btn btn-xs btn-success">Aktif</a>' : '<a href="../nesting/islem.php?yorum_id='.$value['yorum_id'].'&yorum_durum=0" class="btn btn-xs btn-danger">Pasif</a>' ?></td>
                    <td class="text-center"><a href="yorumlar-duzenle.php?yorum_id=<?php echo $value['yorum_id'] ?>" class="btn btn-xs btn-primary">Düzenle</a></td>
                    <td class="text-center"><a href="../nesting/islem.php?yorumsil=ok&yorum_id=<?php echo $value['yorum_id'] ?>" class="btn btn-xs btn-danger">Sil</a></td>
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