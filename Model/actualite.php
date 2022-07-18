<?php

class Actualite {

    private string $image;
    private string $titre;
    private string $lien;
    private string $texte;
   

    

    public function __construct(string $image,  string $titre, string $lien,string $texte){
        $this->image = $image;
        $this->titre = $titre;
        $this->lien = $lien;
        $this->texte = $texte;
		
    }
	
//
/*
function ajouterEmploye($newEmploye){
        $db = config::getConnexion();

        try {
            $query = $db->prepare(
                'INSERT INTO employe (firstname,lastname,ville,email,password) 
                    VALUES (:firstname,:lastname,:ville,:email,:password) '
            );
            $query->execute([
                'firstname' => $newEmploye->getFirstname(),
				'lastname' => $newEmploye->getLastname(),
                'email' => $newEmploye->getEmail(),
                'ville' => $newEmploye->getville(),
                'password' => $newEmploye->getPassword(),
              
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }*/
    //getters
    public function getImage():string{
        return $this->image;
    }

    public function getTitre():string{
        return $this->titre;
    }

    public function getLien():string{
        return $this->lien;
    }
	
    public function getTexte():string{
        return $this->texte;
    }
	
	
	

    //setters
    /*public function setville(string $ville):void{
        $this->ville = $ville;
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function setPassword(string $password):void{
        $this->password = $password;
    }

	
	 public function setFirstname(string $firstname):void{
        $this->firstname= $firstname;
    }
	
	 public function setLastname(string $lastname):void{
        $this->lastname = $lastname;
    }
    */
}

/*
class  Client extends User{

    private int $id_cleint;

    //getters

    public function getIdClient():int{
        return $this->id_client;
    }

    //setters

    public function setIdClient(int $id):void{
        $this->id_client = $id;
    }
     
}


class Employe extends User{

    private int $id_employe;

    //getters

    public function id_employe():int{
        return $this->id_employe;
    }

    //setters

    public function setIdEmploye(int $id):void{
        $this->id_employe = $id;
    }
}



class Administrateur extends User{
    private int $id_admin;

    //getters

    public function getIdAdmin():int{
        return $this->id_admin;
    }

    //setters

    public function setIdAdmin(int $id):void{
        $this->id_admin = $id;
    }
}
*/
?>