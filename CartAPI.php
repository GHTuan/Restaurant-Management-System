<?php
session_start();
header('Content-Type: application/json');

// if (!isset($_SESSION['ID'])) {
//     http_response_code(401);
//     echo json_encode(['message' => 'Unauthorized']);
//     return;
// }

switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        if (!isset($_GET['action']))
        {
            http_response_code(400);
            echo json_encode(['message' => 'Action is required']);
            return;
        }
        break;
    case 'POST':
        if (!isset($_POST['action']))
        {
            http_response_code(400);
            echo json_encode(['message' => 'Action is required']);
            return;
        }
        switch($_POST['action'])
        {
            case 'load':
                require_once('Model/UserModel.php');
                $model = new UserModel();
                $cartItems = $model -> loadCartItems($_SESSION['ID']);
                // $cartItems = $model -> loadCartItems(1);
                echo json_encode(['cartItems' => $cartItems, 'message' => 'Loaded successfully']);
                break;
            case 'update':
                if (!isset($_POST['productID']) || !isset($_POST['amount']) || !isset($_POST['cartId']))
                {
                    http_response_code(400);
                    echo json_encode(['message' => 'ProductID, amount and cartId are required']);
                    return;
                }
                require_once('Model/UserModel.php');
                $model = new UserModel();
                $cartItems = $model -> updateCartItems($_SESSION['ID'], $_POST['productID'], $_POST['amount'], $_POST['cartId']);
                // $cartItems = $model -> updateCartItems(1, $_POST['productID'], $_POST['amount'], $_POST['cartId']);
                echo json_encode(['cartItems' => $cartItems, 'message' => 'Updated successfully']);
                break;
            case 'clear':
                require_once('Model/UserModel.php');
                $model = new UserModel();
                $cartItems = $model -> clearCart($_SESSION['ID']);
                // $cartItems = $model -> clearCart(1);
                echo json_encode(['cartItems' => $cartItems, 'message' => 'Cleared successfully']);
                break;
            default:
                http_response_code(400);
                echo json_encode(['message' => 'Invalid action']);
                break;
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method not supported']);
        break;
}