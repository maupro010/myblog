<?php
class Post {
    private $pdo;

    public function __construct()
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
        $this->pdo = new PDO($dsn.";dbname=$dbname", $user, $password);
        //Set PDO attribute
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Correct font            
        $this->pdo->exec('set names utf8');
        $this->pdo->exec('SET CHARACTER SET utf8');
        //Create table
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
     * Function find all posts
     * @return array
     */
    public function findAll(){
        $statement = $this->pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    /**
     * Function find one post by ID
     * @param id
     * @return object
     */
    public function findOne($id){
        $statement = $this->pdo->prepare('SELECT * FROM posts where created_at = :id');
        $statement->execute(['id'=>$id]);
        $post = $statement->fetch();
        return $post;
    }

    /**
     * Function update post by ID
     * @param id
     * @param title
     * @param body
     * @param author
     * @param file_name
     */
    public function update($id, $title, $body, $author, $file_name){
        $statement = $this->pdo->prepare("UPDATE posts SET title = :title, body = :body, author = :author, file_name = :file_name WHERE created_at = :created_at");
        $statement->bindValue(':created_at', $id);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':file_name', $file_name);
        $statement->execute();
    }

    /**
     * Function create new post
     * @param title
     * @param body
     * @param author
     * @param file_name
     */
    public function create($title, $body, $author, $file_name){
        $statement = $this->pdo->prepare('INSERT INTO posts(title, body, author,file_name) VALUES (:title, :body, :author,:file_name)');
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':file_name', $file_name);
        $statement->execute();
    }

    /**
     * Function delele post by ID
     * @param id 
     */
    public function delete($id){
        $statement = $this->pdo->prepare('DELETE FROM posts WHERE created_at= :created_at');
        $statement->bindValue(':created_at', $id);
        $statement->execute();
    }






}
