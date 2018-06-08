<?php
$json = file_get_contents(__DIR__ . '/adressbook.json');
$data = json_decode($json, true);
?>

<html>
<head>
	<title>Адресная книга</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
<table>
	<thead>
		<tr>
			<td>Имя</td>
			<td>Фамилия</td>
			<td>Индекс</td>
			<td>Город</td>
			<td>Улица</td>
			<td>Дом</td>
			<td>Квартира</td>
			<td>Телефон</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $item) { ?>
		<tr>
			<td><?php echo $item['firstName'] ?></td>
			<td><?php echo $item['lastName'] ?></td>
			<?php foreach ($item['address'] as $value) { ?>
				<td><?php echo $value ?></td>
			<?php } ?>
			<td>
				<?php $numbers = $item['phoneNumbers'];
					for ($i = 0; $i < count($numbers) - 1; $i++) {
						echo "+$numbers[$i], ";
					}
						echo "+".end($numbers);
			  ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

</body>
</html>