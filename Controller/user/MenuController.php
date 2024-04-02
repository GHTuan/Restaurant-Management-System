<?php

require_once('Controller/BaseController.php');

class MenuController extends BaseController{
    public function index(){
        return $this -> view('user.pages.menu');
    }
}
?>