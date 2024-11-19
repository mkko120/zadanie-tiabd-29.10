<?php include_once "../session.php" ?>
<?php

if (isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["data_urodzenia"]) && isset($_POST["telefon"]) ) {

    $db = mysqli_connect('localhost', 'root', '', 'filmy');

    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $data_urodzenia = $_POST["data_urodzenia"];
    $telefon = $_POST["telefon"];
    $stmt = mysqli_prepare($db, "INSERT INTO rezyser (imie, nazwisko, data_urodzenia, telefon) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $imie, $nazwisko, $data_urodzenia, $telefon);
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
            <label for="imie">Imię: </label>
            <input name="imie" type="text">
        </div>

        <br/>

        <div class="py-1">
            <label for="nazwisko">Nazwisko: </label>
            <input name="nazwisko" type="text">
        </div>

        <br/>

        <div class="py-1">
            <label for="data_urodzenia">Data urodzenia: </label>
            <input name="data_urodzenia" type="date">
        </div>

        <br/>

        <div class="py-1">
            <label for="telefon">Nr. Telefonu: </label>
            <input name="telefon" type="text">
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