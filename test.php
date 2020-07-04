<html>
<?php
session_start();
$id = $_SESSION['id'];
$f_name = $_SESSION['f_name'];
$l_name = $_SESSION['l_name'];
$postal_code = $_SESSION['postal_code'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
$phone = $_SESSION['phone'];

echo session_id();
echo "<br/>";
print_r($id);
echo "<br/>";
print_r($f_name);
echo "<br/>";
print_r($phone);
?>

</html>