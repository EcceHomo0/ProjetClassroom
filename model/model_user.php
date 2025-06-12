<?php

include './utils/functions.php';
include './env.php';

class User
{

    // ------- Attributs -------- //
    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?string $password;
    private ?PDO $bdd;


    // ---------- Constructeur --------- //
    public function  __construct($host,$dbname,$username,$password)
    {
        $this -> bdd = connect($host,$dbname,$username,$password);
    }


    // ------------ Getters et Setters ------------- //

    public function getId():?int { return $this -> id;}
    public function getFirstname():?string { return $this -> firstname;}
    public function getLastname():?string { return $this -> lastname;}
    public function getEmail():?string { return $this -> email;}
    public function getPassword():?string { return $this -> password;}
    public function getBDD():?PDO { return $this -> bdd;}

    public function setId(?int $id):?User {$this->id=$id; return $this;}
    public function setFirstname(?string $firstname):?User {$this->firstname=$firstname; return $this;}
    public function setLastname(?string $lastname):?User {$this->lastname=$lastname; return $this;}
    public function setEmail(?string $email):?User {$this->email=$email; return $this;}
    public function setPassword(?string $password):?User {$this->password=$password; return $this;}
    public function setBDD(?PDO $bdd):?User {$this->bdd=$bdd; return $this;}


    // ------------ Méthodes ------------- //

    public function addUser():string
    {
        try
        {
            $req = $this -> getBDD()->prepare("INSERT INTO user (firstname, lastname, email,`password`) VALUES (?,?,?,?)");
            $firstname = $this -> getFirstname();
            $lastname = $this -> getLastname();
            $email = $this -> getEmail();
            $password = $this -> getPassword();
            $req->bindParam(1,$this -> firstname,PDO::PARAM_STR);
            $req->bindParam(2,$this -> lastname,PDO::PARAM_STR);
            $req->bindParam(3,$this -> email,PDO::PARAM_STR);
            $req->bindParam(4,$this -> password,PDO::PARAM_STR);
            $req->execute();
            return "$firstname $lastname a été enregistré avec succès";
        }
        catch(EXCEPTION $error)
        {
            return $error -> getMessage();
        }
    }

    public function findUserByEmail($email): array | string
    {   try
        {
        $req = $this -> getBDD() -> prepare("SELECT id_user, firstname, lastname, email, `password` FROM user WHERE email = ? LIMIT 1");
        $req->bindParam(1,$email,PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll();
        }
        catch(EXCEPTION $error)
        {
            return $error -> getMessage();
        }
    }

}

?>