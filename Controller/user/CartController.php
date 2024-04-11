<?php

require_once('Controller/BaseController.php');

class CartController extends BaseController{
    public function index(){
        return $this -> view('user.pages.cart');
    }
}
?>