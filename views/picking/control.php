<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */

$this->title = 'Control Update: ' . $model->fl_ps_no;
$this->params['breadcrumbs'][] = ['label' => 'Picking Slip', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fl_ps_no, 'url' => ['view', 'id' => $model->fl_ps_id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<script>
    function getaddress()
  {
    $accno = (document.getElementById("fl_ps_customer").value);
    
    //AJAX function to add or edit user in database
        if(window.XMLHttpRequest)
        {//code for IE7+, FF, Chrome, Opera, Safari
                xmlhttp2 = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
                xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp2.onreadystatechange=function()
                {
                        if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
                        {
                                alert(xmlhttp2.responseText);
                        }
                }
        xmlhttp2.open("GET", "accounts.php?accno=" + $accno,true);
        xmlhttp2.send();
  }
  
  function setCurrentDateTime($element_id) {
    var checkbox = document.getElementById($element_id);
    var textField = document.getElementById($element_id+"_date");

    if (checkbox.checked) {
      var now = new Date();
      var formattedDateTime = now.toISOString().replace(/T/, ' ').replace(/\..+/, '');;
      textField.value = formattedDateTime;
    } else {
      textField.value = "";
    }
  }
</script>

<div class="picking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_controlform', [
        'model' => $model,
    ]) ?>

</div>
