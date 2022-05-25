<?php
require_once 'header.php';

//bütün kisileri secme
$kategorisor = $db->prepare("SELECT * FROM kategori ORDER BY kategori_sira ASC");
$kategorisor->execute();
$kategoricek = $kategorisor->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title" style="display: flex; align-items: center;">
            <h2>kategori Listeleme
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
            <a href="kategori-ekle.php" class="btn btn-success btn-xs" style="margin: 0 20px 0 0;margin-left:auto">Yeni Ekle</a>
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
                  <th>kategori Ad</th>
                  <th>kategori Sıra</th>
                  <th>kategori Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>


              <tbody>
                <?php foreach ($kategoricek as $key => $value) { ?>
                  <tr>                                                 
                    <td width='20'><?php echo $key ?></td>
                    <td><?php echo $value['kategori_ad'] ?></td>
                    <td><?php echo $value['kategori_sira'] ?></td>
                    <td class="text-center"><?php echo $value['kategori_durum'] ? '<button class="btn btn-xs btn-success">Aktif</button>' : '<button class="btn btn-xs btn-danger">Pasif</button>' ?></td>
                    <td class="text-center"><a href="kategori-duzenle.php?kategori_id=<?php echo $value['kategori_id'] ?>" class="btn btn-xs btn-primary">Düzenle</a></td>
                    <td class="text-center"><a href="../nesting/islem.php?kategorisil=ok&kategori_id=<?php echo $value['kategori_id'] ?>" class="btn btn-xs btn-danger">Sil</a></td>

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