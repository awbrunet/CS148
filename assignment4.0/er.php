<!DOCTYPE html>
<html lang="en">
<head>
<title>CS 148 Assignment 4.0</title>
<meta charset="utf-8">
<meta name="author" content="Aaron Brunet">
<meta name="description" content="Assignment index for CS148 Assignment 4">


<!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
<![endif]-->
    
</head>


<?php

$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
$path_parts = pathinfo($phpSelf);
print '<body id="' . $path_parts['filename'] . '">';

?>

<p>Aaron Brunet | CS148 | Assignment 4.0</p>

<p><a href="datadictionary.php">Data Dictionary</a></p>
<p><a href="erd.pdf">E-R Diagram</a></p>
<p><a href="schema.sql">SQL Schema</a></p>

</body>
</html>