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
    
       
         
    
        <div class="container">
            <div class="main-body">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img  id="pfpic" src="https://placehold.jp/50x50.png" alt="Błędny URL" class="rounded-circle shadow-4" width="150">
                                    <div class="mt-3">
                                        <h4>Nickname</h4>
                                    </div>
                                </div>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">URL</span>
                                    <input id="input"  type="text" class="form-control" autocomplete="off">
                                    <button id="buttonchange" type="submit" class="btn btn-primary">Zmień</button>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nickname</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="Nickname">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Opis</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="Lorem ipsum UZ dziekan dziekan">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="button" class="btn btn-primary px-4" value="Zapisz zmiany">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<script src="picChanger.js"></script>
</body>
</html>
