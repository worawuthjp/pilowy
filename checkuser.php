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

// print_r($record[0]['id']);
// echo "<br/>";
// print_r($record[0]['phone']);


session_start();
$_SESSION['id'] = $record[0]['id'];
$_SESSION['f_name'] = $record[0]['f_name'];
$_SESSION['l_name'] = $record[0]['l_name'];
$_SESSION['postal_code'] = $record[0]['postal_code'];
$_SESSION['email'] = $record[0]['email'];
$_SESSION['address'] = $record[0]['address'];
$_SESSION['phone'] = $record[0]['phone'];

header("location:cart.php");
}
?>

</html>
