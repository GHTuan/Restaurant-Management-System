<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">

<?php
require('View/admin/layouts/navbar.php');
// print_r($admininfo)
// print_r($usercount)
// print_r($productcount);
// print_r($cartcount);
print_r($cartlist);
// print_r($userlist);
?>

</head>
<body>
    <div class="m-2">
        <h2>Wellcome, You</h2>
        <div class="flex d-flex justify-content-between m-2">
            <div class="card m-3 bg-warning bg-gradient" style="width: 20rem;">
            <div class="card-body justify-content-center">
                <h5 class="card-title m-2">Special title treatment</h5>
                <p class="card-text m-2">Number of customer have account on your restaurant</p>
            </div>
            </div>
            <div class="card  m-3  bg-success bg-gradient" style="width: 20rem;">
            <div class="card-body justify-content-center ">
                <h5 class="card-title m-2">Special title treatment</h5>
                <p class="card-text m-2">Number of product you are having</p>
            </div>
            </div>
            <div class="card m-3 bg-info bg-gradient" style="width: 20rem;">
            <div class="card-body justify-content-center ">
                <h5 class="card-title m-2">Special title treatment</h5>
                <p class="card-text m-2">Number of cart been and being used</p>
            </div>
            </div>
        </div>
        <div class="flex d-flex w-100" >
            <div class="h-25 w-50  m-3 ms-5 me-5">
                <div class="d-flex align-items-center justify-content-between"> 
                    <div>
                        <span>Recent carts</span>
                    </div>
                    <div>
                        <a href="index.php?controller=cart" class="btn btn-primary">View Cart</a>
                    </div>
                </div> 
                <div style="height:1px" class="bg-secondary m-2"></div>
                <div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Owner </th>
                            <th> Cart ID </th>
                            <th> Number of Item </th>
                            <th> Date </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> Owner </td>
                            <td> Cart ID </td>
                            <td> Number of Item </td>
                            <td> Date </td>
                        </tr>
                        <tr>
                            <td> Owner </td>
                            <td> Cart ID </td>
                            <td> Number of Item </td>
                            <td> Date </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-black" style="width:1px">
            </div>
            <div class="h-25 w-50 m-3 ms-5 me-5">
            <div class="d-flex align-items-center justify-content-between"> 
                    <div>
                        <span>Recent Register</span>
                    </div>
                    <div>
                        <a href="index.php?controller=user" class="btn btn-primary">View All User</a>
                    </div>
                </div> 
                <div style="height:1px" class="bg-secondary m-2"></div>
                <div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Custom Name </th>
                            <th> ID </th>
                            <th> Permission </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> Owner </td>
                            <td> Cart ID </td>
                            <td> Number of Item </td>
                        </tr>
                        <tr>
                            <td> Owner </td>
                            <td> Cart ID </td>
                            <td> Number of Item </td>
                        </tr>
                        </tbody>
                    </table>
                </div>              
            </div>
        <div>
    </div>
</body>
</html>