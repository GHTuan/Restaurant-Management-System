<?php
    $Controller_Access = ["Home", "Login", "Menu", "Product"];
    $Action_Access= ["index","login","register"];

    if (!in_array(ucfirst($_GET['controller']),$Controller_Access)){
        echo "Access Denied! You are not eligible to access this.";
        die();
    }
    $controller = ucfirst($_GET['controller']) . 'Controller';

    require('Controller/user/' . $controller . '.php'); /*require controller tương ứng*/
    
    $controller = ucfirst($controller); /*chuyển đổi chữ cái đầu tiên của chuỗi thành chữ hoa */

    $actionName = $_REQUEST['action'] ?? 'index';
    if (!in_array($actionName,$Action_Access)){
        echo "Access Denied! You are not eligible to access this.";
        die();
    }
    $request = new $controller; /*khởi tạo một class controller tương ứng với biến $controller*/

    $request -> $actionName();
?>