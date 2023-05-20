<?php
session_start();
require_once "connect.php"; // Plik z danymi do połączenia z bazą danych

if (isset($_GET['kategoria'])) {
    $kategoria = $_GET['kategoria'];
} else {
    $kategoria = 'all';
}

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($kategoria !== 'all') {
    $sql = "SELECT Filmy.*, Kategorie.Nazwa AS kategoria 
            FROM Filmy
            JOIN Kategorie ON Filmy.idKategoria = Kategorie.idKategorie
            WHERE Kategorie.Nazwa = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kategoria);
} else {
    $sql = "SELECT Filmy.*, Kategorie.Nazwa AS kategoria 
            FROM Filmy
            JOIN Kategorie ON Filmy.idKategoria = Kategorie.idKategorie"; 
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

$filmy = [];
while ($row = $result->fetch_assoc()) {
    $filmy[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGRVideo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <div class="d-flex align-items-center">
      <a class="navbar-brand" href="index.php">NGRVideo</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="datamovies.php">Baza filmów</a>
        </li>
      </ul>
      <form class="d-flex mx-3" action="search.php" method="POST" role="search">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
          <?php
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
              echo '<li class="navbar-text">Witaj, niezalogowany</li>';
              echo '<li class="nav-item"><a class="nav-link" href="login.php">Logowanie</a></li>';
              echo '<li class="nav-item"><a class="nav-link" href="register.php">Rejestracja</a></li>';
          } 
          else {
              echo '<li class="navbar-text">Witaj, '.$_SESSION["login"].'</li>';
              echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profil</a></li>';
              echo '<li class="nav-item"><a class="nav-link" href="logout.php">Wyloguj się</a></li>';
          }
          ?>
          </ul>
          </div>
          </div>
          </nav>
          
          <div class="container mt-5">
          <div class="row">
          <div class="col-md-3">
          <div class="list-group">
          <a class="list-group-item list-group-item-action active" aria-current="true">Kategorie filmów</a>
          <a href="?kategoria=all" class="list-group-item list-group-item-action">Wszystkie filmy</a>
          <a href="?kategoria=Akcja" class="list-group-item list-group-item-action">Akcja</a>
          <a href="?kategoria=Kryminał" class="list-group-item list-group-item-action">Kryminał</a>
          <a href="?kategoria=Dramat" class="list-group-item list-group-item-action">Dramat</a>
          <a href="?kategoria=Komedia" class="list-group-item list-group-item-action">Komedia</a>
          <a href="?kategoria=Przygodowy" class="list-group-item list-group-item-action">Przygodowy</a>
          <a href="?kategoria=Romans" class="list-group-item list-group-item-action">Romans</a>
          <a href="?kategoria=Sci-Fi" class="list-group-item list-group-item-action">Sci-Fi</a>
          <a href="?kategoria=Thriller" class="list-group-item list-group-item-action">Thriller</a>
          </div>
          </div>
          <div class="col-md-9">
          <div class="row">
          <?php foreach ($filmy as $film): ?>
          <div class="col-md-4">
          <div class="card mb-4">
          <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="...">
          <div class="card-body">
          <h5 class="card-title"><?php echo $film['Tytul']; ?></h5>
          <p class="card-text"><?php echo $film['Jezyk']; ?>, <?php echo $film['rokprodukcji']; ?></p>
          </div>
          </div>
          </div>
          <?php endforeach; ?>
          </div>
          </div>
          </div>
          </div>
          </body>
          </html>
          
