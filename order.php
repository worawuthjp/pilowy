<!doctype html>
<html lang="zxx">
<?php

require("head.html");
session_start();
if (!(isset($_SESSION['admin']))) {
    session_destroy();
    header("location:index.php?allow=0");
}

?>

<body class="test">
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#"><img class="img-fluid ml-5" src="img/favicon.gif" alt="logo"></img> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item text-right" id="navbarSupportedContent">
                            <div class="col-md-3"></div>
                            <ul class="navbar-nav mr-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./order.php">Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Products
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        customer
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Payment
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        tracking
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        logout
                                    </a>

                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part bg-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Pilowy Admin</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    <div>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" colspan="2">เลขที่คำสั่งซื้อ</th>
                        <th scope="col">วันที่ทำรายการ</th>
                        <th scope="col">สินค้า</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ยอดชำระ</th>
                        <th scope="col">สถานะการชำระเงิน</th>
                        <th scope="col">สถานะการจัดส่งสินค้า</th>
                        <th scope="col">เลขพัสดุ</th>
                    </tr>
                </thead>

            </table>
        </div>

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="footer_iner">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <div class="footer_menu">
                            <div class="footer_logo">
                                <a href="#"><img src="img/favicon.gif" alt="#"></a>
                            </div>
                            <div class="footer_menu_item">
                                <a href="#">Home</a>
                                <a href="#">Order</a>
                                <a href="#">Product</a>
                                <a href="#">Customer</a>
                                <a href="#">Payment</a>
                                <a href="#">Tracking</a>
                                <!-- <a href="#">Pages</a>
                            <a href="blog.html">Blog</a>
                            <a href="contact.html">Contact</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="social_icon">
                            <a href="https://www.facebook.com/Pilowy-%E0%B8%AB%E0%B8%A1%E0%B8%AD%E0%B8%99%E0%B8%A2%E0%B8%B2%E0%B8%87%E0%B8%9E%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B8%A0%E0%B8%B2%E0%B8%9E-103141214799677/" target="new">
                                <i class="fab fa-facebook-f"></i></a>
                            <!-- <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="copyright_part">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                            <P>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                All rights reserved | This
                                template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </P>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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