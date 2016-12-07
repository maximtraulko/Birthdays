<?php 
	Use \yii\helpers\Html; 
?>
<p>Структура компании KinoMax</p>
<p><?=Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить отдел', ['index/add_depatment'],['class'=> 'btn btn-success'])?>
 <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить сотрудника', ['index/add_employee'],['class'=> 'btn btn-success'])?></p>
<table class="table">
	<tr>
		<th class = "danger">№ </th> 
		<th class = "danger">Наименование отдела </th> 
		<th class = "danger">Работа с данными</th> 
	</tr>
	<?php foreach($depatments as $depatment){ ?>
		<tr>
			<td class = "active"> <?= $depatment->department_id ?> </td>
			<td class = "success"> <?= htmlspecialchars($depatment->name) ?> </td>
			<td class = "warning">
				<div class="btn-group" role="group">
					<?php
						echo Html::a(
							'<span class="glyphicon glyphicon-edit"></span> Изменить',
							['index/edit_depatment', 'department_id' => $depatment-> department_id],
							['class' => 'btn btn-default']
						);
						if ($depatment->getEmployees()->count() > 0) {
							echo Html::a(
								'<span class="glyphicon glyphicon-user"></span> Список сотрудников',
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


