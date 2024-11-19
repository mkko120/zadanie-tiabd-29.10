<?php include_once "../session.php" ?>
<?php

if (isset($_POST["Nazwa"]) && isset($_POST["Adres"]) && isset($_POST["Data_zalozenia"])) {

    $db = mysqli_connect('localhost', 'root', '', 'filmy');

    $Nazwa = $_POST["Nazwa"];
    $Adres = $_POST["Adres"];
    $Data_zalozenia = $_POST["Data_zalozenia"];
    $stmt = mysqli_prepare($db, "INSERT INTO wytwornia (Nazwa, Adres, Data_zalozenia) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $Nazwa, $Adres, $Data_zalozenia);
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        $success = false;
    }
    mysqli_close($db);
}

?>


<!doctype html>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tworzenie</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/styles/core.css" />

</head>
<body>

<div class="container container-lg">

    <h1>Nowy rekord</h1>


    <form class="form-control my-2 py-3" method="post" action="new.php">

        <div class="py-1">
            <label for="Nazwa">Nazwa: </label>
            <input name="Nazwa" type="text">
        </div>

        <br/>

        <div class="py-1">
            <label for="Adres">Adres: </label>
            <input name="Adres" type="text">
        </div>

        <br/>

        <div class="py-1">
            <label for="Data_zalozenia">Data założenia: </label>
            <input name="Data_zalozenia" type="date">
        </div>

        <div class="mt-3">
            <a href="index.php"><button type="button" class="btn btn-secondary">Powrót</button> </a>
            <button class="btn btn-primary" type="submit">Zapisz</button>
        </div>
    </form>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>