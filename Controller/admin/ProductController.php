<?php

require_once('Controller/BaseController.php');

class ProductController extends BaseController{
    private $productModel;

    function __construct() {
        $this -> loadModel('ProductModel');
        $this->productModel = new ProductModel();
    }

    public function index(){
        $data = $this -> productModel->getAll();
        return $this -> view('admin.pages.product',[
            'data' => $data
        ]);
    }
}
?>