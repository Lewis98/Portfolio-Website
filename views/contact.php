<?php

    $posted = false;
    if (!empty($_POST)){
        $posted = true;
    

        $sendTo = "lewis.stokes98@gmail.com";

        try {
            mail(

                $sendTo, 

                "Website enquiry from " . htmlspecialchars($_POST["name"]) . " at " . htmlspecialchars($_POST["contact"]),

                htmlspecialchars($_POST["subject"]) . "/r/n" . htmlspecialchars($_POST["msg"])
            );
        } catch (Exception $e) {
            header('Location: /500');
            die();
        }

    };



?>

<img id="backimg" src="resources/img/back1.jpg" alt=""/>

<div id="cont-success-container" class="center-contents container <?php 
    if ($posted) {echo "fade";}else{echo "hidden";}; 
?>">
    <div id="cont-success-msg">
        <h1>Thank you!</h1>
        <p>
            Thanks for your interest.<br>
            I aim to respond to all messages within 24 hours.<br>
        </p>
    </div>
</div>

<div class="center-contents container">
    <H1> Also find me on: </h1>
    <div class="flex-container">

        <a class="contact-btn-lnk" href="https://www.linkedin.com/in/lewis-stokes-b166911a0">
            <img src="resources/img/Contact/LI-In-Bug.png" alt="Linkedin" class="contact-btn">
        </a>

        <a class="contact-btn-lnk" href="https://github.com/Lewis98">
            <img src="resources/img/Contact/GitHub-Mark-Light-120px-plus.png" alt="Github" class="contact-btn">
        </a>

        <a class="contact-btn-lnk" href="https://www.facebook.com/lewis.stokes.79">
            <img src="resources/img/Contact/f_logo_RGB-Blue_1024.png" alt="Facebook" class="contact-btn">
        </a>

        <a class="contact-btn-lnk" href="https://www.instagram.com/lewisstokes7/">
            <img src="resources/img/Contact/Instagram_AppIcon_Aug2017.png" alt="Instagram" class="contact-btn">
        </a>

    </div>

    <div class="container center-contents">
        <H1> Or get in contact below: </h1>
        
        <div class="form-cont">
            <form action="/Contact" method="post" id="contactForm">
                <div class="form-item">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <br>
                <div class="form-item">
                    <label for="contact">Contact info:</label>
                    <input type="text" id="contact" name="contact" placeholder="Email or Phone number" required>
                </div>
                <br>
                <div class="form-item">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <br>
                <div class="form-item">
                    <label for="msg" id="txtarealbl">Message:</label>
                    <textarea  form="contactForm" id="msg" name="msg" required></textarea>
                </div>
                <br>
                <input type="submit" value="Submit">

            </form>
        </div>
    </div>

</div>
