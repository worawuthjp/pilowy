<?php
if (isset($_POST['num']) and isset($_POST['price'])) {
    $result = $_POST['num'] * $_POST['price'];
    echo number_format($result,2);

} else
    echo 0;
