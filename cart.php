<!doctype html>
<html lang="en">

<?php
require("head.html");
require("connectDB.php");
?>

<body>
<!--::header part start::-->
<?php
require("header.php");
if (isset($_SESSION['id'])) {
    $sql = 'Select cart.total_price,cart.id,cart_product.id,cart_product.cart_id,cart_product.product_id,cart_product.quantity,
cart_product.price,product.name,product.img,product.price,product.detail
From cart 
INNER JOIN cart_product on cart_product.cart_id = cart.id
INNER JOIN product on product.id = cart_product.product_id
WHERE cart.cus_id =  \'' . $_SESSION['id'] . '\' ORDER BY cart_product.id DESC';
    //echo $sql;
    $rs = selectAll($db, $sql);
    $price = $rs[0]['price'];
    $cart_id = $rs[0]['cart_id'];
    $cartproductid = $rs[0]['id'];
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=./login.php\">";
}

if (isset($_GET['del'])) {
    $id_product = $_GET['del'];
    $delsql = 'DELETE From cart_product WHERE cart_product.product_id = \'' . $id_product . '\'';
    $del = delete($db, $delsql);
    if ($del) {
        echo("<meta http-equiv='refresh' content='0;url=./cart.php'>");
    }
}

if (isset($_GET['add'])) {
    $add_product = $_GET['add'];
    $addSql = "INSERT INTO cart_product (id,cart_id,product_id,quantity,price)
VALUES ($cartproductid+1,'{$cart_id}','$add_product','1','{$price}')";
    $save = $db->execute($addSql);
    if ($save) {
        echo("<meta http-equiv='refresh' content='0;url=./cart.php'>");
    }
    else{
        echo 'Failed to store';
    }
}
?>
<!-- Header part end-->

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>ตะกร้าสินค้า</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->

<!--================Cart Area =================-->
<section class="cart_area section_padding">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_SESSION['id']))
                        foreach ($rs as $row) {
                            ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="<?php echo $row['img'] ?>" alt=""/>
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo $row['name'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5 name="price<?php echo $row['id']; ?>"><?php echo number_format($row['price'], 2) ?></h5>
                                </td>
                                <td width="180">
                                    <div class="col-md-12 ml-auto mr-auto ">
                                        <input class="col-md-12 "
                                               onchange="clickaddnum(this,<?php echo $row['price'] ?>,<?php echo $row['id'] ?>)"
                                               name="<?php echo "num" . $row['id'] ?>"
                                               id="<?php echo "num" . $row['id'] ?>" type="number" value="1" min="1"
                                               max="99"/>
                                    </div>
                                </td>
                                <td>
                                    <h5 name="total<?php echo $row['id']; ?>"
                                        id="<?php echo "total" . $row['id']; ?>"><?php echo number_format($row['price'], 2) ?></h5>
                                </td>
                                <td><a href="./cart.php?del=<?php echo $row['product_id'] ?>"
                                       style="text-decoration: underline">ลบ</a></td>
                            </tr>
                            <?php
                        }
                    ?>
                    <tr class="bottom_button">
                        <td>
                            <a class="btn_1" href="#">Update Cart</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="cupon_text float-right">
                                <a class="btn_1" href="#">Close Coupon</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <h5>Subtotal</h5>
                        </td>
                        <td>
                            <h5>$2160.00</h5>
                        </td>
                    </tr>
                    <tr class="shipping_area">
                        <td></td>
                        <td></td>
                        <td>
                            <h5>Shipping</h5>
                        </td>
                        <td>
                            <div class="shipping_box">
                                <ul class="list">
                                    <li>
                                        Flat Rate: $5.00
                                        <input type="radio" aria-label="Radio button for following text input">
                                    </li>
                                    <li>
                                        Free Shipping
                                        <input type="radio" aria-label="Radio button for following text input">
                                    </li>
                                    <li>
                                        Flat Rate: $10.00
                                        <input type="radio" aria-label="Radio button for following text input">
                                    </li>
                                    <li class="active">
                                        Local Delivery: $2.00
                                        <input type="radio" aria-label="Radio button for following text input">
                                    </li>
                                </ul>
                                <h6>
                                    Calculate Shipping
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </h6>
                                <select class="shipping_select">
                                    <option value="1">Bangladesh</option>
                                    <option value="2">India</option>
                                    <option value="4">Pakistan</option>
                                </select>
                                <select class="shipping_select section_bg">
                                    <option value="1">Select a State</option>
                                    <option value="2">Select a State</option>
                                    <option value="4">Select a State</option>
                                </select>
                                <input class="post_code" type="text" placeholder="Postcode/Zipcode"/>
                                <a class="btn_1" href="#">Update Details</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="#">Continue Shopping</a>
                    <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                </div>
            </div>
        </div>
</section>
<!--================End Cart Area =================-->
<!--::footer_part start::-->
<?php
require("footer.html");
?>
<!--::footer_part end::-->

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
<script src="./node_modules/bootstrap-input-spinner/src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner();
</script>

<script type="text/javascript">
    function clickaddnum(elem, price, _id) {
        $.ajax({
            url: 'sumtotalproduct.php',
            datatype: 'html',
            method: 'POST',
            data: {
                'num': $(elem).val(),
                'price': price,
            }
        }).done(function (data) {
            $('#total' + _id).text(data);
        });
        console.log('add');
    }
</script>

</body>

</html>
