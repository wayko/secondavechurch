<?php
  require_once __DIR__ . '/vendor/autoload.php';

  date_default_timezone_set('America/New_York');
  
  $REDIRECT_URI = 'http://localhost/secondavechurch/calendar2.php';
  $KEY_LOCATION = __DIR__ . '/client_secret.json';
  $TOKEN_FILE   = "token.txt";
  
  $SCOPES = array(
      Google_Service_Calendar::CALENDAR_READONLY
  );
  
  $client = new Google_Client();
  $client->setApplicationName("ctrlq.org Application");
  $client->setAuthConfig($KEY_LOCATION);
  $service = new Google_Service_Calendar($client);
  // Incremental authorization
  $client->setIncludeGrantedScopes(true);
  
  // Allow access to Google API when the user is not present. 
  $client->setAccessType('offline');
  $client->setApprovalPrompt ("force");
  $client->setRedirectUri($REDIRECT_URI);
  $client->setScopes($SCOPES);
  
  if (isset($_GET['code']) && !empty($_GET['code'])) {
      try {
          // Exchange the one-time authorization code for an access token
          $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
          
          // Save the access token and refresh token in local filesystem
          file_put_contents($TOKEN_FILE, json_encode($accessToken));
          
          $_SESSION['accessToken'] = $accessToken;
          header('Location: ' . filter_var($REDIRECT_URI, FILTER_SANITIZE_URL));
          exit();
      }
      catch (\Google_Service_Exception $e) {
          print_r($e);
      }
  }
  
  if (!isset($_SESSION['accessToken'])) {
      
      $token = @file_get_contents($TOKEN_FILE);
      
      if ($token == null) {
          
          // Generate a URL to request access from Google's OAuth 2.0 server:
          $authUrl = $client->createAuthUrl();
          
          // Redirect the user to Google's OAuth server
          header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
          exit();
          
      } else {
          
          $_SESSION['accessToken'] = json_decode($token, true);
          
      }
  }
  
  $client->setAccessToken($_SESSION['accessToken']);
  
  /* Refresh token when expired */
  if ($client->isAccessTokenExpired()) {
      // the new access token comes with a refresh token as well
      $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
      file_put_contents($TOKEN_FILE, json_encode($client->getAccessToken()));
  }
  
  $calendarId = 'wayko621@gmail.com';
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => date('c'),
);
 $results = $service->events->listEvents($calendarId, $optParams);

if (count($results->getItems()) == 0) {
  echo "No upcoming events found.\n";
} else {
  echo "Upcoming events:\n";
  foreach ($results->getItems() as $event) {
    $start = $event->start->dateTime;
	$description = $event->getDescription();
	$formattedDate = date_format(new DateTime($start),"F j, Y - G:i A");
	if (empty($description)){
		$description = "No Description";
	}
    if (empty($start)) {
      $start = $event->start->date;
    }
	
   echo "<div class='calendar'><h1>" .$event->getSummary() . "</h1>  <h3 class='getdates'>" . $formattedDate . " </h3><br /><span class='description'>" . $description . "</span></div>";
  }
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