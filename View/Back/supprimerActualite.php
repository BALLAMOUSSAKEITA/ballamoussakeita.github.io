<?php


 
 include '../../Controller/actualiteC.php';
    $error = "";
    $success = 0;
    // create employe
    $actu= null;

    // create an instance of the controller
    $actu= new actualiteC();
	$actualite_afficher=new ActualiteC();
 //suppression
 if (isset($_POST['actualiteID']))
 {
	 $actualiteId=$_POST['actualiteID'];
	//var_dump($userId); 
	//die;
	 $actu->supprimerActualite($actualiteId);
	 header('location:basic-table.php');	 
 }
 //faffichage
 if (isset($_POST['readClient']))
 {
	 $userId=$_POST['readClient'];
	//var_dump($userId); 
	//die;
	 $client_afficher=$client->rechercherClient($userId);
	 //header('location:table_utilisateurs.php');
 foreach($client_afficher as $e)
	 {
		 $firstname=$e['firstname'];
		 $lastname=$e['lastname'];
		 $ville=$e['ville'];
		 $email=$e['email'];
		 $password=$e['password'];
		 $userID=$e['id_client'];
		
	 }	 
 }

?>

