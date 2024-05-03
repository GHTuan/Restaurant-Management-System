<?php
require_once('Model/BaseModel.php');
class CartModel extends BaseModel{

	const TABLE = 'cart';

    // This is for testing purposes only, don't use this
	public function getAll($selct = ['*'], $orderBy = [], $limit = 100){
        return $this -> all(self::TABLE, $selct, $orderBy, $limit);
    }

    public function findById($id){
        return $this -> find(self::TABLE, 'CartID', $id);
    }

    public function count(){
        $sql = "SELECT COUNT(CartID) AS NumberOfCart FROM " . self::TABLE;
        $result = $this -> _query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getRecentCart(){
        $sql = "SELECT Username, CartID, ExportDate FROM " . self::TABLE . " c JOIN member m ON c.UserID = m.UserID ORDER BY CartID DESC LIMIT 5";
        $result = $this -> _query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)){
            array_push($data, $row);
        }
        return $data;
    }

}