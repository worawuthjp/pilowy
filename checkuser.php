<html>
<?php
session_start();
require("connectDB.php");

if (isset($_POST['uname'])) {
    if (($_POST['uname'] != "admin") || $_POST['psw'] != "admin") {
        header("location:index.php?allow=0");
    } else {
        $_SESSION['admin'] = true;
        header("location:admin.php");
    }
}

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




    $_SESSION['id'] = $record[0]['id'];
    $_SESSION['f_name'] = $record[0]['f_name'];
    $_SESSION['l_name'] = $record[0]['l_name'];
    $_SESSION['postal_code'] = $record[0]['postal_code'];
    $_SESSION['email'] = $record[0]['email'];
    $_SESSION['address'] = $record[0]['address'];
    $_SESSION['phone'] = $record[0]['phone'];


    if (isset($_SESSION['from'])) {

        unset($_SESSION['from']);
        header("location:product_list.php");
    } else {
        header("location:cart.php");
    }
}
?>

</html>