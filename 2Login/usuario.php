<?php
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
            
            $sql = "SELECT * FROM usuarios WHERE Usuario LIKE '" . $datuak["userLogin"] . "'";
            try{
                $emaitza = $this -> conn -> query($sql);
                if ($emaitza -> num_rows > 0){
                    //Konexioa itxi
                    $this -> conn -> close();
                    foreach($emaitza as $user){
                        $hash = $user["Pass"];
                    }
                    $ondo = password_verify($datuak["passwordLogin"], $hash);
                    return $ondo;
                }else{
                    //Konexioa itxi
                    $this -> conn -> close();
                    return false;
                }
            } catch (Exception $e) {
                //echo "ERROREA " . $e;
            }
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["userLogin"])){
        $db = new DB();
        $datuak = ["userLogin" => $_POST["userLogin"], "passwordLogin" => $_POST["passwordLogin"]];
        if($db -> login($datuak)){
            header('Location: register.html');
        } else{
            echo "TXARTO!";
        }
    } elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
        $db = new DB();
        $datuak = ["user" => $_POST["user"], "password" => $_POST["password"]];
        $db -> register($datuak);
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