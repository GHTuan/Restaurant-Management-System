<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    #homepage-navbar li:hover{
      background-color: pink;
      border-radius: 5px;
    }
    #homepage-login li:hover{
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
            <a class="nav-link active" aria-current="page" href="index.php?controller=home">Home <i class="fa-solid fa-house"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=menu">Menu <i class="fa-solid fa-utensils"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=menu">Cart <i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=menu">Setting <i class="fa-solid fa-gear"></i></a>
          </li>

        </ul>
      </div>
      <ul class="navbar-nav mb-2 mb-lg-0" id="homepage-login">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?controller=login" style="margin-right: 10px;">Login <i class="fa-solid fa-user-tie"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="View/admin/">To Admin <i class="fa-solid fa-lock"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</body>

</html>