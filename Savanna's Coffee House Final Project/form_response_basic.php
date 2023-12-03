
<!doctype html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta keywords="Savanna, coffee house, cafe, coffee, contact, information, submission, forms">
    <meta description="A website that generates a users response form">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Savanna's Coffee</title>
    <!--Sydney Mehre 04/18/2022-->
		<style>
        .submit-form {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
        }
		.colorBrown {
			color: #d4b466;
		}

        h6 {
            text-align: center;
        }
		</style>
	</head>

<body>
	<div id="container">
	    <header>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
                <a class="navbar-brand" href="index.html">Savanna's</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.html">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="events.html">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="top-b">
        <img src="images/main-banner.jpg" height="270px" alt="banner image of food and savanna coffee logo">
        </div>
        <div class="heading">
            <h2>Savanna's Coffee</h2>
        </div>

<h6>RESULT WILL DISPLAY BELOW</h6>
<hr>
<div class="submit-form">
<p>&nbsp;</p>

<?php

echo "<p class='colorBrown'>We have successfully recieved your form, thank you! </p>";

//It will create a table and display one set of name value pairs per row
	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr class=colorRow>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";

?>
</div>
<hr>
    <div class="end">
        <h3>Stop by Savanna's Coffee House Today and be one of the first</h3>
        <h3>to hear about our special offers and events!</h3>
        <a href="#">Subscribe</a>
        <div class="gotop">
            <a href="#top">Go to Top</a>
        </div>
    </div><!--closing end section-->
    <div class="lower-content">
        <h2>Savanna's Coffee</h2>
        <br>
        <h5>702-971-1154 | 604 24th Street St.Paul, Minnesota</h5><br>
        <div class="socials">
            <a href="#"><img src="images/facebook.png" height="60px" alt="facebook logo link">
            <a href="#"><img src="images/instagram.png" height="60px" alt="instagram logo link">
         </div>
    </div>
    <footer>
        <p>Savanna's Coffee House | 2022</p>
    </footer>
    </div><!--closing container-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>