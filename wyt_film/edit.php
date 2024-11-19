<?php include_once "../session.php" ?>
<?php

    if (isset($_GET['id1']) && isset($_GET['id2'])) {
        $id1 = $_GET['id1'];
        $id2 = $_GET['id2'];

        $db = mysqli_connect('localhost', 'root', '', 'filmy');

        $query = "select * from wyt_film where id_filmu = '$id1' &&  id_wytworni = '$id2'";

        $req = mysqli_query($db, $query);
        if (mysqli_num_rows($req) <= 0) {
            unset($id1);
            unset($id2);
        } else {

            if (isset($_GET["action"]) && $_GET["action"] == "delete") {
                $success = mysqli_query($db, "DELETE FROM `wyt_film` WHERE id_filmu = '$id1' && id_wytworni = '$id2'");
                if ($success) {
                    header('Location: index.php');
                    exit;
                }
            }

            if (isset($_POST["id_filmu"]) && isset($_POST["id_wytworni"])) {
                $id_filmu = $_POST["id_filmu"];
                $id_wytworni = $_POST["id_wytworni"];
                $stmt = mysqli_prepare($db, "UPDATE wyt_film SET id_filmu = ?, id_wytworni = ? WHERE id_filmu = ? && id_wytworni = ?");
                $stmt->bind_param("iiii", $id_filmu, $id_wytworni, $id1, $id2);
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

        <?php if (!isset($id1) || !isset($id2) || empty($res)): ?>
            <div>
                <h1>404</h1>
                <p>Nie znaleziono rekordu</p>
            </div>
        <?php exit; endif; ?>

        <h1>Właściwości dla: <?php echo $res["tytul"];?></h1>


        <form class="form-control my-2 py-3" method="post" action="edit.php?id=<?php echo $res["id_filmu"];?>">

            <div class="py-1">
                <label for="id_filmu">Film: </label>
                <select name="id_filmu">
                    <?php
                    $db = mysqli_connect('localhost', 'root', '', 'filmy');
                    $query = "SELECT id_filmu, tytul FROM `film`";

                    $req = mysqli_query($db, $query);

                    while ($film = mysqli_fetch_assoc($req)): ?>
                        <option <?php if ($film['id_filmu'] == $id1) echo "selected"; ?> value="<?php echo $film['id_filmu'];?>">
                            <?php echo $film['tytul'];?>
                        </option>
                    <?php endwhile; mysqli_close($db); ?>
                </select>
            </div>

            <br/>

            <div class="py-1">
                <label for="id_wytworni">Wytwornia: </label>
                <select name="id_wytworni">
                    <?php
                    $db = mysqli_connect('localhost', 'root', '', 'filmy');
                    $query = "SELECT id_wytworni, Nazwa FROM `wytwornia`";

                    $req = mysqli_query($db, $query);

                    while ($wyt = mysqli_fetch_assoc($req)): ?>
                        <option <?php if ($wyt['id_wytworni'] == $id2) echo "selected"; ?> value="<?php echo $wyt['id_wytworni'];?>">
                            <?php echo $wyt['Nazwa'];?>
                        </option>
                    <?php endwhile; mysqli_close($db); ?>
                </select>
            </div>

            <div class="mt-3">
                <a href="index.php"><button type="button" class="btn btn-secondary">Powrót</button> </a>
                <button class="btn btn-primary" type="submit">Zapisz</button>
                <a href="edit.php?id=<?php echo $res["id_filmu"]; ?>&id2=<?php echo $res["id_wytworni"]?>&action=delete"><button type="button" class="btn btn-danger">Usuń</button></a>
            </div>
        </form>


    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>