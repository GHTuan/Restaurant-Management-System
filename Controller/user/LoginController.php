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
            'error' => [],
            'success' => []
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
                    'error' => 'Tài khoản hoặc mật khẩu không đúng',
                    'success' => []
                ]);
            }
        } else {
            return $this -> view('user.pages.login',
            [
                'error' => 'Vui lòng nhập đầy đủ thông tin',
                'success' => []
            ]);
        }
    }
    public function logout(){
        $this -> userModel -> logout();
        return $this -> view('user.pages.login',
        [
            'error' => [],
            'success' => "Logout successfully."
        ]);

    }
    
    public function register(){
        //TODO
        //TODO
        // Validate the user input _GET method for testing, _POST when committing



        // After validate user the model to create a new user 
        // if model return 0, user exits and throw error
        // if model return 1, send success message



        // throw error, success : check out the login function above 
        //TODO
        //TODO
    }
}
?>