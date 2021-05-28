<?php
require_once '../backend/Controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  Controller::main('this is the title');
  exit();
}

echo 'Page not found :)';
exit();
?>
