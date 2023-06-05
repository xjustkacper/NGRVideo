<?php
session_start();
require_once "connect.php";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

$search = strtolower(preg_replace('/\s+/', '', $conn->real_escape_string($_POST["search"])));
$sql = "SELECT Filmy.*, Kategorie.Nazwa AS kategoria,Filmy.idFilmy 
        FROM Filmy
        JOIN Kategorie ON Filmy.idKategoria = Kategorie.idKategorie
        WHERE LOWER(REPLACE(Tytul, ' ', '')) LIKE '%$search%'";

$stmt = $conn->prepare($sql);
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
    <?php 
    if (count($filmy) > 0) {
        foreach ($filmy as $film): ?>
            <div class="col-md-3">
    <div class="card mb-3">
        <a href="moviepage.php?id=<?php echo $film['idFilmy']; ?>">
            <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="...">
        </a>
        <div class="card-body">
            <h5 class="card-title"><?php echo $film['Tytul']; ?></h5>
            <p class="card-text"><?php echo $film['Jezyk']; ?>, <?php echo $film['rokprodukcji']; ?></p>
        </div>
    </div>
</div>
        <?php endforeach;
    } else {
        echo '<p>Brak wyników dla "' . $_POST["search"] . '"</p>';
    } 
    ?>
</div>
</div>
</div>
</div>
</body>
</html>
