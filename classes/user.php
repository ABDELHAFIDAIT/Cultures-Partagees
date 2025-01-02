<?php
require_once './../config/db.php';

class User{
    protected int $id;
    protected string  $nom;
    protected string $prenom;
    protected string $telephone;
    protected string $email;
    protected string $password;
    protected string $role;
    protected $database ;


    public function __construct(){
        $this->database= new Database(); 
    }



    // GETTERS
    public function getId():int{
        return $this->id;

    }
    public function getNom():string{
        return $this->nom;

    } 
    public function getPrenom():string{
        return $this->prenom;

    } 
    public function getTelephone():string{
        return $this->telephone;

    } 
    public function getEmail():string{
        return $this->email;

    } 
    public function getPassword():string{
        return $this->password;

    }
    public function getRole():string{
        return $this->role;

    }

    
    


    //SETTERS
    function setNom(string $nom):void{
        $this->nom = $nom;
    }
    function setPrenom(string $prenom):void{
        $this->prenom = $prenom;
    }
    function setTelephone(string $telephone):void{
        $this->telephone = $telephone ;
    }
    function setEmail(string $email):void{
        $this->email = $email;
    }
    function setPassword(string $password):void{
        $this->password = password_hash($password,PASSWORD_DEFAULT);
    }




    // LOGIN FUNCTION
    public function login($email, $password) {
        try{
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->database->getConnection()->prepare($query);

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $row['password'])) {
                    $this->id = $row['id_user'];
                    $this->prenom = $row['prenom'];
                    $this->nom = $row['nom'];
                    $this->email = $row['email'];
                    $this->telephone = $row['telephone'];
                    $this->role = $row['role'];

                    return $this;
                }
            }

            return false;
        } catch (PDOException $e) {
            return "Erreur lors de l'authentification : " . $e->getMessage();
        }
    }

    // GET USER INFOS
    public function profile($id) {
        try{
            $stmt = $this->database->getConnection()->prepare("SELECT * FROM users WHERE id_user = :id");
        
            $stmt->bindValue(":id", (int)$id, PDO::PARAM_INT); 
        
            $stmt->execute();
        
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        
            return $result;
            
        } catch (PDOException $e) {
            return "Erreur lors de la Récupération des Données". $e->getMessage();
        }
    }
}