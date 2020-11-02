<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Contact Us</a>
                </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="form-color">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="" method="post">
                            <fieldset>
                                <legend class="text-center">Contact us</legend>
                        
                                <!-- Name input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Name</label>
                                    <div class="col-md-9">
                                        <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                                    </div>
                                </div>
                        
                                <!-- Email input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Your E-mail</label>
                                    <div class="col-md-9">
                                        <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                                    </div>
                                </div>
                        
                                <!-- Message body -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="message">Your message</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                                    </div>
                                </div>
                        
                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-left">
                                        <button type="email" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
            </div>
        </div>
        <?php
            if (isset($_POST['email'])) {

                // EDIT THE 2 LINES BELOW AS REQUIRED
                $email_to = "randommanga2020@gmail.com";
                $email_subject = "New form submissions";

                function problem($error)
                {
                    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
                    echo "These errors appear below.<br><br>";
                    echo $error . "<br><br>";
                    echo "Please go back and fix these errors.<br><br>";
                    die();
                }

                // validation expected data exists
                if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message']) ) {
                    problem('We are sorry, but there appears to be a problem with the form you submitted.');
                }

                $name = $_POST['name']; // required
                $email = $_POST['email']; // required
                $message = $_POST['message']; // required

                $error_message = "";
                $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

                if (!preg_match($email_exp, $email)) {
                    $error_message .= 'The Email address you entered does not appear to be valid.<br>';
                }

                $string_exp = "/^[A-Za-z .'-]+$/";

                if (!preg_match($string_exp, $name)) {
                    $error_message .= 'The Name you entered does not appear to be valid.<br>';
                }

                if (strlen($message) < 2) {
                    $error_message .= 'The Message you entered do not appear to be valid.<br>';
                }

                if (strlen($error_message) > 0) {
                    problem($error_message);
                }

                $email_message = "Form details below.\n\n";

                function clean_string($string)
                {
                    $bad = array("content-type", "bcc:", "to:", "cc:", "href");
                    return str_replace($bad, "", $string);
                }

                $email_message .= "Name: " . clean_string($name) . "\n";
                $email_message .= "Email: " . clean_string($email) . "\n";
                $email_message .= "Message: " . clean_string($message) . "\n";

                // create email headers
                $headers = 'From: ' . $email . "\r\n" .
                    'Reply-To: ' . $email . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                @mail($email_to, $email_subject, $email_message, $headers);
        ?>
            <h1>Success</h1>
        <?php
            }
        ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>