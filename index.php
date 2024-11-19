<?php include_once "session.php" ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/styles/core.css" />

</head>
<body>
    
    <div class="container container-lg">

        <header>
            <h1>Baza danych Filmy</h1>
        </header>

        <main class="my-2 container">
            
            <nav class="w-50 gy-5">
                <div class="row justify-content-center">
                    <div class="col">
                        <a href="/wytwornia">
                            <button type="button" class="btn btn-lg btn-primary">Wytwórnia</button>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/film">
                            <button type="button" class="btn btn-lg btn-primary">Film</button>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <a href="/aktor">
                            <button type="button" class="btn btn-lg btn-primary">Aktor</button>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/rezyser">
                            <button type="button" class="btn btn-lg btn-primary">Rezyser</button>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <a href="/wyt_film">
                            <button type="button" class="btn btn-lg btn-primary">wyt_film</button>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/raporty/a.php">
                            <button type="button" class="btn btn-lg btn-primary">Raport A</button>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <a href="/raporty/b.php">
                            <button type="button" class="btn btn-lg btn-primary">Raport B</button>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/logout.php">
                            <button type="button" class="btn btn-lg btn-danger">Wyloguj</button>
                        </a>
                    </div>
                </div>
            </nav>

        </main>


    </div>   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>