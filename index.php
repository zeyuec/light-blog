<?php

// set timezone
date_default_timezone_set("PRC");

require_once("./core/Light.php");
require_once("./core/LRouter.php");

$router = new LRouter();
$router->run();
?>
