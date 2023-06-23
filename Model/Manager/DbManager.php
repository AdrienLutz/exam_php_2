<?php
//on crée ici la classe qui se connecte à notre bdd pour vérifier qu'elle fonctionne
// le dossier manager est le seul connecté à la bdd

abstract class DbManager
{
    protected $bdd;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "moto_bdd";

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->user, $this->password);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo('connected');
        } catch (PDOException $e) {
            var_dump($e);
            die();
        }
    }
}

