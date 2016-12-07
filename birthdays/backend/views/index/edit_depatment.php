<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
?>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(); ?>
			<?= $form->field($depatment, 'name') ?>
			<div class="form-group">
				<?= Html::submitButton(
					'Сохранить',
					['class' => 'btn btn-primary']
				) ?>
				<?php if ($depatment->department_id && $depatment->getEmployees()->count() == 0) {
					echo Html::submitInput(
						'Удалить',
						['class' => 'btn btn-primary', 'name' => 'delete']
					);
				} ?>
			</div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
