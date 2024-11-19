<?php include_once "../session.php" ?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Film</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/styles/core.css" />

</head>
<body>

    <div class="container container-lg">

        <h1>Tabela film</h1>


        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID Filmu</th>
                    <th>Tytuł</th>
                    <th>Data produkcji</th>
                    <th>Budżet</th>
                    <th>Reżyser</th>
                    <th>Akcja</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $db = mysqli_connect("localhost", "root", "", "filmy");

                $result = mysqli_query($db, "SELECT * FROM film left outer join filmy.rezyser r on r.id_rezysera = film.id_rezysera");

                while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row["id_filmu"] ?></td>
                        <td><?php echo $row["tytul"] ?></td>
                        <td><?php echo $row["data_produkcji"] ?></td>
                        <td><?php echo $row["budzet"] ?></td>
                        <td><?php echo $row["imie"]." ".$row["nazwisko"] ?></td>
                        <td><a href="edit.php?id=<?php echo $row["id_filmu"]; ?>"><button class="btn btn-primary">Szczegóły</button> </a></td>
                    </tr>
                <?php endwhile;

                mysqli_close($db);

                ?>

            </tbody>

        </table>

        <a href="new.php"><button class="btn btn-lg btn-success mb-3">Dodaj nowy rekord</button></a>

    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>