<?php
// Verifica si ya se ha proporcionado la autenticación básica
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    // Si no se ha proporcionado, solicita la autenticación
    header('WWW-Authenticate: Basic realm="Área restringida"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Para acceder a esta página, por favor, proporcione sus credenciales.';
    exit;
} else {
    // Obtiene las credenciales proporcionadas por la autenticación básica
    $usuario_autenticado = $_SERVER['PHP_AUTH_USER'];
    $contrasena_autenticada = $_SERVER['PHP_AUTH_PW'];

    // Lee las credenciales almacenadas en el archivo .htpasswd
    $archivo_htpasswd = file_get_contents('E:/xampp/htdocs/DWES/Auth/.htpasswd');
    $lineas = explode("\n", $archivo_htpasswd);

    // Verifica las credenciales con las del archivo .htpasswd
    $credenciales_validas = false;
    foreach ($lineas as $linea) {
        $partes = explode(':', $linea);
        if (count($partes) >= 2) {
            $usuario_valido = $partes[0];
            $hash = trim($partes[1]); // Asegúrate de eliminar posibles espacios al final
            if ($usuario_autenticado === $usuario_valido && password_verify($contrasena_autenticada, $hash)) {
                $credenciales_validas = true;
                break;
            }
        }
    }

    if (!$credenciales_validas) {
        header('HTTP/1.0 401 Unauthorized');
        echo 'Credenciales incorrectas. Acceso bloqueado.';
        exit;
    }

    // Redirige a la página protegida si las credenciales son válidas
    header('Location: pagina_protegida.php');
    exit;
}
?>