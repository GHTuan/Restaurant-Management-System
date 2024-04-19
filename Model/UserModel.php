<?php
require_once('Model/BaseModel.php');
class UserModel extends BaseModel{

	const TABLE = 'member';

    // This is for testing purposes only, don't use this
	public function getAll($selct = ['*'], $orderBy = [], $limit = 10){
        return $this -> all(self::TABLE, $selct, $orderBy, $limit);
    }

    public function login($username,$password){
        $sql = "SELECT * FROM " . self::TABLE . " WHERE username = '$username' AND password = '$password'";
        $result = $this -> _query($sql);
        $row = $result->fetch_assoc();
        if ((bool)$row){
            $_SESSION['ID'] = $row['UserID'];
            $_SESSION['Role'] = 'member';
            return True;
        } 
        else 
        {
            return False;
        }   
    }
    public function logout(){
        $_SESSION['ID'] = '';
        $_SESSION['Role'] = '';
        
    }
    public function register($username,$password,$name,$phoneNo,$avatar){
        // TODO
        // TODO
        // Check if user already exists
        $sql = "SELECT * FROM " . self::TABLE . " WHERE username = '$username'";
        $result = $this -> _query($sql);
        if ($result->num_rows > 0){
            return False;
        }
        // If not, create a new user
        // Use create in BaseModel to create a new user
        // If create in BaseModel throw an error, you can freely modify it (not recommended)
        $sql = "INSERT INTO " . self::TABLE . "(Username, Password, Name, Phoneno, Avatar, AccessLevel) VALUES ('$username', '$password', '$name', '$phoneNo', '$avatar', 1)";
        $this -> _query($sql);
        return True;
        // If create successfully return True
        // Other case return false
        // TODO
        // TODO
    }
}