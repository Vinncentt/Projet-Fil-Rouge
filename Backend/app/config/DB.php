<?php
// require_once 'dbConfig.php';

require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

class DB
{
    // private $host = $_ENV['DB_HOST'];
    // private $user =  $_ENV['DB_USER'];
    // private $pass = $_ENV['DB_PASS'];
    // private $dbname = $_ENV['DB_NAME'];

    private $conn;
    private $stmt;
    private $error;

    public function __construct()
    {
        $connection = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
        $optins = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try {
            $this->conn = new PDO($connection, $_ENV['DB_USER'], $_ENV['DB_PASS'], $optins);
        } catch (PDOExeption $err) {
            $this->error = $err->getMessage();
            echo $this->error;
        }

    }

    public function query($sql)
    {
        $this->stmt = $this->conn->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function all()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}
