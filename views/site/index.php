<?php

/* @var $this yii\web\View */

$this->title = 'Ellies Portal';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Ellies Portal</h1>

        <p class="lead">Welcome to the Ellies Bloem Portal</p>
        
    </div>

    <div class="body-content">
        <div class="row">
    <?php
        if (Yii::$app->user->isGuest) {
            echo '<p class="lead">Please log in to access the Ellies portal.</p>';
        }
?>    
            
          
        </div>

    </div>
</div>
