<?php
$name = $_POST['namec'];
$email = $_POST['emailc'];
$phone = $_POST['subjectc'];
$job = $_POST['messagec'];


$to = "info@sevangelic.com";
$subject = "Information have been requested";
$message = "On " . $today . " " . $name . " have requested for some information. Thier email address is " . $email;
mail($to, $subject, $message);


$subject = "Thank you for contacting us.";
$message = "We have received your request for information. We will contact you soon. God Bless.";
mail($email, $subject, $message);

?>