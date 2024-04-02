<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Home</title>
</head>
<?php
    require ('View/user/layouts/navbar.php'); 
?>
<body>
    <div>
        <?php
        require("home/header.php");
        ?>
    </div>
    <div>
        <?php
        require("home/aboutus.php");
        ?>
    </div>
    <div>
        <?php
        require("home/briefmenu.php");
        ?>
    </div>
    <div>
        <?php
        require("home/news.php");
        ?>
    </div>
    <div>
        <?php
        require("home/contact.php");
        ?>
    </div>
</body>
</html>
<?php
    require ('View/user/layouts/footer.php'); 
?>