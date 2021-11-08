<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="CSSFiles/Contact.css">
    
    <title>Kids Corner Contact</title>
</head>
<body>
    <?php
        include('header.php');
    ?>
    <div class="Home-path">
        <p><a href="index.html">Home</a> / Contact Us</p>
    </div>
    <figure class="figure">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3377.6327001869886!2d74.20753551512179!3d32.16020928116256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391f2a045b8c9d93%3A0xe65f1749f58a41b3!2sMiran%20Jee%20Plaza!5e0!3m2!1sen!2s!4v1613209810300!5m2!1sen!2s" width="100%" height="530" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </figure>
    <div class="Page1">
        <h1>Get In Touch</h1>
        <input type="text" placeholder="Name*">
        <input type="text" placeholder="Email*">
        <input type="Subject" placeholder="Subject (Optional)">
        <input type="Message" placeholder="Message">
        <p><a href="#">Send Message</a></p>
    </div>
    <?php
        include('Footer.php');
        include('js.php');
    ?>
</body>
</html>