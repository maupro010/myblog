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
    $dsn = 'mysql:host='.$host;
    // Creat a PDO instance
    $pdo = new PDO($dsn, $user, $password);
    //Create database
    $sql = 'CREATE DATABASE IF NOT EXISTS pdoposts';
    $pdo->exec($sql);

    // Creat a PDO instance
    $pdo = new PDO($dsn.";dbname=$dbname", $user, $password);
    //Set PDO attribute
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Correct font
    $sql = 'SET CHARACTER SET utf8';
    $pdo->exec($sql);
    
    

    //Create table
    $sql = "CREATE TABLE IF NOT EXISTS posts(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    body TEXT NOT NULL,
    author VARCHAR(50),
    file_name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    
    return $pdo;
}