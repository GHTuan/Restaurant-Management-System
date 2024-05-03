<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
<?php
    require ('View/user/layouts/navbar.php'); 
?>
    <style>
        /* CSS for layout */
        body {
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }

        header {
            background-color: white; /* Change background color to white */
            color: black; /* Black text color for header */
            padding: 20px; /* Add padding to header for spacing */
            text-align: center; /* Center align text within header */
            margin-bottom: 15px; /* Add margin to create space below header */
        }

        header h1 {
            font-size: 24px; /* Increase font size of header text */
            margin-bottom: 15px; /* Add margin to create space below header text */
        }

        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            display: flex; /* Make the tab buttons flex container */
            justify-content: center; /* Center align the tab buttons */
            position: relative; /* Position relative for dot placement */
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Dot below active tab */
        .dot {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            height: 4px;
            width: 4px;
            background-color: #000;
            border-radius: 50%;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        /* Container for boxes */
        .container {
            display: flex; /* Display boxes horizontally */
            flex-wrap: wrap; /* Allow boxes to wrap to the next line */
            margin: 0 -5px; /* Compensate for negative margin from spacing */
        }

        /* Individual box */
        .box {
            width: calc(33.33% - 10px); /* Adjusted width to 33.33% */
            background-color: brown;
            color: white;
            padding: 10px;
            margin: 5px; /* Add margin around each box */
            box-sizing: border-box;
            border-radius: 10px; /* Rounded corners */
            overflow: hidden; /* Hide overflow content */
        }

        .box .image-container {
            margin: 0 -10px; /* Add margin to create space on the sides */
        }

        .box .image-container img {
            width: calc(100% + 20px); /* Adjusted width to fill the box */
            height: auto;
            border-radius: 10px 10px 0 0; /* Rounded top corners */
            margin: -10px; /* Compensate for the negative margin */
        }

        .box p {
            text-align: center; /* Center-align text */
            margin: 10px 0; /* Add margin around the text */
        }

        /* Order button */
        .order-button {
            display: block;
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 auto;
            width: 80%; /* Adjust the width as needed */
        }

        .order-button:hover {
            background-color: #45a049; /* Darker green */
        }

        /* For responsiveness */
        @media (max-width: 768px) {
            header h1 {
                font-size: 20px; /* Adjust font size for smaller screens */
            }
            .tab button {
                font-size: 14px; /* Adjust font size for smaller screens */
                padding: 10px 12px; /* Adjust padding for smaller screens */
            }
            .box {
                width: calc(50% - 10px); /* Adjust box width for smaller screens */
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Choose a Type of Food:</h1>
        <div class="tab">
            <button class="tablinks" onclick="openMenu(event, 'salads')">Salads</button>
            <button class="tablinks" onclick="openMenu(event, 'warm_bowls')">Warm Bowls</button>
            <button class="tablinks" onclick="openMenu(event, 'sides')">Sides</button>
            <div class="dot"></div> <!-- Dot for indicating selected tab -->
        </div>
    </header>
    
    <!-- Tab content -->
    <div id="salads" class="tabcontent">
        <div class="container">
            <div class="box">
                <div class="image-container">
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image">
                </div>
                <div>
                    <p>KALE CAESAR</p>
                    <p>
                        Roasted chicken, tomatoes, parmesan crisps, shaved parmesan, shredded kale, chopped romaine, lime sqeeze, caesar
                    </p>
                    <a href="#" class="order-button">Order Now -></a>
                </div>
            </div>
            <div class="box">
                <div class="image-container">
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image">
                </div>
                <div>
                    <p>ARUGULA & STRAWBERRY</p>
                    <p>
                        Arugula, strawberries, goat cheese, toasted almonds, mint, balsamic vinaigrette
                    </p>
                    <a href="#" class="order-button">Order Now -></a>
                </div>
            </div>
            <div class="box">
                <div class="image-container">
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image">
                </div>
                <div>
                    <p>SPINACH & BACON</p>
                    <p>
                        Spinach, bacon, hard boiled egg, red onion, mushroom, tomato, warm bacon vinaigrette
                    </p>
                    <a href="#" class="order-button">Order Now -></a>
                </div>
            </div>
        </div>
    </div>

    <div id="warm_bowls" class="tabcontent">

        <div class="container">
            <div class="box">
                <div class="image-container">
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image">
                </div>
                <div>
                    <p>GUACAMOLE GREENS</p>
                    <p>Roasted chicken, avocado, tomatoes, red onions, shredded cabbage, tortilla chips, spring mix, chopped romaine, lime squeeze, lime cilantro jalapeno vinaigrette</p>
                    <a href="#" class="order-button">Order Now -></a>
                </div>
            </div>
            <div class="box">
                <div class="image-container">
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image">
                </div>
                <div>
                    <p>SPICY THAI</p>
                    <p>Grilled chicken, quinoa, carrots, red cabbage, cucumber, edamame, green onion, cilantro, spicy thai peanut sauce</p>
                    <a href="#" class="order-button">Order Now -></a>
                </div>
            </div>
            <div class="box">
                <div class="image-container">
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image">
                </div>
                <div>
                    <p>SHRIMP & AVOCADO</p>
                    <p>Spiced shrimp, avocado, quinoa, black beans, red cabbage, shredded carrots, cilantro, lime squeeze, creamy avocado dressing</p>
                    <a href="#" class="order-button">Order Now -></a>
                </div>
            </div>
        </div>
    </div>

    <div id="sides" class="tabcontent">

        <div class="container">
            <div class="box">
                <div class="image-container">
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image">
                </div>
                <div>
                    <p>ROASTED BROCCOLI</p>
                    <p>
                        Olive oil, garlic, sea salt, lemon zest
                    </p>
                    <a href="#" class="order-button">Order Now -></a>
                </div>
            </div>
            <div class="box">
                <div class="image-container">
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image">
                </div>
                <div>
                    <p>MEXICAN STREET CORN</p>
                    <p>
                        Grilled corn, cotija cheese, lime crema, cilantro, chili powder
                    </p>
                    <a href="#" class="order-button">Order Now -></a>
                </div>
            </div>
            <div class="box">
                <div class="image-container">
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image">
                </div>
                <div>
                    <p>POTATO WEDGES</p>
                    <p>
                        Roasted potato wedges, parmesan, parsley, sea salt, garlic aioli
                    </p>
                    <a href="#" class="order-button">Order Now -></a>
                </div>
            </div>
        </div>
    </div>


    <script>
        function openMenu(evt, menuName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(menuName).style.display = "block";
            evt.currentTarget.className += " active";
            // Position the dot below the active tab button
            var dot = document.querySelector('.dot');
            dot.style.left = evt.currentTarget.offsetLeft + (evt.currentTarget.offsetWidth / 2) - (dot.offsetWidth / 2) + 'px';
        }
    </script>
</body>
</html>
