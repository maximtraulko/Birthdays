<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm; 
?>
<h2> Добавление отдела </h2>
<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($depatment, 'name') ?>
	<button class="btn btn-primary" type="submit"> Добавить </button>
<?php ActiveForm::end(); ?>

