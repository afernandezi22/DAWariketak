<?php
    //Cookie-a ez badago loginera bueltatuko da zuzenean
    if(!isset($_COOKIE['login'])){
        header('Location: usuario.php');
    }
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <img src="IFC.png" width="10%">
    <form action="usuario.php" method="POST">
        <fieldset>
            <legend>Erabiltzailea (<?php echo $_COOKIE['login'] ?>):</legend>
            <label for="user">Erabiltzaile</label>
            <input type="text" id="user" name="user"><br><br>
            <label for="password">Pashitza</label>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Submit" name="enviar">
        </fieldset>  
      </form>
</body>
</html>