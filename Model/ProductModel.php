<?php
require_once('Model/BaseModel.php');
class ProductModel extends BaseModel{

	const TABLE = 'product';

    // This is for testing purposes only, don't use this
	public function getAll($selct = ['*'], $orderBy = [], $limit = 100){
        return $this -> all(self::TABLE, $selct, $orderBy, $limit);
    }

    public function findById($id){
        return $this -> find(self::TABLE, 'ProductId', $id);
    }


}