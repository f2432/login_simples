<?php
session_start();
if(!isset($_SESSION["entrou"])) {
    header('Location: login.php');
    exit;
}
if($_SESSION["entrou"]!=1) {
    header('Location: login.php');
    exit;
}
?>
<h1>
    MENSAGENS ST
</h1>

Descrição | População | História | Cultura | <a href="login.php">Login </a>
<br><br>

<?php
    if(isset($_SESSION["login"])) {
        echo "Olá ".$_SESSION["login"]."<br><br>";
    }
?>

MENSAGENS PROTEGIDAS....
<br><br>
<a href="login.php?logout=1"> Logout </a>