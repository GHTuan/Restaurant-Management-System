<!DOCTYPE html>
<html lang="en">

<body>
    <nav class="navbar navbar-expand-lg sticky-top d-flex flex-row-reverse" style="
      padding: 0;
      top: 10px;
      right: 0;
      position: fixed;
      font-size: 15px;
    ">
      <div class="container-fluid p-1" style="
          margin: 0;
          background-color: #daf0f7;
          width: 80vw;
      ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="padding: 0 10px;">
          <span class="navbar-toggler-icon" style="width: 18px;"></span>
        </button>
        <a class="navbar-brand" href="#" style="font-size: 15px; font-weight: bold;";>User Navbar</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=menu">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=menu">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?controller=menu">Setting</a>
          </li>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="View/admin/">To Admin</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </ul>
      </div>
      <a class="nav-link active" aria-current="page" href="index.php?controller=login" style="margin-right: 10px;">Login <i class="fa-solid fa-user-tie"></i></a>
    </div>
  </nav>
</body>

</html>