<?php
$dsn = 'pgsql:host=localhost;dbname=postgres'; //Casa
//$dsn = 'pgsql:host=localhost;dbname=nvuser'; //TIDev
$username = 'postgres';
$password = 'admin';
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $username, $password, $options);

?>