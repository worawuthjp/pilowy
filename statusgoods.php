<!doctype html>
<html lang="zxx">

<?php
require("head.html");
?>

<body>
    <!--::header part start::-->
    <?php
    require("header.php");
    ?>
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>สถานะสินค้า</h2>
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
                <p>ชื่อ-นามสกุล</p><span>: นายเอ บีบวก</span>
              </li>
              <li>
                <p>อีเมล</p><span>: zaza@gmail.com</span>
              </li>
              <li>
                <p>เบอร์โทร</p><span>: 08X-XXXXXXX</span>
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
                <p>ที่อยู่</p><span>: address</span>
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
                  <th scope="col">ยอดชำระ</th>
                  <th scope="col">สถานะการชำระเงิน</th>
                  <th scope="col">สถานะการจัดส่งสินค้า</th>
                  <th scope="col">เลขพัสดุ</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th colspan="2"><span>KU18888</span></th>
                  <th> <span>15/02/20</span></th>
                  <th>หมอนทุเรียน</th>
                  <th> <span>590 บาท</span></th>
                  <th> <span>ชำระแล้ว</span></th>
                  <th> <span>จัดส่งเรียบร้อยแล้ว</span></th>
                  <th> <span>eieizazababakrukri</span></th>
                </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ track post part end =================-->
    
 <!--::footer_part start::-->
<section class="client_review">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
            </div>
        </div>
    </div>

</section>
<footer class="footer_part">
    <div class="footer_iner">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-8">
                    <div class="footer_menu">
                        <div class="footer_logo">
                            <a href="index.html"><img src="img/favicon.gif" alt="#"></a>
                        </div>
                        <div class="footer_menu_item">
                            <a href="index.html">Home</a>
                            <a href="about.html">About</a>
                            <a href="product_list.html">Products</a>
                            <!-- <a href="#">Pages</a>
                            <a href="blog.html">Blog</a>
                            <a href="contact.html">Contact</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
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
                            <script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This
                            template is made with <i class="ti-heart" aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </P>
                        <div class="copyright_link">
                            <a href="#">Turms & Conditions</a>
                            <a href="#">FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    <!--::footer_part end::-->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v7.0'
        })
        ;
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="103141214799677"
     theme_color="#0084ff">
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