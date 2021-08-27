<?php  require_once __DIR__ . '/autoload/autoload.php'; 

  $detailProduct = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 4";
  $newDetailsProduct = $db->fetchsql($detailProduct);

  $id = intval(getInput('id'));
  $product = $db->fetchID('product', $id);
  

?>
    <?php require_once __DIR__ . '/layouts/header.php'; ?>
        <section class="s-banner-title">
            <div class="grid wide">
                <div class="s-banner-title__inner">
                    <div class="s-banner-title__menu-item">
                        <span class="s-banner-title__menu-sp">Trang chủ</span>
                    </div>
                    <div class="s-banner-title__menu-item">
                        <span class="s-banner-title__menu-sp s-banner-title__menu-sp--active">chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
        </section>  
    <!--  -->
        <section class="e-product-details">
            <div class="grid wide">
                <div class = "card-wrapper">
                    <div class = "card">
                      <!-- card left -->
                      <div class = "product-imgs">
                        <div class = "img-display">
                          <div class = "img-showcase">
                            <img src = "<?php echo uploads(); ?>product/<?php echo $product['thunbar']; ?>" alt = "shoe image">
                            <img src = "<?php echo uploads(); ?>product/<?php echo $product['thunbar_1']; ?>" alt = "shoe image">
                            <img src = "<?php echo uploads(); ?>product/<?php echo $product['thunbar_2']; ?>" alt = "shoe image">
                            <img src = "<?php echo uploads(); ?>product/<?php echo $product['thunbar_3']; ?>" alt = "shoe image">
                          </div>
                        </div>
                        <div class = "img-select">
                          <div class = "img-item">
                            <a href = "#" data-id = "1">
                              <img class = "img-details" src = "<?php echo uploads(); ?>product/<?php echo $product['thunbar']; ?>" alt = "shoe image">
                            </a>
                          </div>
                          <div class = "img-item">
                            <a href = "#" data-id = "2">
                              <img class = "img-details" src = "<?php echo uploads(); ?>product/<?php echo $product['thunbar_1']; ?>" alt = "shoe image">
                            </a>
                          </div>
                          <div class = "img-item">
                            <a href = "#" data-id = "3">
                              <img class = "img-details" src = "<?php echo uploads(); ?>product/<?php echo $product['thunbar_2']; ?>" alt = "shoe image">
                            </a>
                          </div>
                          <div class = "img-item">
                            <a href = "#" data-id = "4">
                              <img class = "img-details" src = "<?php echo uploads(); ?>product/<?php echo $product['thunbar_3']; ?>" alt = "shoe image">
                            </a>
                          </div>
                        </div>
                      </div>
                      <!-- card right -->
                      <div class = "product-content">
                        <h2 class = "product-title"> <?php echo $product['name']; ?> </h2>
                        <a href = "san-pham.php" class = "product-link">visit store</a>
                        <div class = "product-price">
                          <p class = "last-price">Old Price: <span> 257.00 VNĐ</span></p>
                          <p class = "new-price">New Price: <span> 249.00 (5%) VNĐ</span></p>
                        </div>
                  
                        <div class = "product-detail">
                          <h2> Mô tả: </h2>
                          <p>    <?php echo strip_tags($product['content']); ?> </p>
                        </div>
                  
                        <div class = "purchase-info">
                          <input type = "number" min = "0" value = "1">
                          <button type = "button" class = "btn">
                            Thêm vào giỏ hàng <i class = "fas fa-shopping-cart"></i>
                          </button>
                        </div>
                  
                        <div class = "social-links">
                          <p class = "social-links__share">Share At: </p>
                          <a class = "social-links__share-link"href = "#">
                            <i class = "social-links__share-link-icon fab fa-facebook-f"></i>
                          </a>
                          <a class="social-links__share-link" href = "#">
                            <i class = "social-links__share-link-icon fab fa-twitter"></i>
                          </a>
                          <a class="social-links__share-link" href = "#">
                            <i class = "social-links__share-link-icon fab fa-instagram"></i>
                          </a>
                          <a class="social-links__share-link" href = "#">
                            <i class = "social-links__share-link-icon fab fa-whatsapp"></i>
                          </a>
                          <a class="social-links__share-link" href = "#">
                            <i class = "social-links__share-link-icon fab fa-pinterest"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <script>
                    const imgs = document.querySelectorAll('.img-select a');
                    const imgBtns = [...imgs];
                    let imgId = 1;

                    imgBtns.forEach((imgItem) => {
                        imgItem.addEventListener('click', (event) => {
                            event.preventDefault();
                            imgId = imgItem.dataset.id;
                            slideImage();
                        });
                    });

                    function slideImage(){
                        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

                        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
                    }

                    window.addEventListener('resize', slideImage);
            </script>
        </section>
        <!-- mô tả -->
        <section class="product-details-demo">
            <div class="grid wide">
                <hr class="product-details-demo__hr">
                <div class="product-details-demo__ttl">
                    Nội dung
                </div>
                <div class="product-details-demo__inner">
                    <div class="product-details-demo__content">
                       <?php echo $product['content']; ?>
                  </div>
                </div>
            </div>
        </section>
        <section class="c-product">
            <div class="grid wide">
                <div class="c-product__inner">
                    <div class="c-product__title">
                        <h2 class="c-product__heading-title">Sản phẩm mới (liên quan)</h2>
                    </div>
                    <div class="row sm-gutter">
                        <?php foreach ($newDetailsProduct as $item) : ?>
                            <div class="col l-3 m-6 c-6">
                                <div class="c-product__pain-inner">
                                    <div class="c-product__pain-imgbox">
                                        <a class="c-product__pain-imgbox-link" href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>">
                                            <img class="c-product__pain-image" src="<?php echo uploads(); ?>product/<?php echo $item['thunbar']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="c-product__pain-txtbox">
                                        <h5 class="c-product__name-category"><a class="c-product__name-category-link" href="#"> <?php echo $item['name']; ?></a></h5>
                                        <h4 class="c-product__name-pdt"> <?php echo strip_tags($item['content']); ?> </h4>
                                    </div>
                                    <div class="c-product__price-box">
                                        <span class="c-product__price-old">
                                            300,000đ
                                        </span>
                                        <span class="c-product__price-current">
                                            249,000đ
                                        </span>
                                    </div>
                                    <div class="c-product__add-cart">
                                            <a class="c-product__add-cart-link" href="them-gio-hang.php">Thêm giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- footer -->
    <?php require_once __DIR__ . '/layouts/footer.php'; ?>