<?PHP
/*A web service named service-chartMonth.php. This will return a JSON list that will be an array of two elements: the day number (1-30) and the total visits for that day. */
include "../classes/AbstractTableGateway.class.php";
include "../classes/AnalyticsGateway.class.php";
$analitycsInstance = new AnalyticsGateway();
$data = $analitycsInstance->getVisitsPerDay();
header('Content-Type: application/json');
echo json_encode($data);
?>