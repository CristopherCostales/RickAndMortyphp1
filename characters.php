<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Personajes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css" />
    <!-- <script src="getDataf/getDataPromise.js"></script> -->
    <script src="app.js"></script>

</head>
<header>
    <div id="header">
        <img class="logo" src="IMG/logo1.png" alt="logo" />
    </div>
</header>
<style>
    .classWithPad { margin:10px; padding:10px; }
</style>
<body>
<div class="text-center text-white">
        <p class="fs-2">Todos Los Personajes</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center flex-wrap justify-content-around">
                <?php
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://rickandmortyapi.com/api/character/?page=".$page);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    //traer a todos los personajes de la pagina 1
                    $data = json_decode($response, true);
                    $results = $data['results'];
                    foreach ($results as $result) {
                        echo "<div class='col-3 d-flex justify-content-center flex-wrap justify-content-around'>
                            <div class='card classWithPad'>
                                <img src=" . $result['image'] . " class='card-img-top'>
                                <div class='card-body text-break'>
                                    <h5 class='card-title text-break'>'" . $result['name'] . "'</h5>
                                    <p class='card-text'>Estatus: '" . $result['status'] . "'</p>
                                    <p class='card-text'>Especie: '" . $result['species'] . "'</p>
                                    <p class='card-text'>Genero: '" . $result['gender'] . "'</p>
                                </div>
                            </div>   
                        </div>";
                    }
                }

                $pages = $data['info']['pages'];
                ?>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center flex-wrap justify-content-around mt-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center flex-wrap">
                        <?php
                        for ($i = 1; $i <= $pages; $i++) {
                            echo "<li class='page-item'><a class='page-link' href='characters.php?page=" . $i . "'>" . $i . "</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
      <div class="col-12">
        <a href="index.php" class="btn btn-primary mb-4">Regresar al inicio</a>
      </div>
    </div>
  </div>
</body>

</html>