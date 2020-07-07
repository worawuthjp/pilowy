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
    if ($rs != null) {
        $price = $rs[0]['price'];
        $cart_id = $rs[0]['cart_id'];
        $cartproductid = $rs[0]['id'];

    } else {
        $cartproductid = 0;
    }
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
    } else {
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
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
                <div class="checkout_btn_inner">
                    <h4>ชื่อและที่อยู่ผู้รับ</h4><br>
                    <div class="container">
                        <div class="col-md-10">
                            <div class="row col-md-12 mt-2 pl-md-0 ">
                                <div class="col-md-12 row">
                                    <label class="font-weight-bold col-form-label col-md-2" for="f_name"
                                           style="font-size: 15px;color: #646464">ชื่อ : </label>
                                    <input type="text" class="form-control form-inline col-md-4" placeholder="ชื่อจริง"
                                           name="f_name" id="f_name">
                                    <label class="font-weight-bold col-form-label ml-2" for="l_name"
                                           style="font-size: 15px;color: #646464">นามสกุล : </label>
                                    <input type="text" class="form-control form-inline col-md-4 ml-2" placeholder="นามสกุล"
                                           name="l_name" id="l_name">
                                </div>
                            </div>
                            <div class="row col-md-12 mt-2 pl-md-0">
                                <div class="col-md-12 row">
                                    <label for="phone" class="font-weight-bold col-form-label col-md-2"
                                           style="font-size: 15px;color: #646464">เบอร์โทรศัพท์ : </label>
                                    <input type="text" class="form-inline form-control col-md-4" id="phone" name="phone"
                                           value="" placeholder="เบอร์โทรศัพท์" maxlength="10">
                                </div>
                            </div>

                            <div class="row col-md-12 mt-2 pl-md-0">
                                <div class="col-md-12 row">
                                    <label for="province" class="font-weight-bold col-form-label col-md-2"
                                           style="font-size: 15px;color: #646464">จังหวัด : </label>
                                    <select class="form-control col-md-4" id="province" name="province">
                                        <option class="select_option">เลือกจังหวัด</option>
                                    </select>
                                    <label for="amphures" class="font-weight-bold col-form-label col-md-auto"
                                           style="font-size: 15px;color: #646464">อำเภอ : </label>
                                    <select class="form-control col-md-4" id="amphures" name="amphures">
                                        <option class="select_option">เลือกอำเภอ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row col-md-12 mt-2 pl-md-0">
                                <div class="col-md-12 row">
                                    <label for="district" class="font-weight-bold col-form-label col-md-2"
                                           style="font-size: 15px;color: #646464">ตำบล : </label>
                                    <select class="form-control col-md-4" id="district" name="district">
                                        <option class="select_option">เลือกตำบล</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row col-md-12 mt-2 pl-md-0">
                                <div class="col-md-12 row">
                                    <label class="font-weight-bold col-form-label col-md-2" for="address"
                                           style="font-size: 15px;color: #646464">ที่อยู่ : </label>
                                    <textarea rows="3" class="form-inline form-control col-md-6" id="address"
                                              name="address" placeholder="ที่อยู่" style="resize: none"></textarea></div>
                            </div>

                            <div class="row col-md-12 mt-2 pl-md-0">
                                <div class="col-md-12 row">
                                    <label class="font-weight-bold col-form-label col-md-2" for="postal_code"
                                           style="font-size: 15px;color: #646464">รหัสไปรษณีย์ : </label>
                                    <input class="form-control form-inline col-md-3" id="postal_code" name="postal_code"
                                           placeholder="รหัสไปรษณีย์">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="checkout_btn_inner mt-2 float-right">
                    <a class="btn_1" href="#">ซื้อของต่อ</a>
                    <a class="btn_1 checkout_btn_1 mr-0" href="#">ยืนยันคำสั่งซื้อ</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
<!--::footer_part start::-->
<?php
require("footer.php");
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
<!--<script src="js/jquery.nice-select.min.js"></script>-->
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
<!--<script src="js/custom.js"></script>-->
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
    }
</script>

<script>
    (function ($) {
        "use strict";



        $('.popup-youtube, .popup-vimeo').magnificPopup({
            // disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        var review = $('.client_review_slider');
        if (review.length) {
            review.owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 5000,
                nav: true,
                dots: false,
                navText: [" <i class='ti-angle-left'></i> ", "<i class='ti-angle-right'></i> "],
                responsive: {
                    0: {
                        nav: false
                    },
                    768: {
                        nav: false
                    },
                    991: {
                        nav: true
                    }
                }
            });
        }

        // niceSelect js code
        $(document).ready(function () {

        });

        // menu fixed js code
        $(window).scroll(function () {
            var window_top = $(window).scrollTop() + 1;
            if (window_top > 50) {
                $('.main_menu').addClass('menu_fixed animated fadeInDown');
            } else {
                $('.main_menu').removeClass('menu_fixed animated fadeInDown');
            }
        });

        $('.counter').counterUp({
            time: 2000
        });

        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            speed: 300,
            infinite: true,
            asNavFor: '.slider-nav-thumbnails',
            autoplay: true,
            pauseOnFocus: true,
            dots: true,
        });

        $('.slider-nav-thumbnails').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider',
            focusOnSelect: true,
            infinite: true,
            prevArrow: false,
            nextArrow: false,
            centerMode: true,
            responsive: [{
                breakpoint: 480,
                settings: {
                    centerMode: false,
                }
            }]
        });

        //------- Mailchimp js --------//
        function mailChimp() {
            $('#mc_embed_signup').find('form').ajaxChimp();
        }
        mailChimp();

        //------- makeTimer js --------//
        function makeTimer() {

            //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
            var endTime = new Date("27 Sep 2019 12:56:00 GMT+01:00");
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }

            $("#days").html("<span>Days</span>" + days);
            $("#hours").html("<span>Hours</span>" + hours);
            $("#minutes").html("<span>Minutes</span>" + minutes);
            $("#seconds").html("<span>Seconds</span>" + seconds);

        }
// click counter js
        (function() {

            window.inputNumber = function(el) {

                var min = el.attr('min') || false;
                var max = el.attr('max') || false;

                var els = {};

                els.dec = el.prev();
                els.inc = el.next();

                el.each(function() {
                    init($(this));
                });

                function init(el) {

                    els.dec.on('click', decrement);
                    els.inc.on('click', increment);

                    function decrement() {
                        var value = el[0].value;
                        value--;
                        if(!min || value >= min) {
                            el[0].value = value;
                        }
                    }

                    function increment() {
                        var value = el[0].value;
                        value++;
                        if(!max || value <= max) {
                            el[0].value = value++;
                        }
                    }
                }
            }
        })();

        inputNumber($('.input-number'));



        setInterval(function () {
            makeTimer();
        }, 1000);


        $('.select_option_dropdown').hide();
        $(".select_option_list").click(function () {
            $(this).parent(".select_option").children(".select_option_dropdown").slideToggle('100');
            $(this).find(".right").toggleClass("fas fa-caret-down, fas fa-caret-up");
        });

        if ($('.new_arrival_iner').length > 0) {
            var containerEl = document.querySelector('.new_arrival_iner');
            var mixer = mixitup(containerEl);
        }
//  $('.controls').on('click', function(){
//   $('.controls').removeClass('add');
//   $('.controls').addClass('add');
//  });

        $('.controls').on('click', function(){
            $(this).addClass('active').siblings().removeClass('active');
        });


    }(jQuery));
</script>

</body>

</html>
