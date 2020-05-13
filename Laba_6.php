<?php
    if (isset($_POST["update"])) {
        header("Location: Laba_6.php");
    }

    if (isset($_POST["delete"])) {
        $delete = $_POST['delete'];
        foreach($delete as $item) {
            setcookie($item, "", 0);
        }
        header("Location: Laba_6.php");
    }
    
    if (isset($_POST["ttl"])) {
        $time = intval($_POST["ttl"]);
    } else {
        $time = -1;
    }
    if (isset($_POST["cook"]) and isset($_POST["value"])) {
        $name = $_POST["cook"];
        $value = $_POST["value"];
        setcookie($name, $value, time()+$time);
        header("Location: Laba_6.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>We use Cookie!</title>
</head>
<body>
	<table><tr><td style="padding-right: 25px;">
        <form method="POST">
            <input type="text" name="cook"><br>
            <textarea name="value" rows="5" cols="22"></textarea><br>
            <input type="number" name="ttl" min="0" max="7200">
            <input type="submit" value="Добавить куки">
        </form>
        </td><td>
        <?php
            echo "<form method=\"POST\"><table border=\"1px solid\">\n";
            foreach ($_COOKIE as $name => $value) {
                echo "<tr><td><input type=\"checkbox\" name=\"delete[]\" value=\"$name\" /></td><td>\n$name\n</td><td>\n$value\n</td></tr>\n";
            }
            echo "</table>\n<input type=\"submit\" value=\"Удалить выделенные\">\n</form>";
        ?>
        <form method="POST"><input type="submit" name="update" value="Обновить"></form>
    </td></tr></table>
</body>
</html>