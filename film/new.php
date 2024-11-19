<?php include_once "../session.php" ?>
<?php

if (isset($_POST["tytul"]) && isset($_POST["data_produkcji"]) && isset($_POST["budzet"]) && isset($_POST["id_rezysera"]) ) {

    $db = mysqli_connect('localhost', 'root', '', 'filmy');

    $tytul = $_POST["tytul"];
    $data_produkcji  = $_POST["data_produkcji"];
    $budzet = $_POST["budzet"];
    $id_rezysera = $_POST["id_rezysera"];
    $stmt = mysqli_prepare($db, "INSERT INTO film (tytul, data_produkcji, budzet, id_rezysera) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $tytul, $data_produkcji, $budzet, $id_rezysera);
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
            <label for="tytul">Tytuł: </label>
            <input name="tytul" type="text">
        </div>

        <br/>

        <div class="py-1">
            <label for="data_produkcji">Data produkcji: </label>
            <input name="data_produkcji" type="date">
        </div>

        <br/>

        <div class="py-1">
            <label for="budzet">Budżet: </label>
            <input name="budzet" type="number">
        </div>

        <br/>

        <div class="py-1">
            <label for="id_rezysera">Reżyser: </label>
            <select name="id_rezysera">
                <?php
                    $db = mysqli_connect('localhost', 'root', '', 'filmy');
                    $req = mysqli_query($db, "SELECT id_rezysera, imie, nazwisko FROM rezyser");

                    while ($row = mysqli_fetch_array($req)): ?>
                    <option value="<?php echo $row['id_rezysera']?>"><?php echo $row["imie"]." ".$row['nazwisko']?></option>

                <?php endwhile;?>
            </select>
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