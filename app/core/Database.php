<?php

class Database
{

    private $host       = DB_HOST;
    private $user       = DB_USER;
    private $pass       = DB_PASS;
    private $db_name    = DB_NAME;

    private $dbh; // database handler atau koneksi ke database
    private $stmt; //statement untuk menyinpan query yang sudah di prepare !! tinggal di execute

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            //Koneksi menggunakan PHP PDO
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //prepare query //another methode use $this->dbh->query();
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
    //bind value of query if availabel
    public function bind($param, $value, $type = null)
    {
        //check type data
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
                case is_array($value):
                    $type = PDO::PARAM_STR_CHAR;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }
    //execute query after prepared
    public function execute()
    {
        $this->stmt->execute();
    }
    //retun data for many values
    public function resultSet()
    {
        $this->execute();
        return  $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //return data for singel value
    public function singel()
    {
        $this->execute();
        return  $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    // count row affected (DELET,UPDATE,INSERT) to number
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    public function debug()
    {
        return $this->stmt->debugDumpParams();
    }
}
