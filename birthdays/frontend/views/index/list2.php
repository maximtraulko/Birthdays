﻿<?php 
	Use \yii\helpers\Html;
?>
<h2>
	<p class="text-center"><?= htmlspecialchars($employees->name); ?></p>
</h2>    
<p>Список сотрудников</p> 	
<table class="table">
	<tr class="danger">
		<th class="text-center">Фамилия </th> 
		<th class="text-center">Имя </th> 
		<th class="text-center">Отчество </th> 
		<th class="text-center">День рождения</th> 
		<th class="text-center">Мобильный телефон</th>
		<th class="text-center">Электронная почта</th> 
		<th class="text-center">Интересы и увлечения</th> 
		<th class="text-center">В настоящее время</th> 
	</tr>
	<?php foreach($employees->getEmployees() ->all() as $employee){ ?>
		<tr>
			<td class = "success"> <?= htmlspecialchars($employee->last_name) ?> </td>
			<td class = "success"> <?= htmlspecialchars($employee->first_name) ?> </td>
			<td class = "success"> <?= htmlspecialchars($employee->patronymic) ?> </td>
			<td class = "success"><?= (new \DateTime($employee->date_of_birth))->format('d.m') ?></td>
			<td class = "success"> <?= htmlspecialchars($employee->mobile_number) ?> </td>
			<td class = "success"> <?= htmlspecialchars($employee->email) ?> </td>
			<td class = "success"> <?= htmlspecialchars($employee->hobby) ?> </td>
			<td class = "success">
				<? if ($employee->status == "1") {
					foreach($employee->getDepartment() ->all() as $department) { 
						echo "Работает в компании";
					}
				} else {
					echo 'В компании не работает';
				}
				?>
			</td>
		</tr>		
<?  } ?>
</table>




