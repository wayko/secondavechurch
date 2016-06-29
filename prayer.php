<?php
$name = $_POST['namep'];
$email = $_POST['emailp'];
$phone = $_POST['subjectp'];
$job = $_POST['messagep'];


$to = "info@sevangelic.com";
$subject = "Prayer Request";
$message = "On " . $today . " " . $name . " have requested for a prayer request. Their email address is " . $email;
mail($to, $subject, $message);


$subject = "Thank you for contacting us.";
$message = "We have received your prayer request. God Bless.";
mail($email, $subject, $message);

?>