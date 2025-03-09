<?php
# define a recipient email CONSTANT
define('RECIPIENT','carlinogiovanni04@gmail.com');

$name		= $_POST['name'];
$email		= $_POST['email'];
$message	= $_POST['message'];


$body		= $message."\n\n";
$body		.=$name."<$email>"." This is sent from the portfolio website.";
$headers	="From: $name<$email>";


if (mail(RECIPIENT, $headers, $body)) {
	echo 'success';
} else {
	echo 'fail';
}