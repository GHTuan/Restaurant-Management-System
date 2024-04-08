<?php

require_once('Controller/BaseController.php');

class LoginController extends BaseController{

    private $userModel;

    function __construct(){
        $this -> loadModel('UserModel');
        $this -> userModel = new UserModel();
    }

    public function index(){

        $data = $this -> userModel ->getAll();
        
        return $this -> view('user.pages.login',
        [
            'error' => []
        ]); 
    }
    
    public function login(){
        if (isset($_POST['username']) && isset($_POST['password'])){
            
            $result = $this -> userModel -> login($_POST['username'], $_POST['password']);
            if ($result)
            {
                return $this -> view('user.pages.home');
            } else {
                return $this -> view('user.pages.login',
                [
                    'error' => 'Tài khoản hoặc mật khẩu không đúng'
                ]);
            }
        } else {
            return $this -> view('user.pages.login',
            [
                'error' => 'Vui lòng nhập đầy đủ thông tin'
            ]);
        

        }




    }

}
?>