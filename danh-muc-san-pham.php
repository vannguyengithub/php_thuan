<?php 
    
    require_once __DIR__ . '/autoload/autoload.php'; 

    $id = intval(getInput('id')); // lấy id

    /**
     * Phân trang
     */
    if(isset($_GET['p']))
    {
        $p = $_GET['p'];
    }
    else
    {
        $p = 1;
    }

    $sql = " SELECT * FROM product WHERE category_id = $id ";

    $total = count($db->fetchsql($sql));
    $product = $db->fetchJones("product", $sql, $total, $p, 12, true);

    $sotrang = $product['page'];
    unset($product['page']);

    $path = $_SERVER['SCRIPT_NAME']; // lấy ra cái tên
?>
    <?php require_once __DIR__ . '/layouts/header.php'; ?>
        <!--  -->   
        <!--  -->
        <section class="s-banner-title">
            <div class="grid wide">
                <div class="s-banner-title__inner">
                    <!--  -->
                    <label for="bar-product-input">
                        <i class="s-banner-title__bar-product fas fa-bars"></i>
                    </label>
                    <input class="bar-product" hidden type="checkbox" id="bar-product-input">
                    <label for="bar-product-input" class="s-product-overlay">
                        <div class="header-bar__overlay-mobile-close">
                            <i class="header-bar__overlay-mobile-close-icon far fa-times-circle"></i>
                        </div>
                    </label>     
                    <div class="s-product-overlay__mobile">
                        <h2 class="s-category-page__title-category">Danh mục sản phẩm</h2>
                        <div class="s-category__box">
                            <ul class="s-category__list">
                                <?php foreach ($category as $item) : ?>
                                    <li class="s-category__item">
                                        <i class="s-category__item-icon fas fa-caret-right"></i>
                                        <a class="s-category__item-link" href="danh-muc-san-pham.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!--  -->
                    <div class="s-banner-title__menu-item">
                        <span class="s-banner-title__menu-sp">Trang chủ</span>
                    </div>
                    <div class="s-banner-title__menu-item">
                        <span class="s-banner-title__menu-sp s-banner-title__menu-sp--active">Danh mục sản phẩm</span>
                    </div>
                </div>
            </div>
        </section>  
    <!--  -->
        <section class="s-category-page">
            <div class="grid wide">
                <div class="row sm-gutte s-category-page-inner">
                    <div class="col l-3 m-0 c-0">
                        <h2 class="s-category-page__title-category">Danh mục sản phẩm</h2>
                        <div class="s-category__box">
                            <ul class="s-category__list">
                                <?php foreach ($category as $item) : ?>
                                <li class="s-category__item">
                                    <i class="s-category__item-icon fas fa-caret-right"></i>
                                    <a class="s-category__item-link" href="danh-muc-san-pham.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col l-9">   
                        <div class="home-product">
                            <div class="row sm-gutter">
                                <?php foreach ($product as $item) : ?>
                                    <div class="col l-3 m-4 c-6 home-product__inner">
                                        <a class="home-product-item" href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>">
                                            <div class="home-product-item__img-wrapper">
                                                <img class="home-product-item__img" src="<?php echo uploads(); ?>/product/<?php echo $item['thunbar']; ?>" alt="">
                                            </div>
                                            <h4 class="home-product-item__name-ctg">
                                                <?php echo strip_tags($item['name']); ?>
                                            </h4>
                                            <p class="home-product-item__name">
                                                <?php echo strip_tags($item['content']); ?>
                                            </p>
                                            <div class="home-product-item__price">
                                                <h4 class="home-product-item__price-old">
                                                    900,000đ
                                                </h4>
                                                <h4 class="home-product-item__price-new">
                                                    752,000đ
                                                </h4>
                                            </div>
                                            <div class="home-product-item__btn">
                                                <a class="home-product-item__btn-link" href="them-gio-hang.php">Thêm vào giỏ</a>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  -->
         <!-- phan trang  -->
         <div class="s-pagination">
            <div class="grid wide">
                <div class="s-pagination__inner">
                    <ul class="s-pagination__list">
                        <li class="s-pagination__item">
                            <a class="s-pagination__item-link" href="#">
                                <i class="s-pagination__item-link-icon fas fa-chevron-circle-left"></i>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $sotrang; $i++) : ?>            
                            <li class="s-pagination__item <?php echo isset($_GET['p']) && $_GET['p'] == $i ? 's-pagination__item--active' : '' ?>">
                                <a class="s-pagination__item-link" href="<?php echo $path ?>?id=<?php echo $id; ?>&&p=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        <li class="s-pagination__item">
                            <a class="s-pagination__item-link" href="#">
                                <i class="s-pagination__item-link-icon fas fa-chevron-circle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>  
        </div>

        <!--  -->
    <?php require_once __DIR__ . '/layouts/footer.php'; ?>