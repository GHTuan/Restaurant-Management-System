<?php

require_once('Controller/BaseController.php');

class HomeController extends BaseController{

    private $adminModel;

    function __construct(){
        $this -> loadModel('AdminModel');
        $this -> adminModel = new AdminModel();
    }

    public function index(){
        return $this -> view('admin.pages.home');
    }
    
    public function logout(){
        $this -> adminModel -> logout();
        return $this -> view('user.pages.login',
        [
            'error' => [],
            'success' => "Logout successfully."
        ]);
    }
}
?>