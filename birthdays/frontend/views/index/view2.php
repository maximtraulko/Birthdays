<?php
	Use \yii\helpers\Html;
?>
<h2>
	<p class="text-center">
		<?= htmlspecialchars($employee->last_name); ?>
		<?= htmlspecialchars($employee->first_name); ?> 
		<?= htmlspecialchars($employee->patronymic); ?>
	</p>
</h2>   
<h3>
	<p class="text-center">День рождения: <?= (new \DateTime($employee->date_of_birth))->format('d.m') ?></p>
</h3>
<p>Побробная информация</p>
<table class="table">
	<tr class = "danger">
		<th class="text-center">В настоящее время</th> 
		<th class="text-center">Мобильный телефон</th>
		<th class="text-center">Электронная почта</th> 
		<th class="text-center">Интересы и увлечения</th> 
	</tr>
	<tr class = "warning">
		<td class="text-center">
			<? if ($employee->status == "1") {
				foreach($employee->getDepartment() ->all() as $department) { 
					echo "Работает в компании (".htmlspecialchars($department->name).")";
				}
			} else {
				echo 'В компании не работает';
			}
			?>
		</td>
		<td class="text-center"> <?= htmlspecialchars($employee->mobile_number) ?> </td>
		<td class="text-center"> <?= htmlspecialchars($employee->email) ?> </td>
		<td class="text-center"> <?= htmlspecialchars($employee->hobby) ?> </td>
	</tr>
</table>  

