<!DOCTYPE html>
<html>
<head>
	<title>Обработка данных</title>
	<meta charset="UTF-8"/>
	<link href="Laba_4.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header>
	<h1>Результат работы:</h1>
</header>
<body>
	<?php	
	if(isset($_POST['send']))
	{
		$fName = $_POST['send'];
		$arr = file($fName);
		echo $str = implode($arr);
		echo "</br></br>"; 
		
		$token = strtok($str, " \n\t");
		while ($token !== false) 
		{
			if (preg_match("([0-3]?\d\.[0-1]?\d\.\d{2,4}|[0-1]?\d/[0-3]?\d/\d{2,4})",$token,$tmp) != FALSE)
			{
				$str = implode($tmp);
				$length = strlen($str);
				$i = 0;
				$day = '';
				$month = '';
				$year = '';
				$res = '';
				if (strpos($str,"/") != FALSE)
				{
					while ($str[$i] != '/' && $i < $length)
					{
						$month .= $str[$i];
						$i++;
					}
					$i++;
					

					while ($str[$i] != '/' && $i < $length)
					{
						$day .= $str[$i];
						$i++;
					}
					$i++;
					
					while ($i < $length)
					{
						$year .= $str[$i];
						$i++;
					}
					
					$res = $day.'.'.$month.'.'.($year + 1);
				}
				else
				{
					//пропуск до года
					while ($str[$i] != '.' && $i < $length)
					{
						$day .= $str[$i];
						$i++;
					}
					$i++;
					
					while ($str[$i] != '.' && $i < $length)
					{
						$month .= $str[$i];
						$i++;
					}
					$i++;
					
					while ($i < $length)
					{
						$year .= $str[$i];
						$i++;
					}
					
					$res = $day.'.'.$month.'.'.($year + 1);
				}
				echo "<a class='red'>$res</a></br>";
			}
			$token = strtok(" \n\t");
		}
	}
?>
</body>
</html>