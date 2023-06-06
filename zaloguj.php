<?php
session_start();

error_reporting(E_ALL & ~E_NOTICE);

set_exception_handler(function ($e) {
    echo $e->getMessage() . "<br>";
});

require_once "connect.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.php");
    exit;
}

$connection = @new mysqli($host, $db_user, $db_pass, $db_name);

$login = $_POST["login"];
$haslo = $_POST["haslo"];

$sql = "SELECT * FROM Uzytkownicy WHERE login='$login' AND haslo='$haslo'";

if ($result = @$connection->query($sql)) {
    $hm_usr = $result->num_rows;
    if ($hm_usr > 0) {
        $_SESSION["loggedin"] = true;
        $row = $result->fetch_assoc();
        $_SESSION["login"] = $row["login"];

        $result->close();
        header("Location:index.php");
    } 
    else {
        $_SESSION["error"] = true;
        header("Location:login.php");
    }
} 


$connection->close();
?>
