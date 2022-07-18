<?php

    include_once '../../Controller/actualiteC.php';
	


    $actu = new ActualiteC();
    if (isset($_POST['image'])&& isset($_POST['titre']) && isset($_POST['lien']) && isset($_POST['texte']) ) {
        if (!empty($_POST['image'])&&!empty($_POST['titre'])&& !empty($_POST['lien'])  && !empty($_POST['texte'])) {
            $actualite = new Actualite(
                $_POST['image'],
                $_POST['titre'],
                $_POST['lien'],
                $_POST['texte']
            );
            
			
			$actu->ajouterActualite($actualite);
			
			header('Location:basic-table.php');
			
        } 
		else 
		{
            $error = "Missing information";
        }
    }
	
	
	
		//die;
?>