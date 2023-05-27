<?php
   session_start();
   require_once "connect.php";
   if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
     header("Location: index.php");
     exit;
   }
   $connection = @new mysqli($host, $db_user, $db_pass, $db_name);
   
   $sql = "SELECT U.idUzytkownicy AS idUzytkownik, U.login, P.DataRejestracji, P.url_profilowe, P.opis 
           FROM Uzytkownicy U 
           INNER JOIN ProfilUzytkownika P ON U.idUzytkownicy = P.idUzytkownik 
           WHERE U.login = '".$_SESSION["login"]."';";
   
   if($result = @$connection->query($sql)) {
     $hm_usr = $result->num_rows;
   
     if($hm_usr > 0) {
       $row = $result->fetch_assoc();
   
       $data_rejestracji = date("Y-m-d", strtotime($row["DataRejestracji"])); 
   
       $data["data_rejestracji"] = $data_rejestracji; 
   
       $result->close();
     }
     else {
       echo "Błąd! Nie znaleziono użytkownika.";
     }
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
      <link rel="stylesheet" href="stars.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/730c223759.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
         <div class="container-fluid">
            <div class="d-flex align-items-center">
               <a class="navbar-brand" href="#">NGRVideo</a>
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link" href="#">Baza filmów</a>
                  </li>
               </ul>
               <form class="d-flex mx-3" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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
                     	echo '<li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>';
                             echo '<li class="nav-item"><a class="nav-link" href="logout.php">Wyloguj się</a></li>';
                     
                     }
                     ?>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container">
         <div class="main-body pt-5">
            <div class="card">
               <div class="card-body">
                  <div class="row gutters-sm mt-5">
                     <div class="col-md-4 mb-3">
                        <div class="d-flex flex-column align-items-center text-center">
                           <img src="https://placehold.jp/50x50.png" alt="Admin" class="rounded" width="300">
                           <h4>
                              <?php
                                 echo $_SESSION["login"];
                                 ?>
                           </h4>
                           <div class="mt-3">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-8">
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Tytuł:</h6>
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
                                    <h6 class="mb-0">Gatunek:</h6>
                                 </div>
                                 <div class="col-sm-9 text-secondary">   
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Opis:</h6>
                                 </div>
                                 <div class="col-sm-9 text-secondary">
                                    <?php 
                                       echo $data["data_rejestracji"]; 
                                       ?>
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Ocena:</h6>
                                 </div>
                                 <div class="col-sm-9 text-secondary">
                                    <div class="rating">
                                       <i class="fa-regular fa-circle-xmark"></i>
                                       <i class="rating__star far fa-star"></i>
                                       <i class="rating__star far fa-star"></i>
                                       <i class="rating__star far fa-star"></i>
                                       <i class="rating__star far fa-star"></i>
                                       <i class="rating__star far fa-star"></i>
                                       <i id="ocena">Brak</i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row justify-content-center mt-5">
                        <div class="col-md-auto">
                           <iframe width="636" height="500" src="https://www.youtube.com/embed/zokvi67Yko0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
        <div class="container my-5 py-5 text-dark">
          <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8">
              <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex flex-start w-100">
                    <img class="rounded-circle shadow-1-strong me-3"
                      src="https://placehold.jp/50x50.png" alt="avatar" width="65"
                      height="65" />
                    <div class="w-100">
                      <h5>Dodaj komentarz</h5>
                      <div class="form-outline">
                        <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                      </div>
                      <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-danger">
                          Wyślij <i class="fas fa-long-arrow-alt-right ms-1"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      <script src="rating.js"></script>
   </body>
</html>
