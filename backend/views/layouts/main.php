<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

<!--    --><?//=Html::cssFile('/vendor/bower/bootstrap/dist/css/bootstrap.min.css')?>
<!--    --><?//=Html::jsFile('/vendor/bower/jquery/dist/jquery.min.js')?>



    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>


    <?= $content ?>


    <?php $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>


