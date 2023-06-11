<?php
session_start();
require_once "connect.php";

// Pobranie danych z formularza
$login = $_POST["login"];
$question = $_POST["question"];
$answer = $_POST["answer"];
$new_password = $_POST["new_password"];

// Nawiązanie połączenia z bazą danych na podstawie danych z pliku connect.php
$connection = new mysqli($host, $db_user, $db_pass, $db_name);

// Sprawdzenie poprawności danych w bazie
$sql = "SELECT * FROM Uzytkownicy WHERE login='$login' AND PytaniePomocnicze='$question' AND OdpowiedzPomocnicza='$answer'";
$result = $connection->query($sql);

// Jeśli znaleziono dopasowanie dla podanych danych
if ($result->num_rows > 0) {
    // Aktualizacja hasła użytkownika w bazie danych
    $sql_update = "UPDATE Uzytkownicy SET haslo='$new_password' WHERE login='$login'";
    if ($connection->query($sql_update)) {
        // Przekierowanie na stronę logowania po pomyślnej zmianie hasła
        header('Location: login.php');
    } else {
        // Obsługa błędu w przypadku niepowodzenia zapytania aktualizującego hasło
    }
} else {
    // Jeśli dane są niepoprawne, ustawienie komunikatu błędu w sesji i przekierowanie na stronę odzyskiwania hasła
    $_SESSION["error"] = "Błędne dane!";
    header('Location: recover.php');
}

$result->close();
$connection->close();
?>
