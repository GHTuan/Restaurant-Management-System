<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    #homepage-navbar li:hover{
      background-color: pink;
      border-radius: 5px;
      padding-left: 10px;
    }
    #homepage-login div{
      height: 100%;
      box-sizing: border-box;
      padding: 6px;
    }
    #homepage-login div:hover{
      background-color: aquamarine;
      border-radius: 5px;
    }
  </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top d-flex flex-row-reverse" style="
      padding: 0;
      top: 10px;
      right: 0;
      position: fixed;
      font-size: 15px;
    ">
      <div class="container-fluid" style="
          margin: 0;
          background-color: rgba(218, 240, 247, 0.8);
          width: 80vw;
          padding: 3px 20px;
          border-radius: 10px;
      ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="padding: 0 10px;">
          <span class="navbar-toggler-icon" style="width: 18px;"></span>
        </button>
        <a class="navbar-brand" href="#" style="font-size: 15px; font-weight: bold;";>User Navbar</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="homepage-navbar">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=home"><i class="fa-solid fa-house"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=menu"><i class="fa-solid fa-utensils"></i> Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=menu"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=menu"><i class="fa-solid fa-gear"></i> Setting</a>
          </li>

        </ul>
      </div>
      <div id="homepage-login" class="d-flex p-0">
        <div>
          <a class="nav-link active" aria-current="page" href="index.php?controller=login" style="margin-right: 10px;"><i class="fa-solid fa-user-tie"></i> Login</a>
        </div>
        <div>
          <a class="nav-link active" href="View/admin/"><i class="fa-solid fa-lock"></i> To Admin</a>
        </div>
      </div>
    </div>
  </nav>
</body>

</html>