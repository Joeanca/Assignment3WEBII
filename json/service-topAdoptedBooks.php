<?PHP
include "../classes/AbstractTableGateway.class.php";
include "../classes/AnalyticsGateway.class.php";

$analitycsInstance = new AnalyticsGateway();
$data = $analitycsInstance->getTopTenBooks();
header('Content-Type: application/json');
echo json_encode($data);
?>