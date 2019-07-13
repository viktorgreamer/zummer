<?php
use yii\helpers\Url;

?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4 copy">
                <p>© 2012-2019 "Zummer". <br>Все права защищены.</p>
            </div>
            <div class="d-none d-xl-block col-xl-5 menu_f">
                <ul>
                    <li><a href="<?php echo Url::to('categories');?>">Категории программ</a></li>
                    <li><a href="<?php echo Url::to('developers');?>">Разработчикам</a></li>
                    <li><a href="<?php echo Url::to('articles');?>">Центр знаний</a></li>
                </ul>
            </div>
            <div class="d-none d-md-block col-md-6 col-xl-3 social">
                <a href="#" class="vk" target="_blank"><img alt="" src="/img/icons/ico-vk.png"></a>
                <a href="#" class="fb" target="_blank"><img alt="" src="/img/icons/ico-fb.png"></a>
                <a href="#" class="inst" target="_blank"><img alt="" src="/img/icons/ico-inst.png"></a>
            </div>
        </div>
    </div>
</footer>


