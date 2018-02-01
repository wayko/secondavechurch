<?php
require_once 'vendor/autoload.php';
define('APPLICATION_NAME', 'Google Calendar API PHP Quickstart');
define('CREDENTIALS_PATH', '~/.credentials/calendar-php-quickstart.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/calendar-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR_READONLY)
));

     $client = new Google_Client();
	 $client->setApplicationName(APPLICATION_NAME);
	 $client->setScopes(SCOPES);
	 $client->setAuthConfig(CLIENT_SECRET_PATH);
	 $client->setAccessType('offline');
	 
	 $service = new Google_Service_Calendar($client);

    $calendarList = $service->calendarList->listCalendarList();

   
    $calendarId = "wayko621@gmail.com";

    $createdEvent = $service->events->insert($calendarId, $googleApievent);
    echo $createdEvent->getId();


    foreach ($calendarList->getItems() as $calendarListEntry) {
            echo $calendarListEntry->getSummary() . "\n";
            // get events
            $events = $service->events->listEvents($calendarListEntry->id);



            foreach ($events->getItems() as $event) {
                echo "<br/>" . $event->getSummary() . "";
                echo " ID : " . $event->getId() . "<br/>";
                echo "***********************" . "<br/> ";
            }
        }
    $pageToken = $calendarList->getNextPageToken();


 
?>