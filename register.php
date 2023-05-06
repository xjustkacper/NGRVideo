<?php
    session_start();
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <form action="rejestracja.php" method="POST">
        Login: <br> <input type="text" name="login"> <br>
        Hasło: <br> <input type="password" name="haslo"> <br> 
        Pytanie pomocnicze: <br> <input type="text" name="pytanie"> <br>
        Odpowiedz: <br> <input type="text" name="odpowiedz"> <br><br>
        <input type="submit" value="Zarejestruj się">

    </form>
</body>
</html> 
