<?php

session_start();

$explogin = "admin";
$exppassword = "zst";


if (isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    if ($_POST["username"] == $explogin && $_POST["password"] == $exppassword) {
        $_SESSION['zalogowany'] = true;
        header('Location: index.php');
    } else {
        $error = "Nieprawidlowy login lub haslo";
    }
}
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edycja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/styles/core.css" />

</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw;">
    <div class="card d-flex flex-column" style="width: 350px;">
        <form action="login.php" method="post">
            <div class="card-header">
                <h1>Logowanie</h1>
            </div>
            <div class="card-body m-auto">
                <div class="my-1 w-100 d-flex flex-column">
                    <label for="username">Nazwa użytkownika: </label>
                    <input name="username" />
                </div>
                <div class="my-1 w-100 d-flex flex-column">
                    <label for="password">Hasło:</label>
                    <input name="password" type="password">
                </div>
                <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="card-footer d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-primary">Zaloguj się</button>
            </div>
        </form>
    </div>
</div>


</body>
</html>