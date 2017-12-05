<?php   

/*A web service named service-chartCountryVisits.php. This will return a JSON list that will be an array containing the country name and its visit count for all countries with more than 10 visits.*/





// NEED TO CHECK FOR NULL AND NEED TO CHECK FOR API OR SECURITY PREVENT REQUESTS FROM OUTSIDE DOMAINS

// QUERY TOP 15 COUNTRIES USING THE GATEWAY
//include "../includes/importStatements.inc.php"; 
include "../classes/AbstractTableGateway.class.php";
include "../classes/AnalyticsGateway.class.php";

$analitycsInstance = new AnalyticsGateway();
$data = $analitycsInstance->get10TopVisitingCountries();
header('Content-Type: application/json');
echo json_encode($data);

?>