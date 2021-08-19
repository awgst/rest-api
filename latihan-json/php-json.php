<?php
  $data = file_get_contents('pizza.json');
  $menus = json_decode($data);
  $menus = $menus->menu;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Latihan JSON</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" style="width: 120px;">
          </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">All Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pizza</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pasta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Nasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Minuman</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        <div class="row">
          <?php foreach ($menus as $menu) { ?>
            <div class="col-md-4">
                <div class="card mb-3" style="width: 18rem;">
                    <img src="img/pizza/<?= $menu->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?= $menu->nama ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Rp. <?= $menu->harga ?></h6>
                      <p class="card-text"><?= $menu->deskripsi ?></p>
                      <a href="#" class="btn btn-primary">Pesan</a>
                    </div>
                  </div>
            </div>
          <?php } ?>
        </div>
    </div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>