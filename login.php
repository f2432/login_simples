<?php
session_start();
echo "POST: ";
print_r($_POST);
echo "<br>";
echo "SESSION: ";
print_r($_SESSION);
echo "<br>";
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'dados';
$ligacao = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$erro = 0;

if(isset($_POST["login"])) {

    $login = $_POST["login"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `login` WHERE `login` LIKE '".$login."' AND `password` LIKE '".$password."'";
    $resultado = mysqli_query($ligacao,$sql);
    $numero_linhas = mysqli_num_rows($resultado);
    
    if($numero_linhas == 1) {
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["entrou"] = 1;
    
    } else {
        $_SESSION["entrou"] = 0;
    }

    

}
if(isset($_GET["logout"])) {
    session_destroy();
} else if(isset($_SESSION["entrou"])) {
    if($_SESSION["entrou"] == 1) {
        header('Location: mensagens.php');
        exit;
    }
}
?>

<h1>
    LOGIN ST
</h1>

Descrição | População | História | Cultura | <a href="login.php">Login </a>
<br><br>
<?php
    if(isset($_SESSION["entrou"])) {
        if($_SESSION["entrou"]==0) {
            echo "DADOS INVÁLIDOS! FAÇA LOGIN!<br><br>";
        }
    }
?>
<form method="POST" action="login.php">
Login: <input type="text" name="login"> <br>
Password: <input type="password" name="password"><br>
<input type="submit"><br>

</form>