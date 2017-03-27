<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class DbConnection {
    // LocalHost Connection Variables
//    private $db_host = "localhost";
//    private $db_user = "wine_user";
//    private $db_name = "wine_app";
//    private $db_pass = "paulNeve";

    // Live Connection Variables
        private $db_host = "localhost";
        private $db_user = "mychaosc_wine";
        private $db_name = "mychaosc_awad";
        private $db_pass = "p4ulN3v32017";

    protected $dbConn;

    public function __construct() {
        try {
            $this->dbConn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
            $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //        $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        } catch(PDOException $ex) {
            echo 'CONNECTION ERROR: ' . $ex->getMessage();
        }
    }

    public function getPdo() {
        return $this->dbConn;
    }
}

require_once ("../Database/db_Create.php");
require_once ("../Database/db_Read.php");
require_once ("../Database/db_Update.php");
require_once ("../Database/db_Delete.php");
$createObject = new CreateObject();
$readObject = new ReadObject();
$updateObject = new UpdateObject();
$deleteObject = new DeleteObject();
?>