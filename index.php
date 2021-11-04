<?php require_once __DIR__ . '/layouts/header.php'; 

    $sqlProductNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 8";
    $newProduct = $db->fetchsql($sqlProductNew);
    // 
    
    $sliders = "SELECT * FROM sliders";
    $slider = $db->fetchsql($sliders);
?>
        <!--  -->
        <section class="c-slider">
            <div class="grid">
                <div class="c-slider__bar">
                <?php foreach ($slider as $item) : ?>
                    <div class="slideshow-container">
                    <div class="mySlides fade">
                    <img src="<?php echo uploads() ?>slider/<?php echo $item['thunbar_slider']; ?>" style="width:100%; max-height: 500px">
                    <div class="text">Caption Text</div>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    </div>
                </div>
                <?php endforeach; ?>
                <!--  -->
                <script>
                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                    showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                    showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    if (n > slides.length) {slideIndex = 1}    
                    if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";  
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";  
                    dots[slideIndex-1].className += " active";
                    }
                </script>
                  
                </div>
            </div>
            <style>
         
            /* Slideshow container */
            .slideshow-container {
                width: 100%;
            }

            /* Next & previous buttons */
            .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            }

            /* Position the "next button" to the right */
            .next {
            right: 0;
            border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
            }

            /* Caption text */
            .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            }

           

            /* The dots/bullets/indicators */
            .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
            }

            .active, .dot:hover {
            background-color: #717171;
            }

            /* Fading animation */
            .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
            }

            @-webkit-keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
            }

            @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
            }

            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
            .prev, .next,.text {font-size: 11px}
            }
        </style>
        </section>
        <!--  -->
        <section class="c-service">
            <div class="grid wide">
                <ul class="c-service__list row">
                    <li class="c-service__item c-6">
                        <img class="c-service__item-img" src="<?php echo base_url() ?>public/frontend/img/icon_service_1.svg" alt="">
                        <h3 class="c-service__item-title"> Vận chuyển toàn cầu </h3>
                        <p class="c-service__content">
                            Chúng tôi miễn phí vận chuyển với tất cả các đơn hàng trị giá trên 2.000.000Đ
                        </p>
                    </li>
                    <li class="c-service__item c-6">
                        <img class="c-service__item-img" src="<?php echo base_url() ?>public/frontend/img/icon_service_2.svg" alt="">
                        <h3 class="c-service__item-title"> Hỗ trợ online 24/24  </h3>
                        <p class="c-service__content">
							Chúng tôi luôn luôn hỗ trợ khách hàng 24/24 tất cả các ngày trong tuần
                        </p>
                    </li>
                    <li class="c-service__item c-6">
                        <img class="c-service__item-img" src="<?php echo base_url() ?>public/frontend/img/icon_service_3.svg" alt="">
                        <h3 class="c-service__item-title"> Miễn phí đổi trả  </h3>
                        <p class="c-service__content">
							Miễn phí đổi trả trong vòng 15 ngày đầu tiên áp dụng cho tất cả các mặt hàng
                        </p>
                    </li>
                    <li class="c-service__item c-6">
                        <img class="c-service__item-img" src="<?php echo base_url() ?>public/frontend/img/icon_service_4.svg" alt="">
                        <h3 class="c-service__item-title">Quà tặng hấp dẫn </h3>
                        <p class="c-service__content">
								Chương trình khuyễn mãi cực lớn và hấp dẫn vào mỗi chủ nhật hàng tuần
                        </p>
                    </li>
                </ul>
            </div>
        </section>
        <!--  -->
        <section class="c-category">
            <div class="grid wide">
                <div class="c-category__tittle">
                    <h1 class="c-category__tittle-heading">Danh mục sản phẩm</h1>
                </div>
            </div>
        </section>
        <!--  -->
        <section class="c-cate">
            <div class="grid wide">
                <div class="c-cate__inner">
                    <div class="c-cate__list-1">
                        <div class="c-cate__item1">
                            <img class="c-cate__item1-img" src="<?php echo base_url() ?>public/frontend/img/cate_1.webp" alt="">
                            <div class="c-cate__box">
                                <h3 class="c-cate__item1-title">Đồng hồ nam</h3>
                                <a class="c-cate__item1-title-link" href="">Xem thêm &rarr;</a>
                            </div>
                        </div>
                        <div class="c-cate__item1">
                            <img class="c-cate__item1-img" src="<?php echo base_url() ?>public/frontend/img/cate_2.webp" alt="">
                            <div class="c-cate__box">
                                <h3 class="c-cate__item1-title">Phụ kiện nữ</h3>
                                <a class="c-cate__item1-title-link" href="">Xem thêm &rarr;</a>
                            </div>
                        </div>
                    </div>
                    <div class="c-cate__list-1">
                        <div class="c-cate__item1">
                            <img class="c-cate__item1-img" src="<?php echo base_url() ?>public/frontend/img/cate_3.webp" alt="">
                            <div class="c-cate__box">
                                <h3 class="c-cate__item1-title">Đồng hồ nữ</h3>
                                <a class="c-cate__item1-title-link" href="">Xem thêm &rarr;</a>
                            </div>
                        </div>
                        <div class="c-cate__item1">
                            <img class="c-cate__item1-img" src="<?php echo base_url() ?>public/frontend/img/cate_4.webp" alt="">
                            <div class="c-cate__box">
                                <h3 class="c-cate__item1-title">Phụ kiện nam</h3>
                                <a class="c-cate__item1-title-link" href="">Xem thêm &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  -->
        <section class="c-category">
            <div class="grid wide">
                <div class="c-category__tittle">
                    <h1 class="c-category__tittle-heading">Top sản phẩm bán chạy</h1>
                </div>
            </div>
        </section>
        <!--  -->
        <section class="c-product">
           <div class="grid wide">
                <div class="c-product__inner">
                    <ul class="c-product__list">
                        <li class="c-product__item c-product__item--active">
                            <a class="c-product__item-link c-product__item-link--active" href="#">
                                Đồng hồ nam 
                            </a>
                        </li>
                        <li class="c-product__item">
                            <a class="c-product__item-link" href="#">
                                Đồng hồ nữ 
                        </li>
                        <li class="c-product__item">
                            <a class="c-product__item-link" href="#">
                                Phụ kiện  
                            </a>
                        </li>
                    </ul>
                </div>
           </div>
           <div class="grid wide">
                <div class="row gutters">
                    <?php foreach ($newProduct as $item) :?>
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>">
                        <div class="col l-3 m-6 c-6 fix-product">
                            <div class="c-prd__inner">
                                <div class="c-prd__box">
                                    <img class="c-prd__box-img" src="<?php echo uploads() ?>product/<?php echo $item['thunbar_3']; ?>" alt="">
                                </div> 
                                <div class="c-prd__txt">
                                    <h3 class="c-prd__name">
                                        <?php echo strip_tags($item['name']); ?>
                                    </h3>
                                </div>
                                <div class="c-prd__pricebox">
                                    <h3 class="c-prd__price-old">
                                        <?php echo formatPrice($item['price']) ?> &#8363;
                                    </h3>
                                    <h3 class="c-prd__price-new">
                                        <?php echo formatpricesale($item['price'],$item['sale']) ?> &#8363;
                                    </h3>
                                </div>
                                <p class="c-prd__sale"><?php echo strip_tags($item['sale']); ?>%</p>
                                <a class="c-prd__bag-link" href="addcart.php?id=<?php echo $item['id']; ?>">
                                    <i class="c-prd__bag fas fa-shopping-bag"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
           </div>
        </section>
        <!--  -->
        <section class="c-category">
            <div class="grid wide">
                <div class="c-category__tittle">
                    <h1 class="c-category__tittle-heading">Tin tức</h1>
                </div>
            </div>
        </section>
        <!--  -->
        <section class="c-new">
            <div class="grid wide">
                <div class="row gutters">
                    <div class="col l-4 m-6 c-6">
                        <div class="c-new__imgbox">
                            <img class="c-new__img" src="<?php echo base_url() ?>public/frontend/img/t6.webp" alt="">
                        </div>
                        <div class="c-new__title">
                            Cách chọn mua dây da đồng hồ theo phong thủy mà bạn nên biếtCách chọn mua dây da đồng hồ theo phong thủy mà bạn nên biếtCách chọn mua dây da đồng hồ theo phong thủy mà bạn nên biết
                        </div>
                        <div class="c-new__date">
                            <p class="c-new__watch">Watch</p>
                            <span class="c-new__watch-inner">
                                <i class="c-new__clock far fa-clock"></i>
                                <p class="c-new__day">01/03/2021</p>
                            </span>
                        </div>
                        <div class="c-new__description">
                            <p class="c-new__description-p">
                                Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ... Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ... Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...
                            </p>
                        </div>
                        <div class="c-new__tep">
                            <a class="c-new__tep-link" href="#">Xem thêm &rarr;</a>
                        </div>
                    </div>
                    <div class="col l-4 m-6 c-6">
                        <div class="c-new__imgbox">
                            <img class="c-new__img" src="<?php echo base_url() ?>public/frontend/img/t7.webp" alt="">
                        </div>
                        <div class="c-new__title">
                            Cách chọn mua dây da đồng hồ theo phong thủy mà bạn nên biết
                        </div>
                        <div class="c-new__date">
                            <p class="c-new__watch">Watch</p>
                            <span class="c-new__watch-inner">
                                <i class="c-new__clock far fa-clock"></i>
                                <p class="c-new__day">01/03/2021</p>
                            </span>
                        </div>
                        <div class="c-new__description">
                            <p class="c-new__description-p">
                                Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ... Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ... Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...
                            </p>
                        </div>
                        <div class="c-new__tep">
                            <a class="c-new__tep-link" href="#">Xem thêm &rarr;</a>
                        </div>
                    </div>
                    <div class="col l-4 m-6 c-6">
                        <div class="c-new__imgbox">
                            <img class="c-new__img" src="<?php echo base_url() ?>public/frontend/img/t8.webp" alt="">
                        </div>
                        <div class="c-new__title">
                            Cách chọn mua dây da đồng hồ theo phong thủy mà bạn nên biết
                        </div>
                        <div class="c-new__date">
                            <p class="c-new__watch">Watch</p>
                            <span class="c-new__watch-inner">
                                <i class="c-new__clock far fa-clock"></i>
                                <p class="c-new__day">01/03/2021</p>
                            </span>
                        </div>
                        <div class="c-new__description">
                            <p class="c-new__description-p">
                                Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những ...Người mệnh Kim Mặt đồng hồ có dạng hình tròn, hình oval, hình elip tượng trưng cho hành kim, bạn nên chọn những hình elip tượng trưng cho hành kim, bạn nên chọn những ..hình elip tượng trưng cho hành kim, bạn nên chọn những ..
                            </p>
                        </div>
                        <div class="c-new__tep">
                            <a class="c-new__tep-link" href="#">Xem thêm &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  -->
        <section class="c-branch">
            <div class="grid wide">
                <div class="row gutters">
                    <div class="col l-2-4 m-3 c-4">
                        <img class="c-branch__img" src="<?php echo base_url() ?>public/frontend/img/brand1.webp" alt="">
                    </div>
                    <div class="col l-2-4 m-3 c-4">
                        <img class="c-branch__img" src="<?php echo base_url() ?>public/frontend/img/brand2.webp" alt="">
                    </div>
                    <div class="col l-2-4 m-3 c-4">
                        <img class="c-branch__img" src="<?php echo base_url() ?>public/frontend/img/brand3.webp" alt="">
                    </div>
                    <div class="col l-2-4 m-3 c-4">
                        <img class="c-branch__img" src="<?php echo base_url() ?>public/frontend/img/brand4.webp" alt="">
                    </div>
                    <div class="col l-2-4 m-3 c-4">
                        <img class="c-branch__img" src="<?php echo base_url() ?>public/frontend/img/brand5.webp" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!--  -->
        <?php require_once __DIR__ . '/layouts/footer.php'; ?>
     