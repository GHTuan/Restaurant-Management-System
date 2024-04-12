<?php

require_once('Controller/BaseController.php');

class UserController extends BaseController{
    public function index(){
        return $this -> view('user.pages.user');
    }
}
?>