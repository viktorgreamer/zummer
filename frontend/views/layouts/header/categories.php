<?php
/** @var \yii\web\View $this */
?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-9 order-md-3 menu">
                <?=
               $this->render('parts/nav_bar');?>
            </div>
            <div class="col-md-3 order-md-1 logo">
                <a href=""><img alt="" src="img/logo.png"></a>
            </div>
            <?=
            $this->render('parts/header_search');?>
        </div>
    </div>
</header>