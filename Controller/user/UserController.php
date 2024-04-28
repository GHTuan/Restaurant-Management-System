<?php

require_once('Controller/BaseController.php');

class UserController extends BaseController{
    private $userModel;

    function __construct(Type $var = null) {
        $this -> loadModel('UserModel');
        $this -> userModel = new UserModel();
    }

    public function index(){
        $data = $this -> userModel -> getById();
        return $this -> view('user.pages.user',[
            'data' => $data
        ]);
    }
}
?>