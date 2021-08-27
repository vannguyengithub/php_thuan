<?php
    require_once __DIR__ . '/autoload/autoload.php';
   
    $sqlProductNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 8";
    $newProduct = $db->fetchsql($sqlProductNew);
?>
    <?php require_once __DIR__ . '/layouts/header.php'; ?>
        <!--  -->
        <section class="c-slider">
            <div class="grid">
                <div class="slideshow-container">

                    <div class="mySlides fade">
                      <div class="numbertext">1 / 3</div>
                      <img src="<?php echo base_url() ?>public/frontend/img/slider1.jpg" style="width:100%">
                      <div class="text">Caption Text</div>
                    </div>
                    
                    <div class="mySlides fade">
                      <div class="numbertext">2 / 3</div>
                      <img src="<?php echo base_url() ?>public/frontend/img/slider2.jpg" style="width:100%">
                      <div class="text">Caption Two</div>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    
                </div>
                    
                    <div style="text-align:center; margin-top: 10px;">
                      <span class="dot" onclick="currentSlide(1)"></span> 
                      <span class="dot" onclick="currentSlide(2)"></span> 
                      <span class="dot" onclick="currentSlide(3)"></span> 
                    </div>
                    
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
        </section>
        <!--  -->
        <section class="c-product">
            <div class="grid wide">
                <div class="c-product__inner">
                    <div class="c-product__title">
                        <h2 class="c-product__heading-title">Sản phẩm tiêu biểu</h2>
                    </div>
                    <div class="row sm-gutter">
                        <?php foreach ($newProduct as $item) : ?>
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
                <!-- see -->
                <div class="c-see__product">
                    <p class="c-see__product-add"><a class="c-see__product-add-link" href="san-pham.php"> Xem thêm >></a></p>
                </div>
                <!-- end see -->
            </div>
        </section>
        <section class="c-news">
            <div class="grid wide">
                <div class="c-news__inner">
                    <div class="c-product__title">
                        <h2 class="c-product__heading-title">Tin tức</h2>
                    </div>
                    <!-- <div class="row no-gutters"> -->
                        <script>
                            $(document).ready(function(){
                               $('.owl-carousel').owlCarousel({
                                    loop:true,
                                    margin:10,
                                    responsiveClass:true,
                                    responsive:{
                                        0:{
                                            items:1,
                                            nav:true
                                        },
                                        600:{
                                            items:3,
                                            nav:false
                                        },
                                        1000:{
                                            items:5,
                                            nav:true,
                                            loop:false
                                        }
                                    }
                                })
                            });
                        </script>
                      <!-- Set up your HTML -->
                        <div class="owl-carousel owl-carousel--blogs">
                            <div> 
                                <figure class="snip1493">
                                    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/ls-sample1.jpg" alt="ls-sample1" /></div>
                                    <figcaption>
                                      <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                                      <h3>The World Ended Yesterday</h3>
                                      <p>
                                  
                                        You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                         You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                     
                                      </p>
                                      <footer>
                                        <div class="views"><i class="ion-eye"></i>2,907</div>
                                        <div class="love"><i class="ion-heart"></i>623</div>
                                        <div class="comments"><i class="ion-chatboxes"></i>23</div>
                                      </footer>
                                    </figcaption>
                                    <a href="#"></a>
                                </figure>
                            </div>
                            <!--  -->
                            <div> 
                                <figure class="snip1493">
                                    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/ls-sample1.jpg" alt="ls-sample1" /></div>
                                    <figcaption>
                                      <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                                      <h3>The World Ended Yesterday</h3>
                                      <p>
                                  
                                        You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                         You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                     
                                      </p>
                                      <footer>
                                        <div class="views"><i class="ion-eye"></i>2,907</div>
                                        <div class="love"><i class="ion-heart"></i>623</div>
                                        <div class="comments"><i class="ion-chatboxes"></i>23</div>
                                      </footer>
                                    </figcaption>
                                    <a href="#"></a>
                                </figure>    
                            </div>
                            <!--  -->
                            <div>
                                <figure class="snip1493">
                                    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/ls-sample1.jpg" alt="ls-sample1" /></div>
                                    <figcaption>
                                      <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                                      <h3>The World Ended Yesterday</h3>
                                      <p>
                                  
                                        You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                         You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                     
                                      </p>
                                      <footer>
                                        <div class="views"><i class="ion-eye"></i>2,907</div>
                                        <div class="love"><i class="ion-heart"></i>623</div>
                                        <div class="comments"><i class="ion-chatboxes"></i>23</div>
                                      </footer>
                                    </figcaption>
                                    <a href="#"></a>
                                </figure>    
                            </div>
                            <!--  -->
                            <div>
                                <figure class="snip1493">
                                    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/ls-sample1.jpg" alt="ls-sample1" /></div>
                                    <figcaption>
                                      <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                                      <h3>The World Ended Yesterday</h3>
                                      <p>
                                  
                                        You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                         You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                     
                                      </p>
                                      <footer>
                                        <div class="views"><i class="ion-eye"></i>2,907</div>
                                        <div class="love"><i class="ion-heart"></i>623</div>
                                        <div class="comments"><i class="ion-chatboxes"></i>23</div>
                                      </footer>
                                    </figcaption>
                                    <a href="#"></a>
                                </figure>    
                            </div>
                            <!--  -->
                            <div>
                                <figure class="snip1493">
                                    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/ls-sample1.jpg" alt="ls-sample1" /></div>
                                    <figcaption>
                                      <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                                      <h3>The World Ended Yesterday</h3>
                                      <p>
                                  
                                        You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                         You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                     
                                      </p>
                                      <footer>
                                        <div class="views"><i class="ion-eye"></i>2,907</div>
                                        <div class="love"><i class="ion-heart"></i>623</div>
                                        <div class="comments"><i class="ion-chatboxes"></i>23</div>
                                      </footer>
                                    </figcaption>
                                    <a href="#"></a>
                                </figure>    
                            </div>
                            <!--  -->
                            <div>
                                <figure class="snip1493">
                                    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/ls-sample1.jpg" alt="ls-sample1" /></div>
                                    <figcaption>
                                      <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                                      <h3>The World Ended Yesterday</h3>
                                      <p>
                                  
                                        You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                         You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
                                     
                                      </p>
                                      <footer>
                                        <div class="views"><i class="ion-eye"></i>2,907</div>
                                        <div class="love"><i class="ion-heart"></i>623</div>
                                        <div class="comments"><i class="ion-chatboxes"></i>23</div>
                                      </footer>
                                    </figcaption>
                                    <a href="#"></a>
                                </figure>    
                            </div>
                            <!--  -->
                        </div>
                </div>
            </div>
        </section>
    </div>
    <!--  -->
    <?php require_once __DIR__ . '/layouts/footer.php'; ?>