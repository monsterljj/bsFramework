<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = titleName(Yii::$app->request->pathInfo);
$this->params['breadcrumbs'] = makeBreadcrumb(Yii::$app->request->pathInfo);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <?php echo Html::csrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php  $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<span class="glyphicon glyphicon-home"></span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    if( !Yii::$app->user->isGuest )
    {
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav'],
            'items' => getModules()
        ]);
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' =>'nav navbar-nav navbar-right'],
            'items' => getModules(true)
        ]);
    }
    else
    {
    ?>
        <div class="pull-right">
            <?php
            echo Html::a(join('', [
                "<span id=\"signup-txt\"></span>\n",
                "<span class=\"glyphicon glyphicon-share\"></span>\n"
            ]),['/signup'], ['class' => 'btn mrc-btn signup', 'id' => 'signup']);

            echo Html::a(join('', [
                "<span id=\"signin-txt\"></span>\n",
                '<span class="glyphicon glyphicon-log-in"></span>'
            ]),['/signin'], ['class' => 'btn mrc-btn signin', 'id' => 'signin']);
            ?>
        </div>
    <?php
        $this->registerJs('
            $(document).ready(function ()
            {
                $("#signup").on("mouseenter", function ()
                {
                    $(this).children("span[id=signup-txt]").text("Criar conta");
                }).on("mouseleave", function () {
                    $(this).children("span[id=signup-txt]").text("");
                });
                $("#signin").on("mouseenter", function ()
                {
                    $(this).children("span[id=signin-txt]").text("Acessar");
                }).on("mouseleave", function () {
                    $(this).children("span[id=signin-txt]").text("");
                });
            });', \yii\web\VIEW::POS_READY);
    }
    NavBar::end();
    ?>
    <div class="container">
            <div class="<?php echo (isSave() ?'content-large':''); ?>">
                <?php
                foreach( ["danger","success"] as $alert):
                    if(Yii::$app->session->hasFlash("alert-{$alert}")): ?>
                        <div class="alert alert-<?php echo $alert;?> alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo Yii::$app->session->getFlash("alert-{$alert}") ?>
                        </div>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
        <?php
            if( Yii::$app->user->identity )
            {
                echo Html::tag('div',
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]),
                    isSave()? ['class' => 'content content-large'] :[]);
            }
            echo $content;
        ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="pull-left">
            <a href="/" style="text-decoration: none">
            <?php
            echo Html::img('@web/web/images/logomarca-mrc4.png', [
                'alt'=>Yii::$app->name,
                'class'=> 'image-logo',
                'title'=>'Volte a raiz do sistema',
                'data-toggle'=>'tooltip'
            ]);?>
            </a>
            <a href="/laravel/" style="text-decoration: none">
                <?php echo Html::img('@web/web/images/Laravel_logo.jpg', [
                    'alt'=>Yii::$app->name,
                    'class'=> 'image-logo',
                    'title'=>'acesso este sistema pelo Laravel',
                    'data-toggle'=>'tooltip'
                ]); ?>
            </a>
        </div>
        <div class="text-center">
            <?php echo  "<strong>&copy; MRC - ".date('Y')." @developed with Yii Framework on your version ".Yii::getVersion()."</strong>"; ?>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>