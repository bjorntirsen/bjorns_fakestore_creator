<?php
require_once 'Fakestore.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  Fakestore::create($_POST['endpoint']);
  exit;
}

Fakestore::create($_GET['endpoint']);
