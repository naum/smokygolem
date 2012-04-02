<?php

require('horatio.php');

$req = new Request();
$response = $req->dispatch();
echo $response;

?>
