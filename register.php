<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rejestracja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link href="signup.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signup">
<form action="rejestracja.php" method="POST">
    <img class="mb-4" src="bootstrap-solid.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Rejestracja</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Username">
      <label for="floatingInput">Login</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="haslo" placeholder="Password">
      <label for="floatingPassword">Hasło</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingQuestion" name="pytanie" placeholder="Pytanie pomocnicze">
      <label for="floatingQuestion">Pytanie pomocnicze</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingAnswer" name="odpowiedz" placeholder="Odpowiedź">
      <label for="floatingAnswer">Odpowiedź</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Zarejestruj się</button>
    <p class="mt-5 mb-3 text-muted"> Made in 2023</p>
  </form>
</main>

  </body>
</html>
