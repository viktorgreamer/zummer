<?

use common\models\Programs;
use yii\helpers\Url;
/** @var \yii\web\View $this */
/** @var \common\models\Developers $model */
$this->title = 'Личный кабинет';
?>

<div class="content">
    <div class="container">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= Url::to(['/']);?>">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Личный кабинет</li>
                </ol>
            </nav>
        </div>
        <div class="main">
            <?= $this->render('../layouts/admin_nav');?>

            <div class="row2 row row_admin">
                <div class="col-lg-4 order-md-2 info_profile">
                    <div class="tab">
                        <div class="top">
                            <p>Информация о профиле <img alt="" src="img/profile.png"></p>
                        </div>
                        <div class="cont">
                            <? Yii::error($model->profile->percent);?>
                            <div class="progress_с">
                                <p class="inf">Осталось <?= $model->profile->percent;?>/100</p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <?php if ($notCompleted = $model->profile->notCompleted) { ?>
                            <div class="nec_inf">
                                <p>список необходимой информации</p>
                                <ul>
                                    <?php foreach ($notCompleted as $item) { ?>
                                    <li><i></i> Заполните ваш <a href="<?= Url::to(['/developer/profile']);?>"><?= $item;?></a></li>
                                    <? }?>
                                </ul>
                            </div>

                            <? } ?>
                        </div>
                    </div>
                </div>


                    <div class="col-lg-8 oreder-md-1 table">
                        <p class="title">Объявления</p>

                        <div class="tab">
                            <table>
                                <tr class="top">
                                    <th>Дата</th>
                                    <th>Программа</th>
                                    <th>Категория</th>
                                    <th>Просмотры</th>
                                </tr>
                                <?php if ($programs = $model->getPrograms()->all()) { ?>
                                <? /** @var Programs $program */
                                foreach ($programs as $program) { ?>
                                <tr>
                                    <td class="date">
                                        <p class="titl">Дата</p>
                                        <span class="red"><?= date('d.m.Y',$program->created_at);?></span>
                                    </td>
                                    <td>
                                        <p class="titl">Программа</p>
                                        <a href="<?= Url::to(['/developer/programs/view','id' => $program->id]);?>">  <?= $program->name;?></a>
                                    </td>
                                    <td>
                                        <p class="titl">Категория</p>
                                        <a href="<?= Url::to(['/developer/programs/view','id' => $program->id]);?>"><?php echo $program->category->name;?></a>
                                    </td>
                                    <td>
                                        <p class="titl">Просмотры</p>
                                        <img alt="" class="view" src="img/view.png"> <?= $program->popularity; ?>
                                    </td>
                                </tr>
                                <? } ?>
                                <?php } ?>

                            </table>
                        </div>

                    </div>

            </div>

            <?php if ($programs = Programs::getPopular(4)): ?>
                <p class="title">Самые популярные программы <span class="d-none d-lg-block">Тебя здесь нет. <a href="#">Получи больше лидов и отзывов</a></span>
                </p>
                <div class="row3 row">
                    <div class="col-md-7 table popul_programs">
                        <div class="tab">
                            <table>
                                <tr class="top">
                                    <th>Название</th>
                                    <th>Рейтинг</th>
                                    <th>Отзывы</th>
                                </tr>
                                <? /** @var Programs $program */
                                foreach ($programs as $program) { ?>
                                <tr>
                                    <td class="date">
                                        <p class="titl"><?= $program->name;?></p>
                                        <img alt="" src="<?= $program->getLogo();?>">
                                    </td>
                                    <td>
                                        <p class="titl">Рейтинг</p>
                                        <div class="rating">
                                            <div class="stars">
                                                <span class="d-md-none" data-star="5"></span>
                                                <span class="d-md-none" data-star="4"></span>
                                                <span class="d-md-none" data-star="3"></span>
                                                <span class="d-md-none" data-star="2"></span>
                                                <span data-star="1"></span>
                                            </div>
                                            <div class="num"><?= $program->rating;?></div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="titl">Отзывы</p>
                                        <img alt="" class="review" src="img/review.png"> <?= $program->getReviews()->count();?>
                                    </td>
                                </tr>
                                <? } ?>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5 advice">
                        <div class="tab">
                            <div class="top">
                                <p>Совет эксперта <img alt="" src="img/advice.png"></p>
                            </div>
                            <div class="cont">
                                <ul>
                                    <li><a href="#">Нужно быстро обработать заявку?</a> <i></i></li>
                                    <li><a href="#">Нужно быстро обработать заявку?</a> <i></i></li>
                                    <li><a href="#">Нужно быстро обработать заявку?</a> <i></i></li>
                                    <li><a href="#">Нужно быстро обработать заявку?</a> <i></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>



        </div>
    </div>
</div>