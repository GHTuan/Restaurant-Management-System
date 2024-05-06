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
    // print_r($cartlist);
    // print_r($userlist);
    ?>
    <style>
        @media screen and (max-width: 600px) {
            body>div>div {
                display: flex;
                flex-direction: column;
            }

            body>div::nth-child(3) .bg-black {
                display: none;
            }

        }
    </style>

</head>

<body>
    <div class="m-2">
        <h2 class="text-uppercase fw-800 ms-4">Welcome, <?php echo $admininfo['Name'] ?></h2>
        <div class="flex d-flex justify-content-md-between m-2">

            <div class="card m-3 bg-warning bg-gradient" style="width: 20rem;">
                <div class="card-body justify-content-center">
                    <h5 class="card-title m-2"><?php echo $usercount['NumberOfUser'] ?> Users </h5>
                    <p class="card-text m-2">Number of customer have account on your restaurant</p>
                </div>
            </div>
            <div class="card  m-3  bg-success bg-gradient" style="width: 20rem;">
                <div class="card-body justify-content-center ">
                    <h5 class="card-title m-2"> <?php echo  $productcount['NumberOfProduct']   ?> Products </h5>
                    <p class="card-text m-2">Number of product you are having</p>
                </div>
            </div>
            <div class="card m-3 bg-info bg-gradient" style="width: 20rem;">
                <div class="card-body justify-content-center ">
                    <h5 class="card-title m-2"><?php echo  $cartcount['NumberOfCart'] ?> Carts </h5>
                    <p class="card-text m-2">Number of cart been and being used</p>
                </div>
            </div>
        </div>
        <div class="flex d-flex w-100 justify-content-start">
            <div class="m-3 flex-grow-1">
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
                                <th> Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($cartlist as $key => $value) {
                                echo "<tr>";
                                echo "<td>" . $value['Username'] . "</td>";
                                echo "<td>" . $value['CartID'] . "</td>";
                                if ($value['ExportDate']) {
                                    echo "<td>" . $value['ExportDate'] . "</td>";
                                } else {
                                    echo "<td>" . "In Order" . "</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-black" style="width:1px">
            </div>
            <div class="m-3 flex-grow-1">
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
                            <?php
                            foreach ($userlist as $key => $value) {
                                echo "<tr>";
                                echo "<td>" . $value['Username'] . "</td>";
                                echo "<td>" . $value['UserID'] . "</td>";
                                if ($value['AccessLevel'] == 1) {
                                    echo "<td>" . "Unrestricted" . "</td>";
                                } else {
                                    echo "<td>" . "Blocked" . "</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>