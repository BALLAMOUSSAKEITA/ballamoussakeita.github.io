<?php


 include '../../Controller/productC.php';
$produit=new productC();
 
   
 if (isset($_POST['updatProduit']))
 {
	 $ProduitId=$_POST['updatProduit'];
	//var_dump($userId); 
	//die;
	 $produit_afficher=$produit->rechercherProduit($ProduitId);
	 //header('location:table_utilisateurs.php');
 foreach($produit_afficher as $e)
	 {
		
		$id_produit=$e["id_produit"];
		 $designation=$e['designation'];
		 $description=$e['description'];
		 $prix=$e['prix'];
		 $quantite=$e['quantite'];
		 $photo=$e['photo'];
		
		
	 }
	 $prod=new Product($designation,$quantite,$prix,$description,$photo);
	 
  var_dump($prod);
	 $produit->modifierProduit($prod,$id_produit);
	 
	 header("location:basic-table.php");
	 
	 
 }
 
 

?>