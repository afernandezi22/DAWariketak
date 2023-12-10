<?php
    session_start();
    
    class DB{
        private $servername;
        private $username;
        private $password;
        private $database;
        private $conn;

        //==============================================================================================>
        //DATUBASEAREN FUNTZIOAK .......................................................................>
        //==============================================================================================>
        public function __construct(){
            $this -> servername = "localhost";
            $this -> username = "root";
            $this -> password = "";
            $this -> database = "usuarios";
        }

        private function connect(){
            $this -> conn = new mysqli($this -> servername, $this -> username, $this -> password, $this -> database);
            
            //Konexioa begiratu
            if($this -> conn -> connect_error){
                die("Connection failed: " . $this -> conn -> connect_error);
            }

            return $this -> conn;
        }
        
        //==============================================================================================>
        //LOGIN FUNTZIOAK ..............................................................................>
        //==============================================================================================>
        public function register($datuak){
            $this -> connect();

            // Lortutako pasahitza enkriptatu eta datu-basean sartu
            $hash = password_hash($datuak["password"], PASSWORD_BCRYPT);
            $sql = "INSERT INTO usuarios(Usuario, Pass) VALUES('" . $datuak["user"] . "', '" . $hash . "')";
            
            if($emaitza = $this -> conn -> query($sql)){
                //Konexioa itxi
                $this -> conn -> close();
                return $emaitza;
            } else{
                //Konexioa itxi
                $this -> conn -> close();
                return 0;
            }
            
        }

        public function login($datuak){
            $this -> connect();
            
            // Erabiltzailearen arabera kontsulta egin
            $sql = "SELECT * FROM usuarios WHERE Usuario LIKE '" . $datuak["userLogin"] . "'";
            try{
                $emaitza = $this -> conn -> query($sql);
                // Emaitzaren bat badago
                if ($emaitza -> num_rows > 0){
                    //Konexioa itxi
                    $this -> conn -> close();
                    // Emaitza begiratu eta pasahitzaren hash-a lortu
                    foreach($emaitza as $user){
                        $hash = $user["Pass"];
                    }

                    // Desenkriptatu verify eginez. True edo false bueltatzen du ondo/txarto badago
                    $ondo = password_verify($datuak["passwordLogin"], $hash);
                    return $ondo;
                }else{
                    //Konexioa itxi
                    $this -> conn -> close();
                    // Ez badu erabiltzailea topatzen false bueltatzen du
                    return false;
                }
            } catch (Exception $e) {
                //echo "ERROREA " . $e;
            }
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["userLogin"])){ //Login
        $db = new DB();
        $datuak = ["userLogin" => $_POST["userLogin"], "passwordLogin" => $_POST["passwordLogin"]];
        if($db -> login($datuak)){
            // Momentu honetako denbora gorde
            $_SESSION['denbora'] = time();
            // Erabiltzailearen izena gorde
            $_SESSION['erabiltzailea'] = $_POST["userLogin"];
            // Erregistroko pantailara eramaten du
            header('Location: register.php');
        } else{
            echo "Logina ez da zuzena!";
        }
    } elseif($_SERVER['REQUEST_METHOD'] == 'POST'){ //Erregistroa
        $db = new DB();
        $datuak = ["user" => $_POST["user"], "password" => $_POST["password"]];
        if(time() - $_SESSION['denbora'] > 120){
            // 120 segundu pasatu badira loginera bueltatuko da
            header('Location: usuario.php');
        } else{
            // Erregistroa egin
            $db -> register($datuak);
        }
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
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <fieldset>
            <p><?php
                // Mezu bat erakutsiko du sesioa iraungitu dela esanez 120 segundu pasatu badira eta sesioa suntsituko du
                if(isset($_SESSION['denbora']) && (time() - $_SESSION['denbora'] > 120)){
                    session_destroy();
                    echo "Sesioa iraungitu da";
                    die();
                }
            ?></p>
            <legend>Erabiltzailea:</legend>
            <label for="userLogin">Erabiltzaile</label>
            <input type="text" id="userLogin" name="userLogin"><br><br>
            <label for="passwordLogin">Pashitza</label>
            <input type="password" id="passwordLogin" name="passwordLogin"><br><br>
            <input type="submit" value="Submit" name="enviar">
        </fieldset>  
      </form>
</body>
</html>