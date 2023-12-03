<?php

$secretKey = "6Ley6y8lAAAAABb1UkQxarBfR-M9asZm79HGl6dv";

if (isset($_POST['submit'])) {
    $captcha = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $secretKey,
        'response' => $captcha
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ),
    );

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $json = json_decode($response, true);

    if (empty($captcha)) {
        // reCAPTCHA failed
        $to = "mehresyd@sydneymehre.com";
        $subject = "Contact Form Submission - reCAPTCHA verification failed";
        $message = "An attempt was made to access your contact form, but reCAPTCHA verification failed.";
        mail($to, $subject, $message);
        exit("Error: reCAPTCHA verification failed. Please try again.");
    } 
    else {
        // reCAPTCHA succeeded
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $selectSubject = $_POST['selectSubject'];
        $comment = $_POST['comment'];

        date_default_timezone_set('America/Chicago');
        $date = date('m/d/Y');

        //  set content-type when sending HTML email
        $headers = 'MIME-Version: 1.0' . "\r\n" .
        'Content-type:text/html;charset=UTF-8' . "\r\n" .
        'From: <mehresyd@sydneymehre.com>' . "\r\n" .
        'Reply-To: $email' . "r\n";

        // Send confirmation email to user
        $to = $email;
        $subject = "Savannah's Coffee Form Submission";
        $message = "
        <html>
        <head>
        <title>Confirmation</title>
        <link rel='stylesheet' href='style.css'>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        </head>
        <body>
            <div>
            <header style='padding: 10px 0;'>
            <img src='http://sydneymehre.com/home/wdv341/projectContactForm/images/Untitled-1.png' width='130px;' style='display: block; margin: auto;' alt=\"Savannahs Coffee Co. logo\">
            <h4 style='color: #d4b666; text-transform: uppercase; font-family: barlow, sans-serif; font-weight: 300; text-align: center'>Savannahs Coffee Co.</h4>
            </header>
            <main>
            <div style='font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif; font-size: 1em; padding-top: 0.5em; text-align: center'>
                <p style='font-size: 16px;'>Hello $firstName $lastName,</p>
                <p style='font-size: 16px;'>Thank you for submitting your information through Savannah's Coffee contact form on $date concerning the subject of $selectSubject.</p>
                <p style='font-size: 16px;'>We have recieved your message and will respond back to you as soon as possible through $email.</p>
                <p style='font-size: 16px;'>You have shared the following comment which we will review:</p>
                <p style='font-size: 16px;'>$comment</p>

                <p style='font-size: 16px;'>We thank you for reaching out to us and your support.</p>
                <p style='font-size: 16px;'>Savannah's Coffee Co.</p>
                <br>
            </div>
            </main>
            <hr style='backgroundColor: #d4b666; max-width: 40%; margin-left: 30%;'>
            <div class=\"end\" style='text-align: center; color:#d4b666; text-transform: uppercase; font-family: barlow, sans-serif; font-weight: 300;'>
                <h3>Stop by Savanna's Coffee House Today and be one of the first to hear about our special offers and events!</h3>
                <a href=\"#\" style='color: black; text-decoration: none; font-size: 16px;'>Subscribe</a>
            </div>
            <div class=\"lower-content\" style='text-align: center; color:#d4b666; text-transform: uppercase; font-family: barlow, sans-serif; font-weight: 300;'>
                <h2>Savanna's Coffee</h2>
                <br>
                <h5>702-971-1154 | 604 24th Street St.Paul, Minnesota</h5><br>
                <p><a href='http://sydneymehre.com/home/wdv341/projectContactForm/projectContactForm.html' style='color: #d4b666; text-decoration: none; font-size: 16px;'>Savannah's Coffee Co</a></p>
                <div class=\"socials\">
                    <a href=\"#\"><img src='http://sydneymehre.com/home/wdv341/projectContactForm/images/facebook.png'  width='60px;' alt=\"facebook logo link\">
                        <a href=\"#\"><img src='http://sydneymehre.com/home/wdv341/projectContactForm/images/instagram.png' width='59px;' alt=\"instagram logo link\">
                </div>
            </div>
            <footer style='backgroundColor: black; color:white;'>
                <p>&copy Savanna's Coffee House 2023</p>
            </footer>
        </body>
        </html>
    ";

mail($to,$subject,$message,$headers); //sending to client

$to = 'mehresyd@sydneymehre.com';
$subject = "Contact Form Submission from $firstName $lastName";
$message = "Name: $firstName $lastName\nEmail: $email\nMobile: $mobile\nSubject: $selectSubject\nComment: $comment\nDate of Contact: $date";

mail($to, $subject, $message); //sending to myself

 
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savanna's Coffee</title>
    <meta keywords="Savanna, coffee house, cafe, coffee, contact, information">
    <meta description="A website featuring savanna's coffee house contact information.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="confirmationPage">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand nav-logo" href="#">Savanna's</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto  nav-form">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="projectContactForm.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="row container">
            <div class="section2">
                <h3>Thank you for filling out our form!</h3>
                <div class="paragraphs2">
                    <p>Hello
                        <?php echo $firstName?>
                        <?php echo $lastName; ?>.
                    </p>
                    <p>We have sucessfully recieved your information sent out on
                        <?php echo $date; ?>.
                    </p>
                    <p>Please check your email inbox as we have sent over a confirmation email to
                        <?php echo $email; ?>. If your confirmation email does not show up right away,
                        make sure to check your spam/junk inbox.
                    </p>
                    <p><strong><em>In the meantime</em></strong> - we will review your selection over the subject of
                        <?php echo $selectSubject;?> and any comments.
                    </p>
                    <p>We will get back to you as soon as possible!</p>
                    <p>Thank you for your support.</p>

                    <div class="bottom">
                        <p>Savannah's Coffee Co.</p>
                        <p><a href="./projectContactForm.html">Return to form</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="end">
        <h3>Stop by Savanna's Coffee House Today and be one of the first</h3>
        <h3>to hear about our special offers and events!</h3>
        <a href="#">Subscribe</a>
        <div class="gotop">
            <a href="#top">Go to Top</a>
        </div>
    </div>
    <!--closing end section-->

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
        <p>&copy Savanna's Coffee House 2023</p>
    </footer>
    <!--closing container-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>

</body>

</html>
