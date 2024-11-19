<?php include_once "../session.php" ?>
<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $db = mysqli_connect('localhost', 'root', '', 'filmy');

        $query = "SELECT * FROM `film` WHERE id_filmu = '$id'";

        $req = mysqli_query($db, $query);
        if (mysqli_num_rows($req) <= 0) {
            unset($id);
        } else {

            if (isset($_GET["action"]) && $_GET["action"] == "delete") {
                $success = mysqli_query($db, "DELETE FROM `film` WHERE id_filmu = '$id'");
                if ($success) {
                    header('Location: index.php');
                    exit;
                }
            }

            if (isset($_POST["id_filmu"])) {
                $id_filmu = $_POST["id_filmu"];
                $tytul = $_POST["tytul"];
                $data_produkcji  = $_POST["data_produkcji"];
                $budzet = $_POST["budzet"];
                $id_rezysera = $_POST["id_rezysera"];
                $stmt = mysqli_prepare($db, "UPDATE film SET tytul = ?, data_produkcji = ?, budzet = ?, id_rezysera = ? WHERE id_filmu = ?");
                $stmt->bind_param("ssiii", $tytul, $data_produkcji, $budzet, $id_rezysera, $id_filmu);
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

        <h1>Właściwości dla: <?php echo $res["tytul"];?></h1>

        <?php if (isset($success)): ?>

            <div class="<?php if ($success) echo "alert alert-success"; else echo "alert alert-danger";?>">
                <h3>
                    <?php if ($success) echo "Wprowadzono dane pomyslnie"; else echo "Blad przy wprowadzaniu danych" ?>
                </h3>
            </div>

        <?php endif; ?>


        <form class="form-control my-2 py-3" method="post" action="edit.php?id=<?php echo $res["id_filmu"];?>">

            <div class="py-1">
                <label for="id_filmu">ID Filmu: </label>
                <input name="id_filmu" type="number" value="<?php echo $res["id_filmu"];?>" readonly>
            </div>

            <br/>

            <div class="py-1">
                <label for="tytul">Tytuł: </label>
                <input name="tytul" type="text" value="<?php echo $res["tytul"];?>">
            </div>

            <br/>

            <div class="py-1">
                <label for="data_produkcji">Data produkcji: </label>
                <input name="data_produkcji" type="date" value="<?php echo $res["data_produkcji"];?>">
            </div>

            <br/>

            <div class="py-1">
                <label for="budzet">Budżet: </label>
                <input name="budzet" type="number" value="<?php echo $res["budzet"];?>">
            </div>

            <br/>

            <div class="py-1">
                <label for="id_rezysera">Rezyser: </label>
                <select name="id_rezysera">
                    <?php

                    $db = mysqli_connect('localhost', 'root', '', 'filmy');
                    $query = "SELECT id_rezysera, imie, nazwisko FROM rezyser";

                    $req = mysqli_query($db, $query);

                    if (mysqli_num_rows($req) <= 0) {
                        die(500);
                    }

                    while ($row = mysqli_fetch_assoc($req)): ?>

                    <option <?php if ($row["id_rezysera"] == $res["id_rezysera"]) echo "selected"?> value="<?php echo $row["id_rezysera"]?>"><?php echo $row["imie"]." ".$row["nazwisko"] ?></option>

                    <?php endwhile;
                    mysqli_close($db);
                    ?>
                </select>
            </div>

            <div class="mt-3">
                <a href="index.php"><button type="button" class="btn btn-secondary">Powrót</button> </a>
                <button class="btn btn-primary" type="submit">Zapisz</button>
                <a href="edit.php?id=<?php echo $res["id_filmu"]; ?>&action=delete"><button type="button" class="btn btn-danger">Usuń</button></a>
            </div>
        </form>


    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>