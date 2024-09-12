<?php
require "../vendor/autoload.php";


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


// create a log channel
$log = new Logger('ipt10');
$log->pushHandler(new StreamHandler('ipt10.log'));


// add records to the log
$log->warning('Mark Jerome Santos');
$log->error('santos.markjerome@auf.edu.ph');
$log->info('profile', [
    'student_number' => '22-0243-895',
    'college' => 'College of Computer Studies',
    'program' => 'Bachelor of Science in Information Technology',
    'university' => 'Angeles University Foundation'
]);


class TestClass
{
	private $logger;
	public function __construct($logger_name)
	{
		$this->logger = new Logger($logger_name);
        $this->logger->pushHandler(new StreamHandler('TestClass.log'));
		// Log that the class has been created
		$this->logger->info(__FILE__ . "Greetings to {$logger_name}");
	}


	public function greet($name)
	{
		// provide a greeting message with the name of the invoker


		// Log it
		$this->logger->info(__METHOD__ . "Greetings to {$name}");
}


public function getAverage($data)
{
	// compute the average and return it
    $sum = 0;
    foreach ($data as $element) {
        $sum += $element;
    }
    $sum = $sum / count($data);

    // Log it
    $this->logger->info(__CLASS__ . "get the average: {$sum}");
    return $sum;
}


public function largest($data)
{
    $max = max($data);
	// Log it
	$this->logger->info(__CLASS__ . "Get the largest number: {$max}");
	// compute the average and return it
    return $max;
}


public function smallest($data)
{
    $min = min($data);
	// Log it
	$this->logger->info(__CLASS__ . "Get the smallest number: {$min}");
	// compute the average and return it
    return $min;
}
}

$my_name = "Mark Jerome Santos";
$obj = new TestClass($log->getName());
echo $obj->greet($my_name);
$data = [100, 345, 4563, 65, 234, 6734, -99];
// echo "Average: " . $obj->getAverage($data) . "\n";
// echo "Largest: " . $obj->largest($data) . "\n";
// echo "Smallest: " . $obj->smallest($data) . "\n";

$log->info("Average:", (array) $obj->getAverage($data));
$log->info("Largest:", (array) $obj->largest($data));
$log->info("Smallest:", (array) $obj->smallest($data));

$log->info('data', $data);
$log->info('object', (array) $obj);