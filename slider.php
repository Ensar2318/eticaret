<?php
$slidersor = $db->prepare("SELECT * FROM slider WHERE slider_durum=:durum ORDER BY slider_sira ASC limit 6");
$slidersor->execute(
    ["durum" => 1]
);
$slidercek = $slidersor->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="main-slide">
    <div id="sync1" class="owl-carousel">

        <?php foreach ($slidercek as $key => $value) { ?>
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1><?php echo $value['slider_ad'] ?></h1>
                        <p>
                          Hakaisatsu Rasshin, jitsushiki tenkai, KUUSHHKKI, MENSHIKII
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Add to cart</button>
                    </div>
                    <div class="inner">
                        <div class="pro-pricetag big-deal">
                            <div class="inner">
                                <span class="oldprice">$314</span>
                                <span>$<?php echo $value['slider_fiyat'] ?></span>
                                <span class="ondeal">Best Deal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-type-1">
                    <img style="max-height: 300px;" src="<?php echo $value['slider_resimyol'] ?>" alt="" class="img-responsive">
                </div>
            </div>
        <?php } ?>


    </div>

    <div class="bar"></div>

    <div id="sync2" class="owl-carousel">
        <?php foreach ($slidercek as $key => $value) { ?>
            <div class="item"></div>
        <?php } ?>
    </div>
</div>