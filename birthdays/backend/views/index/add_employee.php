<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\helpers\ArrayHelper;
?>
<h2> Добавление сотрудника </h2>
<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($employee, 'last_name') ?>
	<?= $form->field($employee, 'first_name') ?>
	<?= $form->field($employee, 'patronymic') ?>
	<?= $form->field($employee, 'date_of_birth')->widget(\yii\jui\DatePicker::classname(), [
		'language' => 'ru',
		'dateFormat' => 'yyyy-MM-dd',
	])  ?>					
	<?= $form->field($employee, 'mobile_number') ?>
	<?= $form->field($employee, 'email') ?>
	<?= $form->field($employee, 'hobby') ?>
	<?= $form->field($employee, 'department_id') -> ListBox(ArrayHelper::map($depatment, 'department_id', 'name'))?>
	<?= $form->field($employee, 'status')->checkBox() ?>
	<button class="btn btn-primary" type="submit"> Добавить </button>
<?php ActiveForm::end(); ?>

