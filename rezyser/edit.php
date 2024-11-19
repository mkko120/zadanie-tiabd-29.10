<?php include_once "../session.php" ?>
<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $db = mysqli_connect('localhost', 'root', '', 'filmy');

        $query = "SELECT * FROM `rezyser` WHERE id_rezysera = '$id'";

        $req = mysqli_query($db, $query);
        if (mysqli_num_rows($req) <= 0) {
            unset($id);
        } else {

            if (isset($_GET["action"]) && $_GET["action"] == "delete") {
                $success = mysqli_query($db, "DELETE FROM `rezyser` WHERE id_rezysera = '$id'");
                if ($success) {
                    header('Location: index.php');
                    exit;
                }
            }

            if (isset($_POST["id_rezysera"])) {
                $id_rezysera = $_POST["id_rezysera"];
                $imie = $_POST["imie"];
                $nazwisko = $_POST["nazwisko"];
                $data_urodzenia = $_POST["data_urodzenia"];
                $telefon = $_POST["telefon"];
                $stmt = mysqli_prepare($db, "UPDATE rezyser SET imie = ?, nazwisko = ?, data_urodzenia = ?, telefon = ? WHERE id_rezysera = ?");
                $stmt->bind_param("ssssi", $imie, $nazwisko, $data_urodzenia, $telefon, $id_rezysera);
                if ($stmt->execute()) {
                    $success = true;
                } else {
                    $success = false;
                }
                $req = mysqli_query($db, $query);
            }
            $res = mysqli_fetch_assoc($req);

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
    <title>Edycja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/styles/core.css" />

</head>
<body>

    <div class="container container-lg">

        <?php if (!isset($id) || empty($res)): ?>
            <div>
                <h1>404</h1>
                <p>Nie znaleziono rekordu</p>
            </div>
        <?php exit; endif; ?>

        <h1>Właściwości dla: <?php echo $res["imie"]." ".$res["nazwisko"];?></h1>


        <form class="form-control my-2 py-3" method="post" action="edit.php?id=<?php echo $res["id_rezysera"];?>">

            <div class="py-1">
                <label for="id_rezysera">ID Reżysera: </label>
                <input name="id_rezysera" type="number" value="<?php echo $res["id_rezysera"];?>" readonly>
            </div>

            <br/>

            <div class="py-1">
                <label for="imie">Imię: </label>
                <input name="imie" type="text" value="<?php echo $res["imie"];?>">
            </div>

            <br/>

            <div class="py-1">
                <label for="nazwisko">Nazwisko: </label>
                <input name="nazwisko" type="text" value="<?php echo $res["nazwisko"];?>">
            </div>

            <br/>

            <div class="py-1">
                <label for="data_urodzenia">Data urodzenia: </label>
                <input name="data_urodzenia" type="date" value="<?php echo $res["data_urodzenia"];?>">
            </div>

            <br/>

            <div class="py-1">
                <label for="telefon">Telefon: </label>
                <input name="telefon" type="text" value="<?php echo $res["telefon"];?>">
            </div>

            <div class="mt-3">
                <a href="index.php"><button type="button" class="btn btn-secondary">Powrót</button> </a>
                <button class="btn btn-primary" type="submit">Zapisz</button>
                <a href="edit.php?id=<?php echo $res["id_rezysera"]; ?>&action=delete"><button type="button" class="btn btn-danger">Usuń</button></a>
            </div>
        </form>


    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>