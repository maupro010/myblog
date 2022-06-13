<?php
require_once 'model/pdo.php';
class Post extends DB{
    /**
     * Function find all posts
     * @return array
     */
    public function findAll(){
        $this->query('SELECT * FROM posts ORDER BY created_at DESC');        
        $posts = $this->fetchAll();
        return $posts;
    }

    /**
     * Function find one post by ID
     * @param id
     * @return object
     */
    public function findOne($id){
        $this->query('SELECT * FROM posts where created_at = :id');
        $this->bind(['id',$id]);
        $post = $this->fetch();
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
        $this->query("UPDATE posts SET title = :title, body = :body, author = :author, file_name = :file_name WHERE created_at = :created_at");
        $this->bind([':created_at', $id],[':title', $title],[':body', $body],[':author', $author],[':file_name', $file_name]);       
    }

    /**
     * Function create new post
     * @param title
     * @param body
     * @param author
     * @param file_name
     */
    public function create($title, $body, $author, $file_name){
        $this->query('INSERT INTO posts(title, body, author,file_name) VALUES (:title, :body, :author,:file_name)');
        $this->bind([':title', $title],[':body', $body],[':author', $author],[':file_name', $file_name]);
    }

    /**
     * Function delele post by ID
     * @param id 
     */
    public function delete($id){
        $this->query('DELETE FROM posts WHERE created_at= :created_at');
        $this->bind([':created_at', $id]);
    }    
}