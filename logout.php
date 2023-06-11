<?php
    // Rozpoczynamy sesję, aby mieć dostęp do zmiennych sesji
    session_start();
    
    // Usuwamy wszystkie zmienne sesji
    session_unset();
    
    // Przekierowujemy użytkownika na stronę główną
    header("Location:index.php");
?>
