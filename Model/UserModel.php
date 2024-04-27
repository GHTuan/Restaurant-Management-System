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
        session_unset();
        session_destroy();  
        
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
        // $sql = "INSERT INTO " . self::TABLE . "(Username, Password, Name, Phoneno, Avatar, AccessLevel) VALUES ('$username', '$password', '$name', '$phoneNo', '$avatar', 1)";
        // $this -> _query($sql);
        $this -> create(self::TABLE, ['Username' => $username, 'Password' => $password, 'Name' => $name, 'Phoneno' => $phoneNo, 'Avatar' => $avatar, 'AccessLevel' => 1]);
        return True;
        // If create successfully return True
        // Other case return false
        // TODO
        // TODO
    }

    public function loadProductInfo($productID){
        // Select the product in product table with ProductID
        $sql = "SELECT * FROM product WHERE ProductID = $productID";
        $result = $this -> _query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    public function loadCartItems($userID){
        // Select the cart in cart table with null ExportDate
        $sql = "SELECT * FROM cart WHERE UserID = $userID AND ExportDate IS NULL";
        $result = $this -> _query($sql);
        $row = $result->fetch_assoc();

        // If there is no cart, create a new cart
        if ((bool)$row == False){
            $sql = "INSERT INTO cart (UserID) VALUES ($userID)";
            $this -> _query($sql);
            $result = $this -> _query($sql);
            $row = $result->fetch_assoc();
        }
        // Select all the items in the cart
        $cartID = $row['CartID'];
        $sql = "SELECT * FROM cartitem WHERE CartID = $cartID";
        $result = $this -> _query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()){
            $item = [
                'Product' => $this -> loadProductInfo($row['ProductID']),
                'CartID' => $row['CartID'],
                'Amount' => $row['Amount']
            ];
            $data[] = $item;
        }
        return $data;
    }

    public function updateCartItems($userID, $productID, $amount, $cartID){
        if ($amount == 0)
        {
            // If amount is 0, delete the item from cartitem
            $sql = "DELETE FROM cartitem WHERE CartID = $cartID AND ProductID = $productID";
            $this -> _query($sql);
        }
        else 
        {
            $sql = "SELECT * FROM cartitem WHERE CartID = $cartID AND ProductID = $productID";
            $result = $this -> _query($sql);

            // if the item is not in the cart, insert a new item
            if ($result->num_rows == 0){
                $sql = "INSERT INTO cartitem (CartID, ProductID, Amount) VALUES ($cartID, $productID, $amount)";
                $this -> _query($sql);
            }
            else 
            {
                // if the item is in the cart, update the amount
                $sql = "UPDATE cartitem SET Amount = $amount WHERE CartID = $cartID AND ProductID = $productID";
                $this -> _query($sql);
            }
        }
        return $this -> loadCartItems($userID);
    }
    
}