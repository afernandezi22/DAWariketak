<?php
// Ziurtatu ziurtagiria bidali egin den
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    // Ez bada horrela header-en bitartzen autentikazioa eskatu
    header('WWW-Authenticate: Basic realm="Área restringida"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Orri honetara sartzeko autentikazioa beharrezkoa da.';
    exit;
} else {
    // Bidali bada konprobatzen dugu zuzena dela
    $usuario_autenticado = $_SERVER['PHP_AUTH_USER'];
    $contrasena_autenticada = $_SERVER['PHP_AUTH_PW'];

    // Ruta al archivo .htpasswd
    $ruta_htpasswd = $_SERVER['DOCUMENT_ROOT'] . '/DWES/AutentikazioFroga/.htpasswd';

    // Comprobar las credenciales con htpasswd
    if (!file_exists($ruta_htpasswd) || !password_verify($contrasena_autenticada, file_get_contents($ruta_htpasswd))) {
        header('HTTP/1.0 401 Unauthorized');
        echo 'Datu okerrak. Sarbidea blokeatuta.';
        exit;
    }
    
    // Si las credenciales son válidas, el acceso está permitido
    echo 'Ongi etorri, ' . $usuario_autenticado . '!';
}
?>