<?php
/** @var \yii\web\View $this */
?>
<div class="search_h">
    <a href="#" class="btn-search" id="btnSearchHeader"><img alt="" src="img/search_header.png"></a>
    <form class="search form_search">
        <div class="input-group">
            <input type="text" class="form-control input_search" placeholder="Поиск по каталогу">
            <div class="input-group-append">
                <button class="btn btn-search btn-green btn_search" type="button" >Поиск</button>
            </div>
        </div>
        <div class="search_modal">
            <?= $this->render('inner_search_model');?>
        </div>
    </form>

</div>

