<?php
require_once 'header.php';
$yorumsor = $db->prepare("SELECT * FROM yorumlar where yorum_id=:id");
$yorumsor->execute([
  'id' => $_GET['yorum_id']
]);
$yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title" style="display: flex; align-items: center;">
            <h2>Yorumı Düzenle
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
            <a href="yorumlar.php" class="btn btn-success btn-xs" style="margin: 0 20px 0 0;margin-left:auto">Geri</a>
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
            <br />

            <form action="../nesting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group" style="display: none;">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum ID<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $yorumcek['yorum_id'] ?>" name="yorum_id" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Paylaşım Zamanı<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $yorumcek['yorum_zaman'] ?>" disabled name="yorum_zaman" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Detayı<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $yorumcek['yorum_detay'] ?>" name="yorum_detay"  type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Durumu<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="yorum_durum" required>
                    <option value="1" <?php echo $yorumcek['yorum_durum'] == 1 ? 'selected' : '' ?>>Aktif</option>
                    <option value="0" <?php echo $yorumcek['yorum_durum'] == 0 ? 'selected' : '' ?>>Pasif</option>
                  </select>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-right">
                  <button type="submit" name="yorumduzenle" class="btn btn-success">Güncelle</button>

                </div>
              </div>

            </form>

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