<?php
    setcookie("erabiltzailea", "Sergio", time() + 30);
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookiak</title>
</head>
<body>
    <?php
        if(isset($_COOKIE["erabiltzailea"])){
            echo "<p>Erabiltzailea: " . $_COOKIE["erabiltzailea"] . "</p>";
        } else{
            echo "<p>Aldagaia ezabatuta</p>";
        }
    ?>
</body>
</html>