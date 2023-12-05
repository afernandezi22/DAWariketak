<?php
    $pass = "123";
    $hash = password_hash($pass,PASSWORD_BCRYPT);

    echo "pasahitza zifratua: " . $hash;
?>