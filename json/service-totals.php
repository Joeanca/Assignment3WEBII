<?PHP
include "../classes/AbstractTableGateway.class.php";
include "../classes/AnalyticsGateway.class.php";

$analitycsInstance = new AnalyticsGateway();

class statsObject{
    public $toDo;
    public $mssgs;
    public $visits; //holds both total and unique countries for June
}

$data = new StatsObject();
$data->toDo = $analitycsInstance->getToDo();
$data->mssgs = $analitycsInstance->getMssgs();
$data->visits = $analitycsInstance->getVisitsCount();

header('Content-Type: application/json');
echo json_encode($data);
?>