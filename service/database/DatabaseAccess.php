<?php

declare(strict_types=1);

namespace App\Service\Database;

use PDO;
use PDOException;

class DataBaseAccess extends PDO
{
    private static $instance;
    
    private string $DBPASS;

    private const DBHOST = 'localhost';
    private const DBNAME = 'SOLID';
    private const DBUSER = 'root';

    private function __construct()
    {
        $this->DBPASS = file_get_contents(dirname(__DIR__).'/DBpass.secret');

        $DataSourceName = 'mysql:dbname=' . self::DBNAME . ';host=' . self::DBHOST;

        try{
            parent::__construct($DataSourceName, self::DBUSER, $this->DBPASS);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            //$this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public static function getInstance ()
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
}