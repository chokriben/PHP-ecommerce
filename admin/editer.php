<?php
session_start();
if(!isset($_SESSION['zWu123'])){
  header("location: ../login.php");
}
if(empty($_SESSION['zWu123'])){
  header("location: ../login.php");
}
if(!isset($_GET['pdt'])){
    header("location:affichier.php");
}
if(empty($_GET['pdt']) and !is_numeric($_GET['pdt'])){
    header("location:affichier.php");
}
$id = $_GET['pdt'];
require("../Config/commandes.php");
$produits = getproduits($id);
foreach ($produits as $produit){
    $idpdt = $produit->id;
    $nom = $produit->nom;
    $image = $produit->image;
    $prix = $produit->prix;
    $description = $produit->description;
}
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
          <a class="nav-link" aria-current="page" href="../admin/">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php" >Suppression</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Afficher.php" style="font-weight: bold; color: green;">Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Modification</a>
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
<?php foreach($produits as $produit): ?>
     
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
    <input type="name" class="form-control" name="image" value="<?= $image?>" required>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom de produit </label>
    <input type="text" class="form-control" name="nom" value="<?= $nom?>" required>
  </div>
    <!-- #region -->
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix </label>
    <input type="number" class="form-control" name="prix" value="<?= $prix?>" required>
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description </label>
    <textarea class="form-control" name="desc"  required> <?= $description?></textarea>
  </div>
 


  <button type="submit" name="valider" class="btn btn-success"> enregistrer</button>
</form>
<?php endforeach; ?>
</body>
</html>
<?php
if(isset($_POST['valider']))
{
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
{
    if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
        {
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));
            try {
                //code...
                modifier($image, $nom , $prix, $desc , $id);
            } catch (Exception $e) {
                $e->getMessage();
            }
           
        }
}
}
?>