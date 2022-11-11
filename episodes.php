<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Episodios</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css" />
  <script src="app.js"></script>
</head>
<header>
  <div id="header">
    <img class="logo" src="IMG/logo1.png" alt="logo" />
  </div>
</header>

<body>
<div class="container">
    <ul class="pagination justify-content-center mt-4">
      <?php
      $url = "https://rickandmortyapi.com/api/episode";
      $json = file_get_contents($url);
      $data = json_decode($json, true);
      $pages = $data['info']['pages'];
      for ($i = 1; $i <= $pages; $i++) {
        echo "<li class='page-item'><a class='page-link' href='episodes.php?page=$i'>$i</a></li>";
      }
      
      ?>
      </ul>
  </div>
  <div class="container">
    <div class="row">
  <?php
  
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $url = "https://rickandmortyapi.com/api/episode/?page=$page";
    $json = file_get_contents($url);
    $data = json_decode($json, true);
    $results = $data['results'];
    foreach ($results as $result) {
      $name = $result['name'];
      $episode = $result['episode'];
      $air_date = $result['air_date'];
      $url = $result['url'];
      $created = $result['created'];
      echo "<div class='col-12 col-md-6 col-lg-4 col-xl-3 mt-5'> 
                    <div class='card mb-3'> 
                            <div class='card-body'> 
                                <h5 class='card-title'>$name</h5>
                                <p class='card-text'>Episode: $episode</p>
                                <p class='card-text'>Air date: $air_date</p>
                                <p class='card-text'>Url: $url</p>
                                <p class='card-text'>Created: $created</p>

                            </div>
                        </div>
                    </div>";
    }
  }
  ?>
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