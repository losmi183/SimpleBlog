<?php

namespace App\Model;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

use App\Database\Database;
use PDO;

class Comment extends Database {
    
    public function all() 
    { 
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE parent_id = 0");
        $stmt->execute();
        return $stmt->fetchAll();    
    }

    
    public function create($parent_id, $name, $content)
    {
        $stmt = $this->db->prepare("INSERT INTO comments (parent_id,name,content) VALUES (:parent_id,:name,:content)");
        $result = $stmt->execute([':parent_id' => $parent_id, ':name' => $name, ':content' => $content]);
        return $result;  
    }

    public function allSubcomments($id) {
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE parent_id=:parent_id");
        $stmt->execute([':parent_id' => $id]);
        return $stmt->fetchAll();    
    }



}
