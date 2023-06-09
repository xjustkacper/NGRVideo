<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', 'Off');
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION["error"]) && $_SESSION["error"] === true) {
    $error = '<div class="alert alert-danger mt-3" role="alert"><strong>Nieprawidłowy login lub hasło!</strong></div>';
    $_SESSION["error"] = false;
} 

?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
<form action="zaloguj.php" method="POST">
    <img class="mb-4" src="bootstrap-solid.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Logowanie</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Username">
      <label for="floatingInput">Login</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="haslo" placeholder="Password">
      <label for="floatingPassword">Hasło</label>
    </div>
    <?php
     echo $error;
      ?>
      <a href="recover.php">Zapomniałem hasła</a>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Zaloguj się</button>
    
    <p class="mt-5 mb-3 text-muted"> Made in 2023</p>
  </form>
</main>

  </body>
</html>
