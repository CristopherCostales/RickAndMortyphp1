<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio</title>

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

<body>

  <div class="divfather">
    <div class="container">
      <div class="listt">
        <h2>Menu</h2>
      </div>
      <div class="menu">
        <div class="card" style="width: 18rem">
          <div class="card-body">
            <h5 class="card-title">Episodios y Personajes</h5>
            <p class="card-text">
              <a href="episodes.php?page=1"><button type="button" class="btn btn-primary">Episodios</button></a>
              <a href="characters.php?page=1"><button type="button" class="btn btn-primary">Personajes</button></a>

            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="listt">
        <h2>Personajes</h2>
      </div>
      
      <div class="row">
        <?php
        
        $url = "https://rickandmortyapi.com/api/episode/1";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        $characters = $data['characters'];


        foreach ($characters as $character) {
          $json = file_get_contents($character);
          $data = json_decode($json, true);
          $name = $data['name'];
          $image = $data['image'];
          $status = $data['status'];
          $species = $data['species'];
          $gender = $data['gender'];
          $i=0;
          if ($i++ > 9) break;
          

          

          echo "<div class='col-8 offset-2'> 
                        <div class='card'> 
                            <img src='$image' class='card-img-top' alt='Imagen de $name'> 
                            <div class='card-body'> 
                                <h5 class='card-title'>$name</h5> 
                                <p class='card-text'>Estatus: $status</p> 
                                <p class='card-text'>Especie: $species</p> 
                                <p class='card-text'>Genero: $gender</p> 
                            </div> 
                        </div> 
                </div>";

        }
      
        ?>
      </div>
    </div>

    <div class="text-center">
      <p class="fs-2 text-white">Personajes Aleatorios</p>
    

    <div class="container">
      <div class="row">
        <?php
        $url = "https://rickandmortyapi.com/api/character";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        $results = $data['results'];
        $characters = array_rand($results, 3);

        foreach ($characters as $character) {
          $name = $results[$character]['name'];
          $image = $results[$character]['image'];
          $status = $results[$character]['status'];
          $species = $results[$character]['species'];
          $gender = $results[$character]['gender'];

          echo "<div class='col-8 offset-2'> 
                                <div class='card mb-3'> 
                                    <img src='$image' class='card-img-top' alt='Imagen de $name'> 
                                    <div class='card-body'> 
                                        <h5 class='card-title'>$name</h5> 
                                        <p class='card-text'>Estatus: $status</p> 
                                        <p class='card-text'>Especie: $species</p> 
                                        <p class='card-text'>Genero: $gender</p> 
                                    </div> 
                                </div> 
                            </div> <hr>";
        }
        ?>
        </div>
    </div>
      </div>
    </div>
</body>

</html>