<?php

session_start();
$user_name = $_SESSION['user_name'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="particles.min.js"></script>
    <style>
    #particles-js{
        background:firebrick;
        height:100vh;
    }    
    body{
        margin : 0;
        padding : 0;
    }
    h1{
        position : fixed;
        top : 30vh;
        left : 30vw;
        color : white;
        font-size : 70px;
        font-family : ariel;
    }
    </style>
    <title>Main Page</title>
</head>
<body>
    <center>
        <h1>Welcome <?php echo $user_name ?></h1>
    </center>
    <div id="particles-js"></div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.2.3/particles.min.js"></script>
    <script>
        particlesJS.load('particles-js','particles.json',function(){ console.log('Loaded');});
    </script>
    
    
</body>
</html>