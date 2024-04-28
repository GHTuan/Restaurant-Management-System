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
        <div class="col-md-2 fs-5">
            <!-- Sidebar -->
            <div class="list-group ">
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center font-weight-bold py-5"><i class="fas fa-user me-3"></i> <!-- Icon -->Edit profile</a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center font-weight-bold py-5"><i class="fas fa-bell me-3"></i> <!-- Icon -->Notification</a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center font-weight-bold py-5"><i class="fas fa-lock me-3"></i> <!-- Icon -->Security</a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center font-weight-bold py-5"><i class="fas fa-paint-brush me-3"></i> <!-- Icon -->Appearance</a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-center align-items-center font-weight-bold py-5"><i class="fas fa-question-circle me-3"></i> <!-- Icon -->Help</a>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-9">
        <h1 class="text-center mb-4">My Information</h1>
        <div class="product img d-flex justify-content-center align-items-center mb-4">
            <img id="productImage" src="View/Images/siuuu.png" alt="Avatar" class="rounded-circle" style="width: 250px; height: 250px;">
        </div>
        <form>
          <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName" class="form-label fw-bold">First Name:</label>
                <input type="text" id="firstName" class="form-control" placeholder="John" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName" class="form-label fw-bold">Last Name:</label>
                <input type="text" id="lastName" class="form-control" placeholder="Smith" required>
            </div>
          </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email:</label>
                <input type="email" id="email" class="form-control" placeholder="abc@example.com" required>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="birthday" class="form-label fw-bold">Birthday:</label>
                <input type="date" id="birthday" class="form-control" placeholder="" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="gender" class="form-label fw-bold">Gender:</label>
                <input type="text" id="gender" class="form-control" placeholder="" required>
            </div>
          </div>
            <div class="mb-3">
                <label for="address" class="form-label fw-bold">Address:</label>
                <input type="text" id="address" class="form-control" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="phoneno" class="form-label fw-bold">Phone Number:</label>
                <input type="number" id="phoneno" class="form-control" placeholder="" required>
            </div>
            <div class="mb-3">
                <label for="about" class="form-label fw-bold">About Me:</label>
                <textarea id="about" class="form-control" rows="4" maxlength="10000"></textarea>
            </div>
            <div class="mb-3 text-center">
              <button type="submit" id="submitBtn" class="btn btn-primary btn-lg">Save</button>
              <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
            </div>
        </form>
    </div>
    
</body>
</html>