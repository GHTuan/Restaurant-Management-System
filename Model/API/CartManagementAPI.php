<?php
if ($_SESSION['Role'] != 'admin') {
    http_response_code(401);
    echo json_encode(['message' => 'Unauthorized']);
    return;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (!isset($_GET['action'])) {
            http_response_code(400);
            echo json_encode(['message' => 'Action is required']);
            return;
        }
        break;
    case 'POST':
        if (!isset($_POST['action'])) {
            http_response_code(400);
            echo json_encode(['message' => 'Action is required']);
            return;
        }
        switch ($_POST['action']) {
            case 'getAllCarts':
                require_once('Model/CartModel.php');
                $cartModel = new CartModel();
                $data = $cartModel->getAll();
                echo json_encode(['data' => $data, 'message' => 'Success']);
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
