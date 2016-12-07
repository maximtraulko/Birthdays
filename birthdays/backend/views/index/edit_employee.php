<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\helpers\ArrayHelper;
?>
<div class="row">
    <div class="col-lg-5">
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
			<div class="form-group">
				<?= Html::submitButton(
					'Сохранить',
					['class' => 'btn btn-primary']
				) ?>
				<?= Html::submitInput(
					'Удалить',
					['class' => 'btn btn-primary', 'name' => 'delete']
				);?>
				</div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
