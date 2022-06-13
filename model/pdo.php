<?php
class DB {
    private $pdo;
    private $statement;
    //database information
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'Phuc97@#';
    private $dbname = 'pdoposts';

    public function __construct()
    {
        //Connect PDO
        $pdo = new PDO("mysql:host=$this->host", $this->user, $this->password);
        //Create database if not exists
        $sql = 'CREATE DATABASE IF NOT EXISTS pdoposts';
        $pdo->exec($sql);
        //Connect DB
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
        //Set PDO attribute
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Correct font            
        $this->pdo->exec('set names utf8');
        $this->pdo->exec('SET CHARACTER SET utf8');

        //Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS posts(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        body TEXT NOT NULL,
        author VARCHAR(50),
        file_name VARCHAR(50),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $this->pdo->exec($sql);        
    }

    /**
     * Function query
     * @param $sql
     */
    public function query($sql){
        $this->statement = $this->pdo->prepare($sql);
    }

    /**
     * Function bind value
     * @param $values
     */
    public function bind(...$values){
        foreach($values as $value){
            $this->statement->bindValue($value[0],$value[1]);
        }
        $this->statement->execute();
    }

    /**
     * Function fetch
     * @return object
     */
    public function fetch(){        
        return $this->statement->fetch();
    }
    
    /**
     * Function fetch
     * @return object
     */
    public function fetchAll(){
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Function close database 
     */
    public function close(){
        $this->pdo = null;
    }

}
