<?php   

/*A web service named service-topCountries.php. This will return a JSON list of the top 15 country names and their country code. You will need to do a group query by CountryCode and count them and sort them by this count.*/

// QUERY TOP 15 COUNTRIES USING THE GATEWAY
//include "../includes/importStatements.inc.php"; 
include "../classes/AbstractTableGateway.class.php";
include "../classes/AnalyticsGateway.class.php";
    $analitycsInstance = new AnalyticsGateway();
    $data = $analitycsInstance->getTop15Countries();
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT) ;
?>