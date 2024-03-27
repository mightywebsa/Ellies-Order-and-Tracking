<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>

<!-- Order Header Fields -->
<?= $form->field($orderHeaderModel, 'id') ?>
<?= $form->field($orderHeaderModel, 'ord_customer_id') ?>
<?= $form->field($orderHeaderModel, 'ord_rep') ?>
<?= $form->field($orderHeaderModel, 'ord_total_excl') ?>

<!-- Order Details Fields -->
<!-- You use a loop or JavaScript to dynamically add these fields -->
<?= $form->field($orderDetailsModel, '[0]item_code')->textInput() ?>
<?= $form->field($orderDetailsModel, '[0]item_qty')->textInput() ?>
<?= $form->field($orderDetailsModel, '[0]item_price')->textInput() ?>
<script>
    $(document).ready(function() {
    $("#add-product").click(function() {
        var index = $("#orderdetails-form .item").length;
        var template = $("#product-template").html().replace(/__index__/g, index);
        $("#orderdetails-form").append(template);
    });
});
</script>
<div class="form-group">
    <div id="product-template" style="display:none;">
        <?= $form->field($orderDetailsModel, '[__index__]item_code')->textInput() ?>
        <?= $form->field($orderDetailsModel, '[__index__]item_qty')->textInput() ?>
        <?= $form->field($orderDetailsModel, '[__index__]item_price')->textInput() ?>
        <?= Html::button('Add Product', ['class' => 'btn btn-success', 'id' => 'add-product']) ?>

    </div>

    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
