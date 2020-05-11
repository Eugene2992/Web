<?php
	$names = array('Главная', 'Карты локации', 'Поиск', 'Таблица патронов', 'О боссах');
	$urls = array('Main','Maps','Search','AmmoTable','Bosses');
	if(isset($_GET["active"])) {
		$curr= $_GET["active"];
		switch ($curr) {
		case 0:
			$filename="Main.php";
			break;
		case 1:
			$filename="Maps.php";
			break;
		case 2:
			$filename="Search.php";
			break;
		case 3:
			$filename="AmmoTable.php";
			break;
		case 4:
			$filename="Bosses.php";
			break;
	}
	$data=file_get_contents($filename);
	echo $data;
	}
	else {
		$data=file_get_contents("Main.php");
		echo $data;
	}
?>