<?php
// Wyłączenie raportowania błędów i ostrzeżeń (z wyjątkiem Notice)
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
// Wyłączenie wyświetlania błędów
ini_set('display_errors', 'Off');

session_start();

// Import pliku connect.php
require_once "connect.php";

// Sprawdzanie, czy użytkownik jest zalogowany i przekierowanie na stronę główną, jeśli tak
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.html");
    exit;
}

// Nawiązanie połączenia z bazą danych na podstawie danych z pliku connect.php
$connection = @new mysqli($host, $db_user, $db_pass, $db_name);

// Rejestracja nowego użytkownika

// Pobranie danych z formularza rejestracji
$login = $_POST["login"];
$haslo = $_POST["haslo"];
$PytaniePomocnicze = $_POST["pytanie"];
$OdpowiedzPomocnicza = $_POST["odpowiedz"];

// Sprawdzenie, czy login już istnieje w bazie danych
$sql_check = "SELECT * FROM Uzytkownicy WHERE login='$login'";
$result_check = $connection->query($sql_check);
if ($result_check->num_rows > 0) {
    // Jeśli login już istnieje, ustawienie komunikatu błędu
    $error_msg = "Ten login jest już zajęty.";
    echo $error_msg;
} else {
    // Dodanie nowego użytkownika do bazy danych
    $sql_insert = "INSERT INTO Uzytkownicy (login, haslo, PytaniePomocnicze, OdpowiedzPomocnicza) VALUES ('$login', '$haslo', '$PytaniePomocnicze', '$OdpowiedzPomocnicza')";
    if ($connection->query($sql_insert) === TRUE) {
        // Jeśli dodawanie użytkownika powiedzie się, ustawienie komunikatu o sukcesie
        $success_msg = "Rejestracja przebiegła pomyślnie, możesz się teraz zalogować. Zostaniesz przekierowany automatycznie!";
        echo $success_msg;
        // Przekierowanie na stronę logowania po 5 sekundach
        header("refresh:5;url=login.php");
    } else {
        // Jeśli dodawanie użytkownika nie powiedzie się, ustawienie komunikatu błędu
        $error_msg = "Błąd dodawania użytkownika: " . $connection->error;
        echo $rror_msg;
    }
}

$connection->close();
?>

