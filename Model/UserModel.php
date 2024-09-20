<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class UserModel extends Database
{  
      
    public function getUsers($limit)
    {    
        $val= $this->select("SELECT * FROM $table ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
     
        return $val;
    }
  
}