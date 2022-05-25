<?php
require_once 'header.php';
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title" style="display: flex; align-items: center;">
            <h2>Ürün Ekle</h2>
            <a href="urun.php" class="btn btn-success btn-xs" style="margin: 0 20px 0 0;margin-left:auto">Geri</a>
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

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="kategori_id" id="kategori_id">
                    <?php
                    $kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_ust=:kategori_ust ORDER BY kategori_sira ASC");
                    $kategorisor->execute([
                      "kategori_ust" => 0
                    ]);
                    $kategoricek = $kategorisor->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <?php foreach ($kategoricek as $key => $value) { ?>
                      <option value="<?php echo $value['kategori_id'] ?>"><?php echo $value['kategori_ad'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Ürün adını giriniz.." name="urun_ad" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="urun_detay" id="urunDetay" class="form-control col-md-7 col-xs-12" required="required">

                  </textarea>
                </div>
                <script>
                  ClassicEditor
                    .create(document.querySelector('#urunDetay'))
                    .then(editor => {
                      editor.ui.view.editable.element.style.height = '200px';
                    })
                    .catch(error => {

                    });
                </script>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Fiyat<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Ürün Fiyatını Giriniz..." name="urun_fiyat" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Video<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Video Url Giriniz..." name="urun_video" type="text" id="first-name"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Keyword<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Keyword Giriniz..." name="urun_keyword" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Stok<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input placeholder="Stok Bilgisi Giriniz..." name="urun_stok" type="number" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="urun_durum" required>
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-right">
                  <button type="submit" name="urunkaydet" class="btn btn-success">Ekle</button>

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