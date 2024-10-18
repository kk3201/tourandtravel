<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>
</<html>
    <head>
        <title>title</title>
    </head>
    <body>
    <?php
session_start();

if(session_destroy())
	echo "<script>alert('Logout Succesfully!');window.location.replace('Login.php');</script>";
?>

    </body>
</html>

