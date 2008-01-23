<?

	// Assetr test.

require_once("classes/assetr.class.php");
require_once("config.php");

$assetr = new assetr($config);

// $assetr->createrepository("assetr"); - WORKS!
$assetr->updateversion("assetr", "1");

unset($assetr);

?>
