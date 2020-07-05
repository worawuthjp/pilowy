<!doctype html>
<html lang="zxx">
<?php
require("head.html");
session_start();
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function function_alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if (isset($_GET['time']))
    function_alert("หมดเวลากรเชื่อมต่อของคุณ");

if (isset($_GET['allow']))
    function_alert("คุณไม่ได้รับอณุญาติให้ดูหน้านี้");

console_log($_SESSION['id']);
?>

<body class="test">

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZNSRF2" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!--::header part start::-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171494050-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-171494050-1');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TVQP89G');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TVQP89G" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"><img class="img-fluid ml-5" src="img/favicon.gif" alt="logo"></img> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item text-right" id="navbarSupportedContent">
                            <div class="col-md-8"></div>
                            <ul class="navbar-nav mr-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">about</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product_list.php">
                                        product
                                    </a>

                                </li>
                                <?php

                                if (isset($_SESSION['id'])) {
                                    $page = 'statusgoods.php';
                                } else {
                                    $page = 'login.php';
                                    $_SESSION['check'] = true;
                                }
                                ?>
                                <li class="nav-item">

                                    <a class="nav-link" href="<?php echo $page; ?>">
                                        tracking
                                    </a>

                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="blog.php">
                                        pages
                                    </a>

                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="blog.php" >blog</a>

                                </li> -->

                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li> -->
                            </ul>
                        </div>
                        <?php
                        if (isset($_SESSION['id']))
                            $p = 'cart.php';
                        else
                            $p = 'login.php';
                        ?>
                        <div class="hearer_icon d-flex align-items-center mr-md-5 mr-sm-5 mr-4">
                            <!-- <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a> -->
                            <a href="<?php echo $p; ?>">
                                <i class="flaticon-shopping-cart-black-shape"></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div> -->
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="main_part">
        <div class="container">
            <div class="row">
                <div class="col-md-7 pl-0 pr-0">
                    <img src="img/banner.webp" alt="#" class="img-fluid col-sm-12 col-md-12 mt-sm-0 pl-0 pr-0">
                    <!-- <img src="img/banner_pattern.png " alt="#" class="pattern_img img-fluid"> -->
                </div>
                <div class="col-md-5">
                    <div class="banner_text col-sm-12 pl-0 pr-0">
                        <div class="">
                            <h1>หมอนยางพาราคุณภาพสูง</h1>
                            <p>
                                หมอนยางพารา Pilowy เป็นหมอนยางพาราแท้ 100% จากบริษัท Thai rubber ผู้ผลิตและจำหน่ายยางพารา
                                Top
                                3 ของประเทศไทย
                            </p>
                            <!-- <a href="product_list.php" class="btn_1">shop now</a> -->
                            <?php
                            if (isset($_SESSION['id'])) {
                                $from = "product_list.php";
                            } else {
                                $from = "login.php?from=index";
                            }
                            ?>
                            <a href="<?php echo $from; ?>" class="btn_1">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- product list start-->
    <section class="single_product_list pt-3 mt-md-5 pt-md-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between pt-md-5">
                            <div class="col-lg-6 col-sm-12">
                                <img src="img/single_product_1.webp" class="img-fluid border-circle-square col-md-12 col-sm-12" alt="#">

                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>ราคาใบละ 590 บาท ส่งฟรี!!!</h5>
                                    <h2>หมอนแบบ Massage</h2>
                                    <p class="col-sm-12 pl-0">
                                        -รูปทรงแบบ Contour แล้วเพิ่มปุ่มแบบ Durian <br />
                                        -ลดการเกร็งกล้ามเนื้อต้นคอ <br />
                                        -การพักผ่อนมีประสิทธิ์ภาพมากขึ้น <br />
                                        -ได้รับความนิยมจากในประเทศและนอกประเทศ <br /><br />
                                    </p>
                                    <a href="single-product.php?id=1" class="btn_3 mt-2">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-12">
                                <img src="img/single_product_2.webp" class="img-fluid border-circle-square col-md-12 col-sm-12" alt="#">
                            </div>
                            <div class="col-lg-5 col-sm-12">
                                <div class="single_product_content">
                                    <h5>ราคาใบละ 590 บาท ส่งฟรี!!!</h5>
                                    <h2>หมอนแบบ Contour (เรียบ)</h2>
                                    <p class="col-sm-12 pl-0">
                                        -เน้นส่วนโค้งเพื่อพยุงศรีษะ ไหล่ คอ <br />
                                        -การนอนถูกต้องตามสรีระ <br />
                                        -ลดการปวดเมื่อย ลดการปวดคอ ลดการนอนกรน <br /><br />
                                    </p>
                                    <a href="single-product.php?id=2" class="btn_3 mt-2">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-12">
                                <img src="img/single_product_5.webp" class="img-fluid border-circle-square col-md-12 col-sm-12" alt="#">
                            </div>
                            <div class="col-lg-5 col-sm-12">
                                <div class="single_product_content">
                                    <h5>ราคาใบละ 590 บาท ส่งฟรี!!!</h5>
                                    <h2>หมอนแบบ Contour (มีปุ่ม)</h2>
                                    <p class="col-sm-12 pl-0">
                                        -เน้นส่วนโค้งเพื่อพยุงศรีษะ ไหล่ คอ <br />
                                        -การนอนถูกต้องตามสรีระ <br />
                                        -ลดการปวดเมื่อย ลดการปวดคอ ลดการนอนกรน <br /><br />
                                    </p>
                                    <a href="single-product.php?id=5" class="btn_3 mt-2">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <img src="img/single_product_3.webp" width="548" height="460" class="img-fluid border-circle-square" alt="#">
                            </div>
                            <div class="col-lg-5 col-sm-12 ">
                                <div class="single_product_content">
                                    <h5>ราคาใบละ 590 บาท ส่งฟรี!!!</h5>
                                    <h2>หมอนแบบ Heart</h2>
                                    <p class="col-sm-12 pl-0">
                                        -หมอนทรงหัวใจลดอาการปวดคอ <br />
                                        -ป้องกันการตกหมอน <br />
                                        -กระตุ้นการไหลเวียนโลหิต <br /><br />
                                    </p>
                                    <a href="single-product.php?id=3" class="btn_3 mt-2">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <img src="img/single_product_4.webp" width="548" height="460" class="img-fluid border-circle-square" alt="#">
                            </div>
                            <div class="col-lg-5 col-sm-12">
                                <div class="single_product_content">
                                    <h5>ราคาใบละ 590 บาท ส่งฟรี!!!</h5>
                                    <h2>หมอนแบบ Durian</h2>
                                    <p class="col-sm-12 pl-0">
                                        -หมอนทุเรียนลดอาการปวดคอ <br />
                                        -ป้องกันการตกหมอน <br />
                                        -กระตุ้นการไหลเวียนโลหิต <br /><br />
                                    </p>
                                    <a href="single-product.php?id=4" class="btn_3 mt-2">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- product list end-->


    <!-- trending item start-->
    <!--<section class="trending_items">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Trending Items</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single_product_item">
                    <div class="single_product_item_thumb">
                        <img src="img/tranding_item/tranding_item_1.png" alt="#" class="img-fluid">
                    </div>
                    <h3><a href="single-product.php">Cervical pillow for airplane
                            car office nap pillow</a></h3>
                    <p>From $5</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_product_item">
                    <img src="img/tranding_item/tranding_item_2.png" alt="#" class="img-fluid">
                    <h3><a href="single-product.php">Foam filling cotton slow rebound pillows</a></h3>
                    <p>From $5</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_product_item">
                    <img src="img/tranding_item/tranding_item_3.png" alt="#" class="img-fluid">
                    <h3><a href="single-product.php">Memory foam filling cotton Slow rebound pillows</a></h3>
                    <p>From $5</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_product_item">
                    <img src="img/tranding_item/tranding_item_4.png" alt="#" class="img-fluid">
                    <h3><a href="single-product.php">Cervical pillow for airplane
                            car office nap pillow</a></h3>
                    <p>From $5</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_product_item">
                    <img src="img/tranding_item/tranding_item_5.png" alt="#" class="img-fluid">
                    <h3><a href="single-product.php">Foam filling cotton slow rebound pillows</a></h3>
                    <p>From $5</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_product_item">
                    <img src="img/tranding_item/tranding_item_6.png" alt="#" class="img-fluid">
                    <h3><a href="single-product.php">Memory foam filling cotton Slow rebound pillows</a></h3>
                    <p>From $5</p>
                </div>
            </div>
        </div>
    </div>
</section>-->
    <!-- trending item end-->

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
    <!-- magnific popup js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- carousel js -->
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

    </div>
</body>


</html>