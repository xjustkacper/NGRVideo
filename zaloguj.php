<?php
session_start();

// Raportowanie wszystkich błędów, z wyjątkiem Notice
error_reporting(E_ALL & ~E_NOTICE);

// Ustawienie funkcji obsługi wyjątków, która wyświetli komunikat błędu
set_exception_handler(function ($e) {
    echo $e->getMessage() . "<br>";
});

// Import pliku connect.php
require_once "connect.php";

// Sprawdzanie, czy użytkownik jest zalogowany i przekierowanie na stronę główną, jeśli tak
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.php");
    exit;
}

// Nawiązanie połączenia z bazą danych na podstawie danych z pliku connect.php
$connection = @new mysqli($host, $db_user, $db_pass, $db_name);

// Pobranie danych z formularza logowania
$login = $_POST["login"];
$haslo = $_POST["haslo"];

// Zapytanie SQL w celu sprawdzenia poprawności danych logowania
$sql = "SELECT * FROM Uzytkownicy WHERE login='$login' AND haslo='$haslo'";

// Wykonanie zapytania SQL
if ($result = @$connection->query($sql)) {
    // Sprawdzanie liczby użytkowników pasujących do danych logowania
    $hm_usr = $result->num_rows;
    if ($hm_usr > 0) {
        // Jeśli znaleziono użytkownika, ustawienie zmiennych sesyjnych i przekierowanie na stronę główną
        $_SESSION["loggedin"] = true;
        $row = $result->fetch_assoc();
        $_SESSION["login"] = $row["login"];

        $result->close();
        header("Location:index.php");
    } 
    else {
        // Jeśli nie znaleziono użytkownika, ustawienie zmiennej sesyjnej "error" i przekierowanie na stronę logowania
        $_SESSION["error"] = true;
        header("Location:login.php");
    }
} 

// Zamknięcie połączenia z bazą danych
$connection->close();
?>
