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
    <title>Document</title>
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
          <a class="nav-link " aria-current="page" href="../admin/" >Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="supprimer.php" style="font-weight: bold;">Suppression</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Afficher.php">Produits</a>
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

     
<form method="POST">
  <div class="mb-3">
   
   
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Identifiant du produit  </label>
    <input type="number" class="form-control" name="idproduit" required>
  </div>
 <button type="submit" name="valider" class="btn btn-warning"> Supprimer le  produit</button>
 </form>
 </div>
 <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
 <?php foreach($Produits as $produit):     ?>
      <div class="col">
          <div class="card shadow-sm">
            
            <img src="<?= $produit->image ?>">
            <h3><?= $produit->id ?></h3>

            <div class="card-body">
             
              
            </div>
          </div>
        </div>
        <?php endforeach; ?>
 </div>
 </div></div>

</body>
</html>
<?php
if(isset($_POST['valider']))
{
    if( isset($_POST['idproduit']) )
{
    if (!empty($_POST['idproduit']) and is_numeric($_POST['idproduit']))
        {
           
            $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));
           
            try {
                //code...
                supprimer($idproduit);
            } catch (Exception $e) {
                $e->getMessage();
            }
           
        }
}
}
?>