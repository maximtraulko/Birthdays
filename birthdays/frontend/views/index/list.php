<?php
	Use \yii\helpers\Html;
?>
<p>Структура компании KinoMax</p>
<table class="table">
	<tr>
		<th class = "danger">Наименование отдела </th> 
		<th class = "danger">Сотрудники отдела</th> 
	</tr>
	<?php foreach($depatments as $depatment){ ?>
		<tr>
			<td class = "success"> <?= htmlspecialchars($depatment->name) ?> </td>
			<td class = "warning">
				<div class="btn-group" role="group">
					<?php
						if ($depatment->getEmployees()->count() > 0) {
							echo Html::a(
								'<span class="glyphicon glyphicon-user"></span> Просмотреть',
								['index/list2', 'department_id' => $depatment ->department_id],
								['class' => 'btn btn-default']
							);
						}
					?>
				</div>
			</td>	
		</tr>
<?  } ?>
</table>

