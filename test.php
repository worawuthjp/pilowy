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

$product_id = $_POST['product_id'];
$num = $_POST['num'];
$price = $_POST['price'];

echo session_id();
echo "<br/>";
print_r($product_id);
echo "<br/>";
print_r($num);
echo "<br/>";
print_r($price);
?>

</html>