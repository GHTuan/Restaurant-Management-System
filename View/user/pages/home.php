<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Home</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            max-width: 100%;
        }
        img{
            object-fit: cover;
        }

        @media screen and (max-width: 600px) {
            #header-2{
                display: none !important;
            }            
        }
    </style>
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