<?php

function &PageGrab()
{
    $returnArray = array(
        'title_separator' => ' :: ',
        'body'            => '',
        'page_id'         => '',
        'help_button'     => '',
        'source_button'   => '',
    );
    return $returnArray;
}

$page = PageGrab();
$page['title']   = 'Vulnerability: Cross Site Request Forgery (CSRF)';
$page['page_id'] = 'csrf';
$page['help_button']   = 'csrf';
$page['source_button'] = 'csrf';

$vulnerabilityFile = '';

$vulnerabilityFile = 'low.php';


?>

<!DOCTYPE html>
<html>

<head>
    <title>Transaction</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/typed.js"></script>
</head>

<body>


    <br>

    <title>Projectworlds Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">

    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/lifestyleStore.png">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <h1><b>Confirm the Transaction</b></h1>
                    <form action="crossrf.php" method="GET">
                        <div class="form-group">
                            <input type="text" class="form-control" AUTOCOMPLETE="off" placeholder="Name" name="username">
                        </div>
                        <div class="form-group">
                            <input type="username" class="form-control" name="password_new" placeholder="Username" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" AUTOCOMPLETE="off" name="password_conf" class="form-control" placeholder="Cash" required="true">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="contact" placeholder="Contact" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="city" placeholder="City" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address" required="true">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="transfer" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- <div class="body_padded">
        <h1>Vulnerability: Cross Site Request Forgery (CSRF)</h1>

        <div class="vulnerable_code_area">
            <h3>Change your admin password:</h3>
            <br />
            <form action="crossrf.php" method="GET">
                New password:<br />
                <input type="text" AUTOCOMPLETE="off" name="password_new"><br />
                Confirm new password:<br />
                <input type="text" AUTOCOMPLETE="off" name="password_conf"><br />
                <br />
                <input type="submit" value="Change" name="submit">
            </form>
        </div>
    </div> -->


</body>

</html>


<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wiro Sableng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/typed.js"></script>
</head>

<body>
    <br>

    <title>Projectworlds Store</title> -->
<!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<!-- latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"> -->
<!-- jquery library -->
<!-- <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script> -->
<!-- Latest compiled and minified javascript -->
<!-- <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/lifestyleStore.png"><!-- External CSS -->
<!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->


<!-- <div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <h1><b>SIGN UP</b></h1>
                    <form method="post" action="crossrf.php">
                        <!-- <div class="form-group"> pattern=".{6,}"
                            <input type="text" class="form-control" name="name" placeholder="Name" required="true"> pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                        </div> -->
<!-- <div class="form-group">
                            <input type="username" class="form-control" name="username" placeholder="Username" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cash" placeholder="Cashh" required="true">
                        </div> -->
<!-- <div class="form-group">
                            <input type="tel" class="form-control" name="contact" placeholder="Contact" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="city" placeholder="City" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address" required="true">
                        </div> -->
<!-- <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="transfer">
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
<!-- <br><br><br><br><br><br>
        <footer class="footer">
            <div class="container">
                <center>
                    <p>Copyright © <a href="https://projectworlds.in">Projectworlds</a> Store. All Rights Reserved.</p>
                    <p>This website is developed by Yugesh Verma</p>
                </center>
            </div>
        </footer>

    </div>

</body> -->

<!-- </html> -->