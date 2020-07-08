<!doctype html>
<html lang="zxx">

<?php

require("head.html");
require('connectDB.php');




?>

<body>
    <!--::header part start::-->
    <?php
    require("header.php");
    // console_log($_SESSION['id']);
    if (isset($_SESSION['id'])) {
        $sql = 'SELECT cart.id , payment.date , product.name , cart_product.quantity , payment.money_received , payment.status , tracking.t_status , tracking.track_code FROM 
    cart INNER JOIN cart_product ON cart.id = cart_product.cart_id
    INNER JOIN product ON cart_product.product_id = product.id
    INNER JOIN payment ON payment.cart_id = cart.id
    INNER JOIN tracking ON (tracking.pay_id = payment.id) AND (tracking.cart_id = cart.id)
    WHERE cart.cus_id = \'' . $_SESSION['id'] . '\' ORDER BY cart_product.id ASC';

        $rs = selectAll($db, $sql);
        $record = array();
        foreach ($rs as $row) {
            $record[] = $row;
        }


        $sql = 'SELECT payment.id,payment.slip FROM customer INNER JOIN cart ON customer.id = cart.cus_id
        INNER JOIN payment ON cart.id = payment.cart_id WHERE (customer.id = \'' . $_SESSION['id'] . '\')'; // AND (payment.status = false);';
        $rs = selectAll($db, $sql);
        // console_log($rs);
        echo "<br>";

        $record2 = array();
        foreach ($rs as $row) {
            $record2[] = $row;
        }
    }


    ?>

    <!--::header part end::-->
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>แจ้งหลักฐานการจ่ายเงิน</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================ track post part start =================-->
    <section class="confirmation_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>ข้อมูลลูกค้า</h4>
                        <ul>
                            <li>
                                <p>ชื่อ-นามสกุล</p><span>: <?php echo $_SESSION['f_name'];
                                                            echo " ";
                                                            echo $_SESSION['l_name']; ?></span>
                            </li>
                            <li>
                                <p>อีเมล</p><span>: <?php echo $_SESSION['email']; ?></span>
                            </li>
                            <li>
                                <p>เบอร์โทร</p><span>: <?php echo $_SESSION['phone']; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">

                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>ที่อยู่รับสินค้า</h4>
                        <ul>
                            <li>
                                <p>ที่อยู่</p><span>: <?php echo $_SESSION['address'];
                                                        echo " ";
                                                        echo $_SESSION['postal_code']; ?></span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="order_details_iner">
                        <h3>รายละเอียดการสั่งซื้อสินค้า</h3>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">เลขที่คำสั่งซื้อ</th>
                                    <th scope="col">วันที่ทำรายการ</th>
                                    <th scope="col">สินค้า</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ยอดชำระ</th>
                                    <th scope="col">สถานะการชำระเงิน</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $befor_id = null;
                                $befor_product = null;
                                for ($i = 0; $i < count($record); $i++) {
                                    print_r($record[$i]);
                                    echo "<br>";
                                ?>
                                    <tr>
                                        <th colspan="2"><span><?php if ($record[$i]['id'] != $befor_id) {
                                                                    echo $record[$i]['id'] ?></span></th>
                                        <th> <span><?php echo $record[$i]['date'];
                                                                } else echo "<th></th>" ?></span></th>
                                        <th><?php
                                            foreach ($record[$i] as $rec) {
                                                //echo $rec + $id;
                                            }


                                            ?></th>
                                        <th><?php if ($befor_id == null || ($record[$i]['id'] != $record[$i - 1]['id'] && $record[$i]['name'] != $record[$i - 1]['name'])) echo $record[$i]['name']; ?></th>
                                        <th>x <?php echo $record[$i]['quantity'] ?></th>
                                        <th> <span><?php echo $record[$i]['money_received'] ?> บาท</span></th>
                                        <th> <span><?php
                                                    if ($record[$i]['status'] == "t") {
                                                        $text = "ชำระเงินแล้ว";
                                                    } else {
                                                        $text = "ยังไม่ชำระเงิน";
                                                    }
                                                    echo $text; ?></span></th>

                                    </tr>

                                <?php
                                    $befor_id = $record[$i]['id'];
                                    $befor_product = $record[$i]['name'];
                                }
                                ?>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="order_details_iner">
                            <h3>Upload หลักฐานการชำระเงิน</h3>
                            <form class="imgForm" action="leanfrom.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="upload" />
                                <button class="btn_1 ml-auto mr-auto" type="submit" name="save" value="upload">Upload</button>
                            </form>

                            <?php
                            
                            if (isset($record2[0]['slip'])) {
                            ?>
                                <div>
                                    <br /><br /><img src="img/slip/<?php print_r($record2[0]['slip']) ?>">
                                </div>
                            <?php
                            }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================ track post part end =================-->

    <!--::footer_part start::-->
    <?php
    require("footer.php");
    ?>
    <!--::footer_part end::-->

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="103141214799677" theme_color="#0084ff">
    </div>
    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/mixitup.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>


</body>

</html>