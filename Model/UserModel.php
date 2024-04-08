<?php
require_once('Model/BaseModel.php');
class UserModel extends BaseModel{

	const TABLE = 'member';

	public function getAll($selct = ['*'], $orderBy = [], $limit = 10){
        return $this -> all(self::TABLE, $selct, $orderBy, $limit);
    }

    public function getById($id){

    }
    public function store($data){
    
    }

    public function update($id,$data){
    
    }
    public function delete($id){
    
    }

    public function login($username,$password){
        $sql = "SELECT * FROM member WHERE username = '$username' AND password = '$password'";
        $result = $this -> _query($sql);
        $row = $result->fetch_assoc();
        if ((bool)$row){ 
            

            return True;
        } 
        else 
        {
            return False;
        }
        
    }
}