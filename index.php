<?php
  session_start();
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
    <style> /*DODAC POTEM DO CSS */
.top{
  text-align: center;
}
.recent
{
  text-align: center;
}
.ad {
  text-align: center;
  
  bottom: 0px;
}
</style>

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
<div class="top" >
  
<a>TOP 10 <br /></a>
  <button id="p2" style="display:none;"> < </button>
  <img src="https://placehold.jp/216x320.png" alt="movie"> <!--Rozmiar plakatu 2592x3840 :12 216x320 w pikselach-->
  <img src="https://placehold.jp/216x320.png" alt="movie">
  <img src="https://placehold.jp/216x320.png" alt="movie">
  <img src="https://placehold.jp/216x320.png" alt="movie">
  <img src="https://placehold.jp/216x320.png" alt="movie">
  <button id="p1" style="display:;"> > </button>
          </div>
          <div class="recent" >
<a>NAJNOWSZE <br /></a>
<button id="p4" style="display:none;"> < </button>
  <img src="https://placehold.jp/216x320.png" alt="movie"> 
  <img src="https://placehold.jp/216x320.png" alt="movie">
  <img src="https://placehold.jp/216x320.png" alt="movie">
  <img src="https://placehold.jp/216x320.png" alt="movie">
  <img src="https://placehold.jp/216x320.png" alt="movie">
  <button id="p3" style="display:;"> > </button>
        </div>
        <script> // skrypt w js do przyciskow
 var a = 0;
  var p1 = document.getElementById("p1");
  var p2 = document.getElementById("p2");
  var p3 = document.getElementById("p3");
  var p4 = document.getElementById("p4");

p1.addEventListener("click", function() {
  p1.style.display = "none";
  p2.style.display = "";
});

p2.addEventListener("click", function() {
  p2.style.display = "none";
  p1.style.display = "";
});
p3.addEventListener("click", function() {
  p4.style.display = "";
  a++;
});

p4.addEventListener("click", function() {
  a--;
  if (a===0){
  p4.style.display = "none";
  }
  
});
</script>
<div class="ad">
  <br />
    <img src="https://placehold.jp/800x180.png" alt="Reklama">
    
  
</div>



</body>
</html>
