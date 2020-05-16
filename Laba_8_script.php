<?php
	$link = mysqli_connect("localhost", "root", "1337", "productsdatebase")
		or die("Ошибка " . mysqli_error($link));
	mysqli_set_charset($link, "utf8");
		
	$query = "SELECT count FROM count";
	$result = mysqli_query($link, $query);
	$arr = mysqli_fetch_row($result);
	$count = intval($arr[0]);
	if (!$result)
	{
		printf('Не нашло');
	}
	
	$query = "DELETE FROM count WHERE count=$count";
	$result = mysqli_query($link, $query);
	if (!$result)
	{
		printf('Не удалило');
	}
	
	$count += 1;
	$query = "INSERT INTO count VALUES($count)";
	$result = mysqli_query($link, $query);
	if (!$result)
	{
		printf('Не добавило');
	}
		
	mysqli_close($link);
	echo $data = file_get_contents("Main.php");
?>