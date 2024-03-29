<?php
class Db{
    private $serverName;
    private $userName;
    private $password;
    private $databaseName;
    public $connexion;
    function __construct(){
        $this->serverName="localhost";
        $this->userName="root";
        $this->password="";
        $this->databaseName="jcpvacances";
    }
    function login(){
        try{
            $this->connexion = new PDO("mysql:host=$this->serverName;dbname=$this->databaseName", $this->userName, $this->password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
        echo "Erreur : " . $e->getMessage() . "<br>";
        }
    }
    function logout(){
        $this->connexion=null;
    }
}

?>