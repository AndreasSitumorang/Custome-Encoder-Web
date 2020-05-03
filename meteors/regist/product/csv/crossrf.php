<?php

$host = "localhost";
$dbname = "api_db3";
$username = "root";
$password = "";

$GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password, $dbname);
if (isset($_GET['submit'])) {
    // Get input
    $pass_new  = $_GET['password_new'];
    $pass_conf = $_GET['password_conf'];
    // echo ("jdbnsahjdnas");
    // Do the passwords match?
    if ($pass_new !== $pass_conf) {
        // echo ("success");
        // They do!
        // $pass_new = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"],  $pass_new) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
        // $pass_new = md5($pass_new);
        // UPDATE `users` SET cash = 1000 WHERE username = "andre"

        $insert = "UPDATE `users` SET cash = $pass_conf WHERE username = '$pass_new';";
        $result = mysqli_query($GLOBALS["___mysqli_ston"],  $insert) or die('<pre>' . mysqli_error($GLOBALS["___mysqli_ston"]) . '</pre>');
        // mysqli_query($GLOBALS["___mysqli_ston"],  $insert) or die('<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>');
        // echo ("success");

        // $html .= "<pre>Password Changed.</pre>";
    } else {
        // Issue with passwords matching
        echo ("error");
        // $html .= "<pre>Passwords did not match.</pre>";
    }

    ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}

?>

<!DOCTYPE html>
<html>

<body>
    <div class="jumbotron text-center">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
        <hr>
        <p>
            Having trouble? <a href="">Contact us</a>
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="https://bootstrapcreative.com/" role="button">Continue to homepage</a>
        </p>
    </div>
</body>

</html>