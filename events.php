<?php

require_once __DIR__.'/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=servicea.json');
  $SCOPES = array(
      Google_Service_Calendar::CALENDAR_READONLY
  );
  $REDIRECT_URI = 'http://' . $_SERVER['HTTP_HOST'] .'/secondavechurch/calendar3.php';
  try {
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
  $client->setAccessType('offline');
  $client->setApprovalPrompt ("force");
  $client->setRedirectUri($REDIRECT_URI);
  $client->setScopes($SCOPES);
 $service = new Google_Service_Calendar($client);
  
 $currentEvents = date('Y-m-d', strtotime(date('Y-m-1'))) . 'T00:00:00-23:59';
  $currentMonth = date('F');
  $currentYear = date('Y');
  $endDay = get_number_of_days_in_month(date('m'), $currentYear);
  $endOfMonth = date('Y-m-d', strtotime(date('Y-m-' . $endDay ))) . 'T00:00:00-23:59';
  
 $calendarId = 'wayko621@gmail.com';
 $optParams = array(
  'maxResults' => 100,
  'orderBy' => 'startTime',
   'singleEvents' => TRUE,
  'timeMin' => $currentEvents,
  'timeMax' => $endOfMonth
  
);
 $results = $service->events->listEvents($calendarId, $optParams);

 if (count($results->getItems()) == 0) {
  $Heading =  "No upcoming events found.\n";
} else {
  $Heading =  $currentMonth . " events:\n";
  
  echo "<div class='calendar'><h2> " . $Heading . "</h2></div>";
  foreach ($results->getItems() as $event) {
    $start = $event->start->dateTime;
	$description = $event->getDescription();
	$formattedDate = date_format(new DateTime($start),"F j, Y - G:i A");
	if (empty($description)){
		$description = "No Description";
	}
    if (empty($start)) {
      $start = 'All Day Event';
    }
	
   echo "<div class='calendar'><h1>" .$event->getSummary() . "</h1>  <h3 class='getdates'>" . $formattedDate . " </h3><br /><span class='description'>" . $description . "</span></div>";
  }
}


  }catch (Exception $e){
	  echo 'Caught Following Error '. $e->getMessage() . "\n";
  }
  
   function get_number_of_days_in_month($month, $year) {
    // Using first day of the month, it doesn't really matter
    $date = $year."-".$month."-1";
    return date("t", strtotime($date));
}
?>
<!DOCTYPE html>
<html ng-app="SACNYC">
<head>
<title>Second Avenue Church</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="js/ngCart/dist/ngCart.js" type="text/javascript"></script>
<script src="js/ui-bootstrap-tpls.min.js" type="text/javascript"></script>
<script src="js/app.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate/2.7.2/angular-translate.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-sanitize.js" type="text/javascript"></script>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="http://dreamcpu.com/css/skel-noscript.css" rel="stylesheet">
<link href="css/style-desktop.css" rel="stylesheet">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Tangerine">
<link href="http://dreamcpu.com/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.css">
<link href="css/style2.css" rel="stylesheet">
</head>
<body>
<!--Navigation Section-->
<section>
<nav id="nav" class="navbar navbar-default colorpick fullwidth">
<div class="container-fluid navwrap">
<div class="row">
<div class="navbar-header">
<div class="navbar-collapse centernav" id="bs-example-navbar-collapse-1 ">
<ul class="nav navbar-nav">
<li class="dropdown">
    <a class="url" type="button" href="index.html"><img src="img/church.png" alt="home"/></a>
	  </li>
    </ul>
   <ul class="nav navbar-nav">
<li class="dropdown">
    <a class="url" type="button" data-toggle="dropdown">Visit</a>
    <ul class="dropdown-menu">
      <li><a href="Directions.html">Directions</a></li>
      <li><a href="#">Services</a></li>
	  </ul>
	  </li>
    </ul>


   <ul class="nav navbar-nav">
<li class="dropdown">
    <a class="url" type="button" data-toggle="dropdown">About</a>
    <ul class="dropdown-menu">
      <li><a href="#">History of the church</a></li>
      <li><a href="#">What we believe</a></li>
      <li><a href="#">Historical Landmark date</a></li>
	  <li><a href="#">Renovation project in progress</a></li>
	  <li><a href="http://www.cmalliance.org">CMA</a></li>
	  <li><a href="#">Historical Landmark date</a></li>
	  </ul>
	  </li>
    </ul>

<ul class="nav navbar-nav">
<li class="dropdown">
    <a class="url" type="button" data-toggle="dropdown">Ministries</a>
    <ul class="dropdown-menu">
      <li><a href="#">Women's Ministries</a></li>
      <li><a href="#">Men's Ministries</a></li>
      <li><a href="#">Young Adult Ministries</a></li>
	  <li><a href="#">Youth Ministries</a></li>
	  <li><a href="#">Kid's Ministries</a></li>
	  </ul>
    </li>
  </ul>


<ul class="nav navbar-nav">
<li class="dropdown">
    <a href="donations.html" class="url">Give</a>
  </li>
  </ul>

</div>
</div>
</div>
</div>
</nav>
</section>
<div>
<!--<iframe src="https://calendar.google.com/calendar/embed?src=wayko621%40gmail.com&ctz=America%2FNew_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>-->
</div>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/sacontact.js" type="text/javascript"></script>
<script src="js/menuHover.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
function formatNumber(newNumb){
	var numArray = []
	numArray.join(newNumb);
return newNumb;	
}
var endval
	$(".amount_number").blur(function(){
	var newval = $(".amount_number").val();
	 $(".amount_number").val(formatNumber(newval) + '.00');
	});
	
});
</script>
</body>

<!--End Contact Us Section-->

</html>