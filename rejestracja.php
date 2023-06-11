<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', 'Off');

session_start();


require_once "connect.php";
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.html");
    exit;
}


$connection = @new mysqli($host, $db_user, $db_pass, $db_name);

// rejestracja nowego użytkownika

    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $PytaniePomocnicze = $_POST["pytanie"];
    $OdpowiedzPomocnicza = $_POST["odpowiedz"];
    
    // sprawdzenie, czy login już istnieje w bazie danych
    $sql_check = "SELECT * FROM Uzytkownicy WHERE login='$login'";
    $result_check = $connection->query($sql_check);
    if ($result_check->num_rows > 0) {
        $error_msg = "Ten login jest już zajęty.";
        echo $error_msg;
    } else {
        // dodanie nowego użytkownika do bazy danych
        $sql_insert = "INSERT INTO Uzytkownicy (login, haslo, PytaniePomocnicze, OdpowiedzPomocnicza) VALUES ('$login', '$haslo', '$PytaniePomocnicze', '$OdpowiedzPomocnicza')";
        if ($connection->query($sql_insert) === TRUE) {
            $success_msg = "Rejestracja przebiegła pomyślnie, możesz się teraz zalogować.Zostaniesz przekierowany automatycznie!";
            echo $success_msg;
            header("refresh:5;url=login.php");
        } else {
            $error_msg = "Błąd dodawania użytkownika: " . $connection->error;
            echo $rror_msg;
        }
    }

$connection->close();
?>
