<?php
session_start();
require_once "connect.php";

$login = $_POST["login"];
$question = $_POST["question"];
$answer = $_POST["answer"];
$new_password = $_POST["new_password"];

$connection = new mysqli($host, $db_user, $db_pass, $db_name);

$sql = "SELECT * FROM Uzytkownicy WHERE login='$login' AND PytaniePomocnicze='$question' AND OdpowiedzPomocnicza='$answer'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $sql_update = "UPDATE Uzytkownicy SET haslo='$new_password' WHERE login='$login'";
    if ($connection->query($sql_update)) {
        header('Location: login.php');
    } else {
        // Handle the error if the password update query fails
    }
} else {
    $_SESSION["error"] = "Błędne dane!";
    header('Location: recover.php');
}

$result->close();
$connection->close();

?>
