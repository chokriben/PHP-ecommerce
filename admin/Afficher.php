<?php
session_start();
if(!isset($_SESSION['zWu123'])){
  header("location: ../login.php");
}
if(empty($_SESSION['zWu123'])){
  header("location: ../login.php");
}
require("../Config/commandes.php");
$Produits = afficher();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>TOUS LES PRODUITS</title>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Monoshop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../admin/">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Suppression</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Afficher.php"  style="font-weight: blod;">Produits</a>
        </li>
      </ul>
      <div style="display: flex; justify-content: flex-end;">
      <a class="btn btn-danger" href="deconnexion.php">Se deconnecter</a>
      </div>
    </div>
  </div>
</nav>
 <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Description</th>
      <th scope="col">Editer</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Produits as $Produit): ?>
    <tr>
      <th scope="row"><?= $Produit->id ?></th>
      <td><IMG src="<?= $Produit->image ?>" style="width: 25%"></td>
      <td><?= $Produit->nom ?></td>
      <td style="font-weight: blod;color:green;"><?= $Produit->prix ?>$</td>
      <td><?= substr($Produit->description, 0, 100); ?>....</td>
      <td>
        <a href="editer.php?pdt=<?=$Produit->id ?>"> <i class="fa fa-pencil" style="font-size: 20px;"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
 
 </div>
 </div>
</div>

</body>
</html>
