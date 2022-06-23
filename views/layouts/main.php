<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [];
    if (Yii::$app->user->isGuest) {
      $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        //['label' => 'About', 'url' => ['/site/about']],
        //['label' => 'Help', 'url' => ['/site/help']],
        ['label' => 'Contact Us', 'url' => ['/site/contact']],        
        ['label' => 'Login', 'url' => ['/site/login']],
          
      ];
        
    } else {
        
        $menuItems[] = ['label' => 'Dashboard', 'url' => ['/dashboard/index']];
        
        $menuItems[] = ['label' => 'On The Dot', 'url' => ['#'],'items' => [ 
            ['label' => 'List Entries','url' => ['/otd/index'],],
        
        ]];
        
        /*
         * Reports Menu Items. Might be redundant now as the reports are going to be under the
         * sections
         */ 
        
        $menuItems[] = ['label' => 'Reports', 'url' => ['#'],'items' => [
                //['label' => 'Attendance', 'url' => ['#'],],
                //['label' => 'Follow Ups', 'url' => ['/reports/followups'],],
                //['label' => 'Follow Up Detail', 'url' => ['/reports/followupdetails'],],
                //['label' => 'JIM Track', 'url' => ['#'],]                
            ]];
        
        /*
         * Admin Menu for adding changing or deleting sections that are need for the other parts 
         * of the site.
         * Certain ones of these should be moved to the System section or at least not be accessed by
         * general users.
         */
        $menuItems[] = ['label' => 'Admin', 'url' => ['#'],'items' => [                              
                        ['label' => 'Customers','url' => ['/customers/index'],],
                        ['label' => 'Transport','url' => ['/transport/index'],],
                        ['label' => 'Store Staff','url' => ['/store-personnel/index'],],
            ]];
        //$menuItems[] = ['label' => 'Support', 'url' => ['/site/contact'],];
        
        /*
         * If the user is mightyweb then give some extra menu items, I need to learn RBAC properly!
         */
        if(Yii::$app->user->identity->username === 'mightyweb'){
            $menuItems[] = ['label' => 'System', 'url' => ['#'],'items' => [
                ['label' => 'Gii','url' => ['/gii'],],
                ['label' => 'Users','url' => ['/user/index'],],
            ],];
        }
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->first_name . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Mightyweb <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
