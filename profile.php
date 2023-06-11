<?php
session_start();
require_once "connect.php";

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("Location: index.php");
  exit;
}

// Nawiązanie połączenia z bazą danych na podstawie danych z pliku connect.php
$connection = @new mysqli($host, $db_user, $db_pass, $db_name);

// Pobranie loginu użytkownika z sesji
$userLogin = $_SESSION['login'];

// Pobranie danych użytkownika z bazy danych
$sql = "SELECT U.idUzytkownicy AS idUzytkownik, U.login, P.DataRejestracji, P.url_profilowe, P.opis 
        FROM Uzytkownicy U 
        INNER JOIN ProfilUzytkownika P ON U.idUzytkownicy = P.idUzytkownik 
        WHERE U.login = '".$_SESSION["login"]."';";

if($result = @$connection->query($sql)) {
  $hm_usr = $result->num_rows;

  if($hm_usr > 0) {
    $row = $result->fetch_assoc();

    // Przetworzenie daty rejestracji na format RRRR-MM-DD
    $data_rejestracji = date("Y-m-d", strtotime($row["DataRejestracji"])); 

    // Dodanie daty rejestracji do tablicy danych
    $data["data_rejestracji"] = $data_rejestracji; 

    // Dodanie URL obrazu profilowego i opisu do tablicy danych
    $data["url_profilowe"] = $row["url_profilowe"];
    $data["opis"] = $row["opis"];

    $result->close();
  }
  else {
    echo "Błąd! Nie znaleziono użytkownika.";
  }
}

// Pobranie identyfikatora profilu użytkownika na podstawie loginu
$stmt = $connection->prepare("SELECT idProfilUzytkownika FROM ProfilUzytkownika INNER JOIN uzytkownicy ON ProfilUzytkownika.idUzytkownik = uzytkownicy.idUzytkownicy WHERE login = ?");
$stmt->bind_param("s", $userLogin);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$userId = $row['idProfilUzytkownika'];

// Pobranie danych filmów ocenianych przez użytkownika z bazy danych
$sqltabela = "SELECT f.idFilmy AS idFilmu, o.idProfilUzytkownika AS idProfiluUzytkownika, f.Tytul AS nazwaFilmu, CASE WHEN uf.idFilmy IS NULL THEN 'NIE' ELSE 'TAK' END AS CzyUlubione, o.LiczbaGwiazdek AS iloscGwiazdek FROM filmy f JOIN oceny o ON f.idFilmy = o.idFilmy LEFT JOIN ulubionefilmy uf ON f.idFilmy = uf.idFilmy AND o.idProfilUzytkownika = uf.idProfilUzytkownika WHERE o.idProfilUzytkownika = ".$userId.";";

if($result = @$connection->query($sqltabela)) {
  $filmy = [];
  while($row = $result->fetch_assoc()) {
    $filmy[] = $row;
  }
  $result->close();
}

$connection->close();
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
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm mt-5">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo $data["url_profilowe"]; ?>" alt="Admin" class="rounded-circle shadow-4" width="150">
                    <h4>
                      <?php
                      echo $_SESSION["login"];
                      ?>
                    </h4>
                    <div class="mt-3">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nickname</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                      echo $_SESSION["login"];
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Opis</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $data["opis"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Data dołączenia</h6>
                    </div>
                    <div class="col-sm-9 text-secondary pb-4">
                 <?php 
                 echo $data["data_rejestracji"]; 
                 ?>
                    </div>
                    <hr>
                <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-primary" target="__blank" href="update.php">Edytuj</a>
                    </div>
                </div>
                  </div>
                  </div>
                </div>
              </div>
              <h5>Lista ocenionych filmów</h5>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">ID filmu</th>
      <th scope="col">Nazwa filmu</th>
      <th scope="col">Czy ulubiony?</th>
      <th scope="col">Ilość gwiazdek</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($filmy as $film): ?>
    <tr>
      <th scope="row"><?php echo $film["idFilmu"]; ?></th>
      <td><a href="moviepage.php?id=<?php echo $film["idFilmu"]; ?>"><?php echo $film["nazwaFilmu"]; ?></a></td>
      <td><?php echo $film["CzyUlubione"]; ?></td>
      <td><?php echo $film["iloscGwiazdek"]; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
            </div>
          </div>
        </div>
    </div>

</body>
</html>
