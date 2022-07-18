<?php

include_once 'C:/xamp/htdocs/Siguiri/config.php';
include_once '../../Model/actualite.php';




class ActualiteC{

function afficherActualite(){
        $db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * FROM actualites'
            );
			$query->execute();
			$result=$query->fetchALL();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function supprimerActualite($actualiteId){

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM actualites WHERE id_actualite = :actualiteId'
            );
            $query->execute([
                'actualiteId' => $actualiteId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function ajouterActualite($newActualite){
        $db = config::getConnexion();

        try {
            
            $query = $db->prepare(
                'INSERT INTO actualites (image,titre,lien,texte) 
                    VALUES (:image,:titre,:lien,:texte)'
            );
            $query->execute([
                'image' => $newActualite->getImage(),
                'titre' => $newActualite->getTitre(),
                'lien' => $newActualite->getLien(),
                'texte' => $newActualite->getTexte()
				
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function rechercherActualite($actualiteID){
	 $db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * FROM actualites where id_actualite= :actualiteID'
            );
			$query->execute(['actualiteID'=>$actualiteID]);
			$result=$query->fetchALL();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    function modifierActualite($newActualite,$actualiteId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE actualites SET image= :image, titre = :titre,  lien= :lien, texte = :texte where id_actualite = :actualiteId'
            );
            $query = $query->execute([
				'image' => $newActualite->getImage(),
                'titre' => $newActualite->getTitre(),
                'lien' => $newActualite->getLien(),
                'texte' => $newActualite->getTexte(),
                'actualiteId' => $actualiteId
            ]);
          
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    
    
    /*
	function nombreClient(){
		$db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * from client '
            );
			$query->execute();
			$result=$query->rowCount();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
	}
function rechercherClient($userID){
	 $db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * FROM client where id_client= :userID'
            );
			$query->execute(['userID'=>$userID]);
			$result=$query->fetchALL();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
}

function rechercherNomClient($userID){
	 $db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT firstname FROM client where id_client= :userID'
            );
			$query->execute(['userID'=>$userID]);
			$result=$query->fetchALL();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
}
//une fonction rechercher Email afin d'assurer l'unicit� des adresse Email
function rechercherEmail($email){
	 $db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * FROM client where email= :email'
            );
			$query->execute(['email'=>$email]);
			$result=$query->fetchALL();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
}
     function ajouterClient($newClient){
        $db = config::getConnexion();

        try {
            
            $query = $db->prepare(
                'INSERT INTO client (firstname,lastname,ville,email,password,photo) 
                    VALUES (:firstname,:lastname,:ville,:email,:password,:photo)'
            );
            $query->execute([
                'email' => $newClient->getEmail(),
                'ville' => $newClient->getville(),
                'password' => $newClient->getPassword(),
                'firstname' => $newClient->getFirstname(),
				'lastname' => $newClient->getLastname(),
				'photo' => $newClient->getPhoto()
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
	//on enregistre le client comme connecter en modifiant le champ connecter (on le me � 1)
	function userConnecter($userID){
        $db = config::getConnexion();
		try{
            $query = $db->prepare(
                'UPDATE client SET  connecter = 1 where id_client = :userId'
            );
            $query = $query->execute([
                'userId' => $userID
            ]);
           // $_SESSION['ville'] = $newville;
        }catch(PDOException $e){
            $e->getMessage();
        }
     
        }
    
	//on met le champ connecter � 0 pour le deconnecter
	function userDeconnecter($userID){
        $db = config::getConnexion();
		try{
            $query = $db->prepare(
                'UPDATE client SET  connecter=0 where id_client = :userId'
            );
            $query = $query->execute([
                'userId' => $userID
            ]);
           // $_SESSION['ville'] = $newville;
        }catch(PDOException $e){
            $e->getMessage();
        }
      }
    //CALCULER LE NOMBRE D'USER CONNECTER
	function nombreUserConnecter(){
		$db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * from client where connecter=1'
            );
			$query->execute();
			$result=$query->rowCount();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
	}
	
	//CALCULER LE NOMBRE D'USER DECONNECTER
	function nombreUserDeconnecter(){
		$db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * from client where connecter=0'
            );
			$query->execute();
			$result=$query->rowCount();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
	}
	function updateClient($user,$userId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE client SET firstname= :firstname, lastname = :lastname,  ville= :ville, email = :email, password= :password, photo= :photo where id_client = :userId'
            );
            $query = $query->execute([
				'firstname'=> $user->getFirstname(),
				'lastname'=> $user->getLastname(),
                'ville' => $user->getville(),
				'email'=> $user->getEmail(),
				'password' => $user->getPassword(),
				'photo' => $user->getPhoto(),
                'userId' => $userId
            ]);
           // $_SESSION['ville'] = $newville;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    
    function supprimerClient($userId){

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM client WHERE id_client = :userId'
            );
            $query->execute([
                'userId' => $userId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
	function rechercheAvancee($mot){
		 $db = config::getConnexion();
        try {
            $query = $db->query(
			
            "SELECT * FROM client WHERE firstname like '%$mot%' || lastname like '%$mot%' || ville like '%$mot%'"
            );
			$query->execute(['firstname'=>$mot]);
			$result=$query->fetchALL();
			return $result;
           
        } catch (PDOException $e) {
            $e->getMessage();
        }
	}
function trierClientParNom(){
		$db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * FROM client order by firstname'
            );
			$query->execute();
			$result=$query->fetchALL();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
	}
	
	function trierClientParVille(){
		$db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * FROM client order by ville'
            );
			$query->execute();
			$result=$query->fetchALL();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
	}
	
	function rechercherVille($ville){
	 $db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * FROM client where ville= :ville'
            );
			$query->execute(['ville'=>$ville]);
			$result=$query->rowCount();
			return $result;
			
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
}
    
}

class EmployeC{

function rechercherEmploye($userID){
	 $db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * FROM employe where id_employe= :userID'
            );
			$query->execute(['userID'=>$userID]);
			$result=$query->fetchALL();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
}
function afficherEmploye(){
        $db = config::getconnexion();

        try {
            $query = $db->prepare(
			
            'SELECT * FROM employe'
            );
			$query->execute();
			$result=$query->fetchALL();
			return $result;
           

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
function ajouterEmploye($newEmploye){
        $db = config::getConnexion();

        try {
			
            $query = $db->prepare(
                'INSERT INTO employe (firstname,lastname,ville,email,password) 
                    VALUES (:firstname,:lastname,:ville,:email,:password) '
            );
			
            $query->execute([
                'firstname' => $newEmploye->getFirstname(),
				'lastname'  => $newEmploye->getLastname(),
                'ville'  => $newEmploye->getville(),
				'email'     => $newEmploye->getEmail(),
                'password'  => $newEmploye->getPassword()             
            ]);
			
        } catch (PDOException $e) {
            $e->getMessage();
			//var_dump($e);
        }
		
    }
 function supprimerEmploye($userId){

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM employe WHERE id_employe = :userId'
            );
            $query->execute([
                'userId' => $userId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
	
   function updateEmploye($user,$userId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE employe SET firstname= :firstname, lastname = :lastname,  ville= :ville, email = :email, password= :password where id_employe = :userId'
            );
            $query = $query->execute([
				'firstname'=> $user->getFirstname(),
				'lastname'=> $user->getLastname(),
                'ville' => $user->getville(),
				'email'=> $user->getEmail(),
				'password' => $user->getPassword(),
                'userId' => $userId
            ]);
           // $_SESSION['ville'] = $newville;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
	function rechercheAvancee($mot){
		 $db = config::getConnexion();
        try {
            $query = $db->query(
			
            "SELECT * FROM employe WHERE firstname like '%$mot%' || lastname like '%$mot%' || ville like '%$mot%'"
            );
			$query->execute(['firstname'=>$mot]);
			$result=$query->fetchALL();
			return $result;
           
        } catch (PDOException $e) {
            $e->getMessage();
        }
	}


}


class AdministratorC{

    function ajouterAdministrateur($newAdministrator){
        $db = config::getConnexion();

        try {
            $query = $db->prepare(
                'INSERT INTO administrateur (firstname,lastname,ville,email,password) 
                    VALUES (:firstname,:lastname,:ville,:email,:password) '
            );
            $query->execute([
                'firstname' => $newAdministrator->getFirstname(),
                'lastname' => $newAdministrator->getLastname(),
                'ville' => $newAdministrator->getville(),
                'email' => $newAdministrator->getEmail(),
                'password' => $newAdministrator->getPassword()
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function deleteAdministrator($userId){

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM administrator WHERE userId = :userId'
            );
            $query->execute([
                'userId' => $userId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function updateAdministratorville($newville,$userId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE administrator SET ville= :ville where userId = :userId'
            );
            $query = $query->execute([
                'ville' => $newville,
                'userId' => $userId
            ]);
            $_SESSION['ville'] = $newville;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function updateAdministratorEmail($newEmail,$userId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE administrator SET email= :email where userId = :userId'
            );
            $query = $query->execute([
                'email' => $newEmail,
                'userId' => $userId
            ]);
            $_SESSION['email'] = $newEmail;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    function updateAdministratorPassword($newPassword,$userId){
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE administrator SET password= :password where userId = :userId'
            );
            $query = $query->execute([
                'password' => $newPassword,
                'userId' => $userId
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
*/
}

?>