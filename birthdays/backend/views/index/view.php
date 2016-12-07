<?php
	Use \yii\helpers\Html;
?>
<?php 
	function dateToRussian($date) {
		$month = array("january"=>"января", "february"=>"февраля", "march"=>"марта", "april"=>"апреля", "may"=>"мая", "june"=>"июня", "july"=>"июля", "august"=>"августа", "september"=>"сентября", "october"=>"октября", "november"=>"ноября", "december"=>"декабря");
		$days = array("monday"=>"понедельник", "tuesday"=>"вторник", "wednesday"=>"среда", "thursday"=>"четверг", "friday"=>"пятница", "saturday"=>"суббота", "sunday"=>"воскресенье");
		return str_replace(array_merge(array_keys($month), array_keys($days)), array_merge($month, $days), strtolower($date));
	}
	echo 'Сегодня '.dateToRussian(date('l, j F Y')).' года';
	$parametr='0';
?>
<h2>
	<p class="text-center">Ближайшие дни рождения сотрудников компании KinoMax (данные формируются на 7 календарных дней)</p>
</h2>
	<table class="table">
		<tr class = "danger">
			<th>№ </th> 
			<th>Фамилия </th> 
			<th>Имя </th> 
			<th>Отчество </th> 
			<th>Дата рождения</th> 
			<th>Узнать побробнее </th> 
		</tr>
		<?php foreach($employees as $employee){ 
			$born = $employee->date_of_birth; 
			$born = strtotime($born); 
			$now = time(); 
			$now2 = mktime(0, 0, 0, date('m',$now), date('d',$now), date('Y',$now));  
			$next_birthday = mktime(0, 0, 0, date('m',$born), date('d',$born), date('Y')); 
			if ($next_birthday >= $now2 && $next_birthday <= strtotime("+7 day", $now2)) { 
				$parametr='1'?> 
				<tr>
					<td class = "active">  <?= $employee->id ?> </td>
					<td class = "success"> <?= htmlspecialchars($employee->last_name) ?> </td>
					<td class = "success"> <?= htmlspecialchars($employee->first_name) ?> </td>
					<td class = "success"> <?= htmlspecialchars($employee->patronymic) ?> </td>
					<td class = "success"> <?= (new \DateTime($employee->date_of_birth))->format('d.m.Y') ?></td>	
					<td class = "warning"> <?= Html::a('Подробнее', ['index/view2', 'id' => $employee ->id]) ?> </td>
				</tr>		
		<?  }
		} ?>
		<tr class="alert alert-success" role="alert">
		<? 	if ($parametr == "0") { ?>
				<td colspan="6" class="text-center">В ближайшие 7 дней в компании не наблюдается именинников</td>
		<?  }?>
		</tr>
</table>

