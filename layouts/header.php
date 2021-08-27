<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dồ Gia Dụng</title>
    <link rel="icon" type="image/png" href="https://sieuthiviet.vn/uploads/images/6492icon440x440.jpeg"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/grid.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/base.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/fonts/fontawesome-free-5.15.4-web/css/all.css">
    <!-- owl slider  -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend//slider/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/slider/owlcarousel/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url() ?>public/frontend/slider/owlcarousel/owl.carousel.min.js"></script>
</head>
<body>
    <div class="app">   
        <header>
            <div class="c-header-top">
                <div class="grid wide">
                    <div class="c-header-top__inner">
                        <ul class="c-header-top-left__list">
                            <li class="c-header-top-left__item"><a class="c-header-top-left__item-link" href="san-pham.php">Cửa hàng</a> </li>
                            <li class="c-header-top-left__item">Hotline: <span class="c-header-top-left__phone">0342133767</span></li>
                            <li class="c-header-top-left__item"><a class="c-header-top-left__item-link" href="#">Trợ giúp</a></li>
                            <li class="c-header-top-left__item"><a class="c-header-top-left__item-link" href="#">FAQs</a></li>
                        </ul>
                        <ul class="c-header-top-right__list">
                            <li class="c-header-top-right__item">
                                <div class="c-header-top-right__apps">
                                    <a class="c-header-top-right__apps-link" href="#"><i class="c-header-top-right__apps--icon fab fa-facebook"></i></a>
                                    <a class="c-header-top-right__apps-link" href="#"><i class="c-header-top-right__apps--icon fab fa-instagram"></i></a>
                                    <a class="c-header-top-right__apps-link" href="#"><i class="c-header-top-right__apps--icon fab fa-youtube"></i></a>
                                </div>
                            </li>
                            <li class="c-header-top-right__item">
                                <div class="c-header-top-right__logins">
                                   <a class="c-header-top-right__login-link1" href="dang-nhap.php">Đăng nhập</a>
                                   <a class="c-header-top-right__login-link" href="dang-ky.php">Đăng ký</a>
                                </div>
                            </li>
                            <li class="c-header-top-right__item">
                                <a class="c-header-top-right__cart-link" href="#"><i class="c-header-top-right__icon-cart fas fa-shopping-cart"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="c-header-bttm">
                <div class="grid wide">
                    <div class="c-header-bttm__inner">
                        <!-- bar -->
                        <label for="bar-input" class="header-bar">
                            <i class="header-bar__icon fas fa-bars"></i>
                        </label>
                        <input class="header-bar__input" hidden type="checkbox" id="bar-input">
                        <label for="bar-input" class="c-header-overlay">
                            <div class="header-bar__overlay-mobile-close">
                                <i class="header-bar__overlay-mobile-close-icon far fa-times-circle"></i>
                            </div>
                        </label>
                        <!-- overlay -->
                        <div class="header-bar__overlay-mobile">
                            <div class="header-bar__overlay-mobile-search">
                                <input class="header-bar__overlay-mobile-search-ipt" placeholder="Tìm kiếm..." type="text">
                                <i class="header-bar__overlay-mobile-search-icon fas fa-search"></i>
                            </div>
                            <ul class="header-bar__overlay-mobile-list">
                                <li class="header-bar__overlay-mobile-item">
                                    <a class="header-bar__overlay-mobile-link" href="index.php">Trang chủ</a>
                                </li>
                                <li class="header-bar__overlay-mobile-item">
                                    <a class="header-bar__overlay-mobile-link" href="gioi-thieu.php">Giới thiệu</a>
                                </li>    
                                <li class="header-bar__overlay-mobile-item">
                                    <a class="header-bar__overlay-mobile-link" href="san-pham.php">Sản phẩm</a>
                                </li>
                                <li class="header-bar__overlay-mobile-item">
                                    <a class="header-bar__overlay-mobile-link" href="khuyen-mai.php">Khuyến mãi </a>
                                </li>
                                <li class="header-bar__overlay-mobile-item">
                                    <a class="header-bar__overlay-mobile-link" href="tin-tuc.php">Tin tức</a>
                                </li>
                                <li class="header-bar__overlay-mobile-item">
                                    <a class="header-bar__overlay-mobile-link" href="lien-he.php">Liên hệ</a>
                                </li>
                                <li class="header-bar__overlay-mobile-item">
                                    <a class="header-bar__overlay-mobile-link" href="dang-nhap.php">Đăng nhập</a>
                                </li>
                                <li class="header-bar__overlay-mobile-item">
                                    <a class="header-bar__overlay-mobile-link" href="thong-bao.php">Thông báo</a>
                                </li>
                                <li class="header-bar__overlay-mobile-item">
                                    <a class="header-bar__overlay-mobile-link-app" href="#">
                                        <i class="header-bar__overlay-mobile-link-app-icon fab fa-facebook"></i>
                                    </a>
                                    <a class="header-bar__overlay-mobile-link-app" href="#">
                                        <i class="header-bar__overlay-mobile-link-app-icon fab fa-instagram"></i>
                                    </a>
                                    <a class="header-bar__overlay-mobile-link-app" href="#">
                                        <i class="header-bar__overlay-mobile-link-app-icon fab fa-youtube"></i>
                                    </a>
                                    <a class="header-bar__overlay-mobile-link-app" href="#">
                                        <i class="header-bar__overlay-mobile-link-app-icon fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="header-bar__overlay-mobile-item">
                                    <h3 class="header-bar__overlay-mobile-phone">0342133767</h3>
                                </li>
                            </ul>
                        </div>
                        <!--  -->
                        <div class="c-header-bttm__txtbox">
                            <a class="c-header-bttm__logo-img-link" href="index.php"><img class="c-header-bttm__logo-img" src="public/frontend/img/11logoN.png" alt="logo"></a>
                            <i class="c-header-bttm__shopping-mobile fas fa-shopping-cart"></i>
                            <ul class="c-header-bttm__list">
                                <li class="c-header-bttm__item"><a class="c-header-bttm__item-link c-header-bttm__item-link--active" href="index.php">Trang chủ</a></li>
                                <li class="c-header-bttm__item">
                                    <a class="c-header-bttm__item-link" href="san-pham.php">Sản phẩm</a>
                                    <!--  -->
                                    <ul class="c-header-bttm__item-category-list">
                                        <?php foreach ($category as $item) : ?>
                                            <li class="c-header-bttm__item-category-item">
                                                <a class="c-header-bttm__item-category-item-link" href="danh-muc-san-pham.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="c-header-bttm__item"><a class="c-header-bttm__item-link" href="gioi-thieu.php">Giới thiệu</a></li>
                                <li class="c-header-bttm__item">
                                    <a class="c-header-bttm__item-link" href="tin-tuc.php">Tin tức</a>
                                    <ul class="c-header-bttm__item-category-list">
                                        <li class="c-header-bttm__item-category-item">
                                            <a class="c-header-bttm__item-category-item-link" href="tin-tuc.php"> Tin tức</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="c-header-bttm__item"><a class="c-header-bttm__item-link" href="lien-he.php">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="c-header-bttm__search">
                                <input class="c-header-bttm__search-ipt" type="text" placeholder="Tìm kiếm...."> 
                                <div class="c-header-bttm__font-icon">
                                    <i class="c-header-bttm__search-icon fas fa-search"></i>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>