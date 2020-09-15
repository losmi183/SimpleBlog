<?php

namespace App\Model;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Database\Database;
use PDO;

class Post extends Database {

    public function all() 
    { 
        $stmt = $this->db->prepare("SELECT * FROM posts");
        $stmt->execute();
        return $stmt->fetchAll();    
    }

    public function show($id) 
    {        
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE id=:id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }


    public function create($title, $content, $author)
    {
        $stmt = $this->db->prepare("INSERT INTO posts (title,content,author) VALUES (:title,:content,:author)");
        $result = $stmt->execute([':title' => $title, ':content' => $content, ':author' => $author]);
        return $result;  
    }

    public function update($id, $title, $content, $author)
    {
        $stmt = $this->db->prepare("UPDATE posts SET title=:title, content=:content, author=:author WHERE id=:id");
        $post = $stmt->execute(['id' =>$id, ':title' => $title, ':content' => $content, ':author' => $author]);
        return $post;        
    }
    

    /*
    *
    * Delete single id OR array of ids
    *
    * @param int $id OR array of int $ids
    * @return bool
    *
    */
    public function delete($ids)
    {
        if(is_array($ids)) {
            $result;
            foreach ($ids as $id) {            
                $stmt = $this->db->prepare("DELETE FROM posts WHERE id=:id");
                $result = $stmt->execute(['id' => $id]);
            }
            return $result;
        }
        else {
            $stmt = $this->db->prepare("DELETE FROM posts WHERE id=:id");
            $result = $stmt->execute(['id' => $ids]);
            return $result;        
        }
    }
}
