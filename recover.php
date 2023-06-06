<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    unset($_SESSION["error"]);
} else {
    $error = "";
}
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Odzyskiwanie hasła</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link href="recover.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-recover">
  <form action="passrecovery.php" method="POST" enctype="multipart/form-data">
    <img class="mb-4" src="bootstrap-solid.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Odzyskiwanie hasła</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Username">
      <label for="floatingInput">Login</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingQuestion" name="question" placeholder="Pytanie pomocnicze">
      <label for="floatingQuestion">Pytanie pomocnicze</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingAnswer" name="answer" placeholder="Odpowiedź">
      <label for="floatingAnswer">Odpowiedź</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingNewPassword" name="new_password" placeholder="Nowe hasło">
      <label for="floatingNewPassword">Nowe hasło</label>
    </div>
    <?php
    if (!empty($error)) {
        echo '<div class="alert alert-danger mt-3" role="alert"><strong>Błędne dane!</strong></div>';
    }
    ?>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Zmień hasło</button>
    <p class="mt-5 mb-3 text-muted"> Made in 2023</p>
  </form>
</main>

  </body>
</html>
