<html>
<?php
require("connectDB.php");
$quantity = $_POST['phone'];
if (isset($_POST['phone'])) {
    $sql = 'SELECT * FROM customer WHERE phone  = \'' . $_POST['phone'] . '\'';
    $rs = selectOne($db, $sql);
    //print_r($rs);
    echo "<br>";

    $record = array();
    foreach ($rs as $row) {
        $record[] = $row;
    
    }
if(isset($record)){
$sql = 'INSERT INTO customer (phone) VALUES (\'' . $_POST['phone'] . '\')';
$rs = selectOne($db, $sql);
    // print_r($rs);
    $sql = 'SELECT * FROM customer WHERE phone  = \'' . $_POST['phone'] . '\'';
    $rs = selectOne($db, $sql);
    //print_r($rs);
    echo "<br>";

    $record = array();
    foreach ($rs as $row) {
        $record[] = $row;
    
    }
    $id = $record[0]['id'];
    $phone = $record[0]['phone'];
    header("location:test.php?id=$id&phone=$phone");
}
}
?>

</html>