<?php
/**
 * @return PDO
 */
function getPDO(): PDO
{
    //database information
    $host = 'localhost';
    $user = 'root';
    $password = 'Phuc97@#';
    $dbname = 'pdoposts';

    // Set DSN
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    // Creat a PDO instance
    $pdo = new PDO($dsn, $user, $password);
    //Set PDO attribute
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Correct font
    $statement = $pdo->prepare('SET CHARACTER SET utf8');
    $statement->execute();

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS posts(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    body TEXT NOT NULL,
    author VARCHAR(50),
    file_name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
  
    //exec
    $statement = $pdo->prepare($sql);
    $statement->execute();
    
    return $pdo;
}