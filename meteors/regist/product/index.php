<?php

$file = $_GET['page'];

function &PageGrab() {
	$returnArray = array(
		'body'            => '',
	);
	return $returnArray;
}

$page = PageGrab();

if( isset( $file ) )
	include( $file );
else {
	header( 'Location:?page=include.php' );
	exit;
}

?>



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

    <script>
        window.onload = function() {
            var typed = new Typed('.typing-effect', {
                strings: ["Let me tell you, ^700 a hero tells no lie.",
                    "I am a hero ^400 for tomorrow.",
                    "Many do not know that ^400.^400.^400.",
                    "I code HTML, ^400 CSS, ^400 and JS just like you.",
                    "... :p"
                ],
                typeSpeed: 50,
                backDelay: 1500,
                loop: 1
            });
        }
    </script>

</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-3 offset-md-1">
                    <img class="rounded-circle w-50 mx-auto d-block" src="images/wiro.jpg"> </div>
                <div class="col-md-8">
                    <h1>Wiro Sableng</h1>
                    <h2><span class="typing-effect"></span></h2>
                    <p>Well, I am a hero of finggers and working as a softwaredeveloper.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">



            <div class="col-md-3">
                <h3>Lastest status</h3>
                <p class="font-weight-bold">
              
                </p>
                <p><span class="small font-italic">
                         </span>
                </p>
            </div>

            <p class="font-weight-bold">Learning new stuff, PHP. It looks cool.</p>
            <p><span class="small font-italic">
                    24 09 2018 04:37:45.</span></p>
        </div>


        <div class="col-md-5">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid rounded-circle" src="images/apple.jpg">
                </div>
                <div class="col-md-8">
                    <h3>Most voted fruit</h3>
                    <p><span>Apple</span> is the most voted fruit. The latin
                        name of this fruit is <i><span>Malus</span></i>.
                        We can find this kind of fruit in <span>Green &
                            Red</span>. It gets <span>30</span> votes.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid rounded-circle" src="images/cherry.jpg">
                </div>
                <div class="col-md-8">
                    <h3>Cherry <span class="badge badge-primary">New</span></h3>
                    <p>Welcome to the competition! The latin name of this
                        fruit is <i><span>Malus</span></i>.
                        We can find this kind of fruit in <span>Green &
                            Red</span>.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>