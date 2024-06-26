<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>User</title>
</head>
<?php
    require ('View/user/layouts/navbar.php'); 
    // print_r($data)
?>
<body>
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-2">
            <div class="product img d-flex justify-content-center align-items-center mb-4">
                <img id="productImage1" src="View/Images/sale_1.png" alt="Pizza Sale" class="img-fluid">
            </div>
            <div class="product img d-flex justify-content-center align-items-center mb-4 ">
                <img id="productImage2" src="View/Images/sale_2.png" alt="Coffee Sale" class="img-fluid">
            </div>
        </div> 
        <div class="col-md-1"></div>
        <div class="col-md-6">      
        <div>
            <?php
            if ($notification)
                // echo "<div class='alert alert-primary' role='alert'>";
                echo ($notification);
                // echo "</div>";
            ?>  
            <h1 class="text-center mb-4">My Information</h1>
        </div>
        <div class="product img d-flex justify-content-center align-items-center mb-4">
            <img id="productImage" src="<?php echo $data['Avatar']?>" alt="Avatar" class="rounded-circle" style="width: 250px; height: 250px;">
        </div>
        <form action= "index.php?controller=user&action=edit" method="POST">
          <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName" class="form-label fw-bold">First Name:</label>
                <input type="text" id="firstName" name="firstName" class="form-control" value="<?php echo $data['Name']?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName" class="form-label fw-bold">Last Name:</label>
                <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo $data['LastName']?>" required>
            </div>
          </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $data['Email']?>" required>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
            <label for="phoneno" class="form-label fw-bold">Phone Number:</label>
                <input type="number" id="phoneno" name="phoneno" class="form-control" value="<?php echo $data['Phoneno']?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="gender" class="form-label fw-bold">Gender:</label>
                <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $data['Gender']?>" required>
            </div>
          </div>
            <div class="mb-3">
                <label for="address" class="form-label fw-bold">Address:</label>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo $data['Address']?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label fw-bold">Avatar:</label>
                <input type="text" id="avatar" name="avatar" class="form-control" value="<?php echo $data['Avatar']?>" required>
            </div>
            <div class="mb-3 text-center">
              <button type="submit" id="submitBtn" class="btn btn-primary btn-lg">Save</button>
              <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
            </div>
        </form>
        
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-2 text-center">

        <div class="arrange-unit__09f24__rqHTg yelp-emotion-1iy1dwt">
            <div class=" yelp-emotion-1hj76qr">
                <h3 class="yelp-emotion-i7hfd5 fs-5 text-center">Frequently Asked Question</h3>
                <ul class=" list__09f24__ynIEd text-center">
                    <li class="list-group-item yelp-emotion-1iy1dwt"><a href="https://www.youtube.com/shorts/kQyCp9zOBk4" class="yelp-emotion-op9593">
                        <div class="arrange__09f24__LDfbs gutter-2__09f24__CCmUo vertical-align-middle__09f24__zU9sE yelp-emotion-1iy1dwt">
                            <div class="arrange-unit__09f24__rqHTg arrange-unit-fill__09f24__CUubG yelp-emotion-1dgdgwt">
                                <p class=" yelp-emotion-v293gj ">Change my password</p>
                            </div>
                            </div></a>
                    </li>
                    <li class="list-group-item yelp-emotion-1iy1dwt"><a href="https://www.youtube.com/shorts/kQyCp9zOBk4" class="yelp-emotion-op9593">
                        <div class="arrange__09f24__LDfbs gutter-2__09f24__CCmUo vertical-align-middle__09f24__zU9sE yelp-emotion-1iy1dwt">
                                <div class="arrange-unit__09f24__rqHTg arrange-unit-fill__09f24__CUubG yelp-emotion-1dgdgwt">
                                    <p class=" yelp-emotion-v293gj">Delete your account</p>
                            </div>
                            </div></a>
                    </li>
                    <li class="list-group-item yelp-emotion-1iy1dwt"><a href="https://www.youtube.com/shorts/kQyCp9zOBk4" class="yelp-emotion-op9593">
                        <div class="arrange__09f24__LDfbs gutter-2__09f24__CCmUo vertical-align-middle__09f24__zU9sE yelp-emotion-1iy1dwt">
                            <div class="arrange-unit__09f24__rqHTg arrange-unit-fill__09f24__CUubG yelp-emotion-1dgdgwt">
                                <p class=" yelp-emotion-v293gj">Signin option</p>
                            </div>
                        </div></a>
                    </li>
                    <li class="list-group-item yelp-emotion-1iy1dwt"><a href="https://www.youtube.com/shorts/kQyCp9zOBk4" class="yelp-emotion-op9593">
                        <div class="arrange__09f24__LDfbs gutter-2__09f24__CCmUo vertical-align-middle__09f24__zU9sE yelp-emotion-1iy1dwt">
                            <div class="arrange-unit__09f24__rqHTg arrange-unit-fill__09f24__CUubG yelp-emotion-1dgdgwt">
                                <p class=" yelp-emotion-v293gj">Contact administrator</p>
                            </div>
                        </div></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="arrange-unit__09f24__rqHTg yelp-emotion-1iy1dwt mt-5 mb-5">
            <div class=" yelp-emotion-1hj76qr">
                <h3 class="yelp-emotion-i7hfd5 fs-5 text-center">Additional Information</h3>
                <ul class=" list__09f24__ynIEd text-center">
                    <li class="list-group-item yelp-emotion-1iy1dwt"><a href="https://www.youtube.com/shorts/kQyCp9zOBk4" class="yelp-emotion-op9593">
                        <div class="arrange__09f24__LDfbs gutter-2__09f24__CCmUo vertical-align-middle__09f24__zU9sE yelp-emotion-1iy1dwt">
                            <div class="arrange-unit__09f24__rqHTg arrange-unit-fill__09f24__CUubG yelp-emotion-1dgdgwt">
                                <p class=" yelp-emotion-v293gj ">Terms & Conditions</p>
                            </div>
                            </div></a>
                    </li>
                    <li class="list-group-item yelp-emotion-1iy1dwt"><a href="https://www.youtube.com/shorts/kQyCp9zOBk4" class="yelp-emotion-op9593">
                        <div class="arrange__09f24__LDfbs gutter-2__09f24__CCmUo vertical-align-middle__09f24__zU9sE yelp-emotion-1iy1dwt">
                                <div class="arrange-unit__09f24__rqHTg arrange-unit-fill__09f24__CUubG yelp-emotion-1dgdgwt">
                                    <p class=" yelp-emotion-v293gj">Privacy Policy</p>
                            </div>
                            </div></a>
                    </li>
                    <li class="list-group-item yelp-emotion-1iy1dwt"><a href="https://www.youtube.com/shorts/kQyCp9zOBk4" class="yelp-emotion-op9593">
                        <div class="arrange__09f24__LDfbs gutter-2__09f24__CCmUo vertical-align-middle__09f24__zU9sE yelp-emotion-1iy1dwt">
                            <div class="arrange-unit__09f24__rqHTg arrange-unit-fill__09f24__CUubG yelp-emotion-1dgdgwt">
                                <p class=" yelp-emotion-v293gj">Our Co-founder</p>
                            </div>
                        </div></a>
                    </li>
                    <li class="list-group-item yelp-emotion-1iy1dwt"><a href="https://www.youtube.com/shorts/kQyCp9zOBk4" class="yelp-emotion-op9593">
                        <div class="arrange__09f24__LDfbs gutter-2__09f24__CCmUo vertical-align-middle__09f24__zU9sE yelp-emotion-1iy1dwt">
                            <div class="arrange-unit__09f24__rqHTg arrange-unit-fill__09f24__CUubG yelp-emotion-1dgdgwt">
                                <p class=" yelp-emotion-v293gj">Donate Us</p>
                            </div>
                        </div></a>
                    </li>
                </ul>
            </div>
        </div>    

    <div class="product img d-flex justify-content-center align-items-center mb-4">
        <img id="productImage3" src="View/Images/sale_3.png" alt="Weekend Sale" class="img-fluid" style="width: 100%; height: 100%;">
    </div>

    </div> 
    
</body>
</html>