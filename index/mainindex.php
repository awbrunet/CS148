<!DOCTYPE html>
<html lang="en">
<head>
<title>CS 148</title>
<meta charset="utf-8">
<meta name="author" content="Aaron Brunet">
<meta name="description" content="Main index for CS148 Assignment 4">


<!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
<![endif]-->
    
</head>

<?php

$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
$path_parts = pathinfo($phpSelf);
print '<body id="' . $path_parts['filename'] . '">';

?>

<h1>CS148 Main Index</h1>
<h2>Aaron Brunet</h2>

<p><a href="../cs148/assignment1.0/tables.php">Assignment 1.0: tables.php</a></p>
<p><a href="../cs148/assignment1.0/"><i>Assignment folder</i></a></p>


<p><a href="../cs148/assignment2.0/select.php">Assignment 2.0: select.php</a></p>
<p><a href="../cs148/assignment2.0/"><i>Assignment folder *NO PERMISSIONS*</i></a></p>
   

<p><a href="../cs148/assignment3.0/join.php">Assignment 3.0: join.php</a></p>
<p><a href="../cs148/assignment3.0/"><i>Assignment folder *NO PERMISSIONS*</i></a></p>

<p><a href="../cs148/assignment4.0/er.php">Assignment 4.0: er.php</a></p>
<p><a href="../cs148/assignment4.0/"><i>Assignment folder</i></a></p>

