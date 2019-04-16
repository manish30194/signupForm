<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Site</title>
</head>
<body>
    <form action="" method="POST">
        <label for="email"></label>
        <input type="text" id="email" name="email">
        <input type="submit" value="Subscribe">
    </form>
</body>
</html> -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#000000" />
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Welcome To Site</title>

      <!-- <script>

        function validateform()
    {
        var email = document.myForm.email.value;

        if (email == null || email == "")
        {

        alert("Email can't be blank");
        return false;
        }
    }

      </script> -->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Carousel CSS -->
    <!-- <link href="css/owl.carousel.min.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- Custom Style -->
    <link href="css/style1.css" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <!-- modal popup -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content clearfix">
                    <div class="modal-header pd-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body pd-0 flexContainer flex-v-center">
                      <div class="sideImage" style="background-image:url(images/lino.jpg)">
                      <!-- <img src="images/blue-bg.jpg"> -->
                      </div>
                        <div class="modalCotnent">
                            <h2>Sign up for our monthly mailers to stay updated on hospitality linen trends </h2>

                            <form name="myForm" action="" method="POST">

                                <div class="form-group">
                                    <label class="custom-checkbox">
                                        <!-- <input type="checkbox" name="check"> -->
                                        <span></span>
                                        Share your email below or call us on <b>+919910669546</b>
                                    </label>
                                <div class="input-wrapper relative">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" value="" placeholder="Enter Your Email">
                                    </div>
                                    <button type="submit" class="btn send-btn text-uppercase" >Send</button>
                                </div>
                            </form>
                            <div class="text-right p-t-15">
                                <a href="javascript:void(0)" class="noThanx-btn" data-dismiss="modal" aria-label="Close">No Thanks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal popup -->
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Carousel JS -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
        $(window).on('load',function(){
                $('#myModal').modal('show');
        });
    </script>

</body>

</html>


<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response_html = '';

// api key
// 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
if( isset($_POST['email']) && filter_var(($t_email = trim($_POST['email'])), FILTER_VALIDATE_EMAIL)) {
    require 'vendor/autoload.php';
    // require 'vendor/sendgrid/sendgrid/sendgrid-php.php';

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("manish@company.com", "Manish Sharma");
    $email->setSubject("Thank you for subscribing to our newsletter");
    $email->addTo($t_email, "Shaun Tesley");
    $email->addContent("text/html", file_get_contents('./template.html'));

    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        var_dump($response); die();
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
}

?>
