<?php
 /*public PDOStatement::closeCursor(): bool;*/
 function modifier ($image, $nom, $prix, $desc ,$id)
   {
      if( require ("connexion.php"))
        {
       /* `produits`.`id`*/
       
 $req = $access->prepare("UPDATE  produits  set `image`=? , nom=? , prix=? , `description`=? where id=? ");

       $req->execute(array($image,$nom,$prix,$desc,$id));
      $req->closeCursor();
        }
   }
 function getproduits($id){
  if( require ("connexion.php"))
  {
 
 
 
    $req = $access->prepare(" select * from produits where  id =? ");
 $req->execute(array($id));
 if($req->rowCount()== 1){
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        
 }
 else {
        return false;
}
$req->closeCursor();
  }
}
 function getAdmin($email,$password){
   if( require ("connexion.php"))
   {
  $req = $access->prepare(" select * from admin where email =? and motdepasse =? ");
  $req->execute(array($email,$password));
  if($req->rowCount()== 1){
         $data = $req->fetchAll();
         return $data;
         
  }
  else {
         return false;
}
 $req->closeCursor();
   }
 }
function ajouter ($nom, $image, $prix, $desc)
   {
      if( require ("connexion.php"))
        {
       $req = $access->prepare("INSERT INTO produits(image , nom , prix , description) VALUES ('$nom' ,'$image' , $prix 
       , '$desc') ");
       $req->execute(array($image,$nom,$prix,$desc));
      $req->closeCursor();
        }
   }
   
   function afficher ()
   {
      if( require ("connexion.php"))
        {
       $req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");
       $req->execute();
      $data=$req->fetchALL(PDO::FETCH_OBJ);
       return $data;
       $req -> closeCursor();
      /* $req->closeCursor();*/
      
       
       }
   }
  
   function supprimer  ($id)
   {
      if( require ("connexion.php"))
        {
       $req = $access->prepare("DELETE FROM produits where id=?");
       $req->execute(array($id));
       $req -> closeCursor();

        }
   }



?>
