<?php
require_once('Model/BaseModel.php');
class ProductModel extends BaseModel
{

    const TABLE = 'product';

    // This is for testing purposes only, don't use this
    public function getAll($selct = ['*'], $orderBy = [], $limit = 100)
    {
        return $this->all(self::TABLE, $selct, $orderBy, $limit);
    }

    public function findById($id)
    {
        return $this->find(self::TABLE, 'ProductId', $id);
    }

    public function count()
    {
        $sql = "SELECT COUNT(ProductID) AS NumberOfProduct FROM " . self::TABLE;
        $result = $this->_query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function loadProductInfo($productID)
    {
        // Select the product in product table with ProductID
        return $this->find(self::TABLE, 'ProductID', $productID);
    }
}
