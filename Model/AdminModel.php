<?php
require_once('Model/BaseModel.php');
class AdminModel extends BaseModel{

	const TABLE = 'admin';

    // This is for testing purposes only, don't use this
	public function getAll($selct = ['*'], $orderBy = [], $limit = 10){
        return $this -> all(self::TABLE, $selct, $orderBy, $limit);
    }

    public function getById(){
        if (!isset($_SESSION['ID'])){
            echo "Must be login";
            die();
        }
        return $this -> find(self::TABLE, 'AdminID', $_SESSION['ID']);
    }

    public function login($username,$password){
        $sql = "SELECT * FROM " . self::TABLE . " WHERE name = '{$username}' AND password = '{$password}'";
        $result = $this -> _query($sql);
        $row = $result->fetch_assoc();
        if ((bool)$row){
            $_SESSION['ID'] = $row['AdminID'];
            $_SESSION['Role'] = 'admin';
            return True;
        } 
        else 
        {
            return False;
        }   
    }
    public function logout(){
        session_unset();
        session_destroy();                
    }
    public function register($username,$password,$name,$phoneNo,$avatar){
        // TODO
        // TODO
        // Check if user already exists

        // Use create in BaseModel to create a new user
        // If create in BaseModel throw an error, you can freely modify it (not recommended)
        
        // If create successfully return True
        // Other case return false
        // TODO
        // TODO
    }

    public function getUserAccounts(){
        $sql = "SELECT * FROM member";
        $result = $this -> _query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function getAdminAccounts(){
        $sql = "SELECT * FROM admin";
        $result = $this -> _query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function editAccount($type, $id, $data){
        $sql = "";
        if ($type == 'admin'){
            $sql = "UPDATE admin SET ";
            foreach ($data as $key => $value) {
                $sql .= "{$key} = '{$value}',";
            }
            $sql = substr($sql, 0, -1);
            $sql .= " WHERE AdminID = {$id}";
        } else if ($type == 'user'){    
            $sql = "UPDATE member SET ";
            foreach ($data as $key => $value) {
                $sql .= "{$key} = '{$value}',";
            }
            $sql = substr($sql, 0, -1);
            $sql .= " WHERE UserID = {$id}";
        } else {
            $sql = "";
        }
        return $this -> _query($sql);
    }

    public function deleteAccount($type, $id){
        $sql = "";
        if ($type == 'admin'){
            $sql = "DELETE FROM admin WHERE AdminID = {$id}";
        } else if ($type == 'user'){    
            $sql = "DELETE FROM member WHERE UserID = {$id}";
        } else {
            $sql = "";
        }
        return $this -> _query($sql);
    }

    public function addAccount($type, $data){
        $sql = "";
        if ($type == 'admin'){
            $sql = "INSERT INTO admin(";
            $sql .= implode(',', array_keys($data));
            $sql .= ") VALUES ('";
            $sql .= implode("','", array_values($data));
            $sql .= "')";
        } else if ($type == 'user'){    
            $sql = "INSERT INTO member(";
            $sql .= implode(',', array_keys($data));
            $sql .= ") VALUES ('";
            $sql .= implode("','", array_values($data));
            $sql .= "')";
        } else {
            $sql = "";
        }
        return $this -> _query($sql);
    }
}