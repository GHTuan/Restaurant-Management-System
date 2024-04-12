<?php

require_once('Controller/BaseController.php');

class ProductController extends BaseController{
    public function index(){
        return $this -> view('user.pages.product');
    }
}
?>