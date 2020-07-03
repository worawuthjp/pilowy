<?php
$num = $_POST['num'];
$price = $_POST['price'];
$result = $num * $price;
echo '<label style="font-size: 18px;color: #0f6674"">'.number_format($result,2).' บาท</label>';
