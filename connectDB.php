<?php
require 'vendor/adodb/adodb-php/adodb.inc.php';
/*
* Simple connection
*/
$driver = 'postgres';
$db     = ADONewConnection($driver);
$host = '35.186.154.48';
$user =  'postgres';
$pass = '123456';
$dbname = 'postgres';
$port = '5432';

/*
* Now connect to the database
*/
$db->connect($host,$user,$pass,$dbname);
/*if($db){
    echo "connect";
}
else{
    echo $db;
}

$sql = 'SELECT * FROM product';
$rs = $db->getAll($sql);
print_r($rs);*/
?>
