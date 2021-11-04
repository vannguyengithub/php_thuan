<?php  require_once __DIR__. "../../autoload/autoload.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website nhóm </title>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/base.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/grid.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/fonts/fontawesome-free-5.15.4-web/css/all.css">
</head>
<body>
    <div class="app">
        <div class="container-header">
            <div class="grid wide">
                <header class="c-header">
                    <div class="c-header__logo">
                        <img class="c-header__logo-img" src="<?php echo base_url() ?>public/frontend/img/logo.webp" alt="">
                    </div>
                    <div class="c-header__menu">
                        <ul class="c-header__menu-list">
                            <li class="c-header__menu-item">
                                <a class="c-header__menu-item-link c-header__menu-item-link--active" href="">Trang chủ</a>
                            </li>
                            <li class="c-header__menu-item">
                                <a class="c-header__menu-item-link" href="">Giới thiệu</a>
                            </li>
                            <li class="c-header__menu-item">
                                <a class="c-header__menu-item-link" href="san-pham.php">Sản phẩm</a>
                            </li>
                            <li class="c-header__menu-item">
                                <a class="c-header__menu-item-link" href="">Tin tức </a>
                            </li>
                            <li class="c-header__menu-item">
                                <a class="c-header__menu-item-link" href="">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="c-header__boxtick">
                        <ul class="c-header__boxtick-list">
                            <li class="c-header__boxtick-item c-header__boxtick-item--search">
                                <i class="c-header__boxtick-item-search-icon fas fa-search"></i>
                                <div class="c-header__boxtick-cart__input">
                                    <input class="c-header__boxtick-cart__input-ipt" type="text" placeholder="Tìm kiếm...">
                                    <i class="c-header__boxtick-cart__input-ipt-icon fas fa-search"></i>
                                </div>
                            </li>
                            <!--  -->
                            <li class="c-header__boxtick-item">
                                <i class="c-header__boxtick-item-user-icon fas fa-user-circle"></i>
                            </li>
                            <li class="c-header__boxtick-item">
                                <a style="color: white; text-decoration: none; color" href="gio-hang.php" class="c-header__boxtick-item-cart-icon fas fa-shopping-cart"></a>
                            </li> 
                        </ul>
                        
                    </div>
                </header>
            </div>
        </div>
        <!-- nav bar mobile  -->
        <label for="c-bar-input" class="c-header-bar">
            <i class="header-bar__icon fas fa-bars"></i>
        </label>
        <input class="c-header-bar__input" hidden class="c-header-bar"type="checkbox" id="c-bar-input">
        <!-- overlay navbar mobile -->
        <label for="c-bar-input" class="menu__overlay">
            <div class="menu__close">
                <i class="menu__close-icon far fa-window-close"></i>
            </div>
            <ul class="menu__overlay-list">
                <li class="menu__overlay-item">
                    <a class="menu__overlay-link" href="">
                        <img class="menu__overlay-logo" src="./assets/img/logo.webp" alt="">
                    </a>
                </li>
                <li class="menu__overlay-item">
                    <a class="menu__overlay-link" href="">
                        Trang chủ
                    </a>
                </li>
                <li class="menu__overlay-item">
                    <a class="menu__overlay-link" href="">
                        Sản phẩm
                    </a>
                </li>
                <li class="menu__overlay-item">
                    <a class="menu__overlay-link" href="">
                        Tin tức
                    </a>
                </li>
                <li class="menu__overlay-item">
                    <a class="menu__overlay-link" href="">
                        Giới thiệu
                    </a>
                </li>
            </ul>
        </label>