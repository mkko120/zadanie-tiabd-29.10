<?php include_once "../session.php" ?>
<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $db = mysqli_connect('localhost', 'root', '', 'filmy');

        $req = mysqli_query($db,"SELECT * FROM `wytwornia` WHERE id_wytworni = '$id'");
        if (mysqli_num_rows($req) <= 0) {
            unset($id);
        } else {

            if (isset($_GET["action"]) && $_GET["action"] == "delete") {
                $success = mysqli_query($db, "DELETE FROM `wytwornia` WHERE id_wytworni = '$id'");
                if ($success) {
                    header('Location: index.php');
                    exit;
                }
            }

            if (isset($_POST["id_wytworni"])) {
                $id_wytworni = $_POST["id_wytworni"];
                $Nazwa = $_POST["Nazwa"];
                $Adres = $_POST["Adres"];
                $Data_zalozenia = $_POST["Data_zalozenia"];
                $stmt = mysqli_prepare($db, "UPDATE wytwornia SET Nazwa = ?, Adres = ?, Data_zalozenia = ? WHERE id_wytworni = ? ");
                $stmt->bind_param("sssi", $Nazwa, $Adres, $Data_zalozenia, $id);
                if ($stmt->execute()) {
                    $success = true;
                } else {
                    $success = false;
                }
                $req = mysqli_query($db,"SELECT * FROM `wytwornia` WHERE id_wytworni = '$id_wytworni'");
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

        <h1>Właściwości dla: <?php echo $res["Nazwa"];?></h1>

        <?php if (isset($success)): ?>

            <div class="<?php if ($success) echo "alert alert-success"; else echo "alert alert-danger";?>">
                <h3>
                    <?php if ($success) echo "Wprowadzono dane pomyslnie"; else echo "Blad przy wprowadzaniu danych" ?>
                </h3>
            </div>

        <?php endif; ?>

        <form class="form-control my-2 py-3" method="post" action="edit.php?id=<?php echo $res["id_wytworni"];?>">

            <div class="py-1">
                <label for="id_wytworni">id_wytworni: </label>
                <input name="id_wytworni" type="number" value="<?php echo $res["id_wytworni"];?>" readonly>
            </div>

            <br/>

            <div class="py-1">
                <label for="Nazwa">Nazwa: </label>
                <input name="Nazwa" type="text" value="<?php echo $res["Nazwa"];?>">
            </div>

            <br/>

            <div class="py-1">
                <label for="Adres">Adres: </label>
                <input name="Adres" type="text" value="<?php echo $res["Adres"];?>">
            </div>

            <br/>

            <div class="py-1">
                <label for="Data_zalozenia">Data założenia: </label>
                <input name="Data_zalozenia" type="date" value="<?php echo $res["Data_zalozenia"];?>">
            </div>

            <div class="mt-3">
                <a href="index.php"><button type="button" class="btn btn-secondary">Powrót</button> </a>
                <button class="btn btn-primary" type="submit">Zapisz</button>
                <a href="edit.php?id=<?php echo $res["id_wytworni"]; ?>&action=delete"><button type="button" class="btn btn-danger">Usuń</button></a>
            </div>
        </form>


    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>