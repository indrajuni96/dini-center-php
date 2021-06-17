<?php
require __DIR__ . '/../vendor/autoload.php';

use Kreait\Firebase\Auth;
use Kreait\Firebase\Factory;

$factory = (new Factory)
  ->withServiceAccount(__DIR__ . '/dinicenter1-firebase-adminsdk-et05w-40dccacc4c.json')
  ->withDatabaseUri('https://dinicenter1-default-rtdb.firebaseio.com');

$auth = $factory->createAuth();
$database =  $factory->createDatabase();
