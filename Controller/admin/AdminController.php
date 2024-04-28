<?php

require_once('Controller/BaseController.php');

class AdminController extends BaseController{
    public function index(){
        return $this -> view('admin.pages.admin');
    }
}
?>