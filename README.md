# NGR
Instrukcja dla strony multimedialnej z linkami z youtube’a pod nazwą NGRVideo.

Krok 1 Instalacja potrzebnego oprogramowania.
Do uruchomienia serwisu będzie potrzebna:
- przeglądarka internetowa (np. FireFox)
- serwer MySQL (program był testowany na serwerze MySQL dostarczony wraz z pakietem XAMPP)
- serwer HTTP (program był testowany na serwerze HTTP dostarczony wraz z pakietem XAMPP)

Krok 2 Import bazy danych MySQL:
W folderze z projektem znajduje się folder pod nazwą „baza” a w środku plik sql pod nazwą „ngrvideo.sql” który będzie potrzebny do importu bazy danych na serwer MySQL.

Przykładowa lista kroków dla importu bazy danych dla pakietu XAMPP:
1. Zalogowanie się na konto użytkownika oraz odpalenie w konsoli z użyciem mysql.exe lub poprzez tryb graficzny za pomocą programu phpMyAdmin.
2. Utworzenie nowej bazy danych pod nazwą np. „ngrvideo” ( CREATE DATABASE ngrvideo; ).
3. W nowo utworzonej bazie użyć funkcji „import” i wybrać plik „ngrvideo.sql” lub importować podczas uruchamiania „mysql.exe” ( mysql -u nazwa_użytkownika -p ngrvideo < scieżka_do_pliku\ngrvideo.sql ).

Krok 3 Konfiguracja pliku connect.php
W folderzez z projektem znajduje się plik pod nazwą „connect.php”, trzeba go otworzyć za pomocą edytora tekstowego (np. Notepad).
Po uruchomieniu w pola trzeba wpisać odpowiednie informacje potrzebne do działania strony:

$host = "x";  
W miejsce x trzeba wpisać adres źródłowy IP dla serwera MySQL (np. 127.0.0.1).
$db_user = "x";
W miejsce x trzeba wpisać nazwę użytkownika który ma dostęp do bazy danych „ngrvideo” (np. root).
$db_pass = "x";
W miejsce x trzeba wpisać hasło dla użytkownika podanego powyżej (np. haslo).
$db_name = "x";
W miejsce x trzeba wpisać nazwę bazy danych do której zostały importowane pliki z „ngrvideo.sql”  (jeżeli nazwa nie została zmieniona z instrukcji to zostawić „ngrvideo”)

Krok 4 Uruchomienie strony.
Aby uruchomić naszą stronę trzeba:
1. Uruchomić serwer MySQL.
2. Uruchomić serwer HTTP (Apache w XAMPP)
3. Przenieś wszystkie pliki znajdujące się w folderze do miejsca w którym serwer HTTP pobiera dane (w przypadku XAMPP „htdocs”)
4. Uruchomić przeglądarką w karcie prywatnej.
5. Wpisanie w adresie przeglądarki adres serwera HTTP z ścieżką do pliku „index.php” (np. http://localhost/index.php)
