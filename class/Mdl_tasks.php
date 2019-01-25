<?php 


class Mdl_tasks {

    private $pdo;


    function __construct(){

        $host = 'localhost';
        $user = 'root';
        $password = 'Madiera3';
        $dbname = 'importcheck';


        //set DSN(Data Source Name)
        $dsn = 'mysql:host='.$host.';dbname='.$dbname;


        //create a PDO instance
        $this->pdo = new PDO($dsn, $user, $password);
    }


    public function  query($mysql_query){

        //excute MySql query and returns the results
        $stmt = $this->pdo->query($mysql_query);

        return $stmt;
    }




}

 ?>