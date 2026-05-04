<?php

namespace Config;

use PDO;
use PDOException;

class DAO
{
    protected PDO  $pdo;

    public function __construct() {
        try {
            
            $host      = $_ENV["DB_HOST"];
            $dbName    = $_ENV["DB_NAME"];
            $user      = $_ENV["DB_USER"];
            $password  = $_ENV["DB_PASSWORD"];

            $this->pdo = new PDO("mysql:host=$host;dbname=$dbName;", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $ex) {

            echo $ex->getMessage();

        }
    }

}
