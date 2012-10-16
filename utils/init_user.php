<?php
require('../libs/db.php');

$db = new DB;
$db->connect();

$db->query("UPDATE tr_login SET password='" . md5('123') . "';");
?>
