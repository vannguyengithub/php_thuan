<?php require_once __DIR__ . '/autoload/autoload.php'; 

    $sqlNews = "SELECT * FROM new WHERE 1 ORDER BY ID DESC LIMIT 8 ";
    $new = $db->fetchsql($sqlNews);

    /**
     * tin tức
     */
    /**
     * Phân trang
     */
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    $sqlNewItem = "SELECT * FROM new";
    
    $news = $db->fetchJone('new', $sqlNewItem, $p, 9, true);
 
    if(isset($news['page']))
    {
        $sotrang = $news
        ['page'];
        unset($news['page']);
    }

?>

    <?php require_once __DIR__ . '/layouts/header.php'; ?>
        <!--  -->
        <section class="t-home-new">
            <div class="grid wide">
                <div class="t-home-new__inner">
                    <p class="t-home-new__title">Category Archives: Tin tức </p>
                </div>
            </div>
        </section>
        <!-- tin tuc home -->
        <section class="t-new-home">
            <div class="grid wide">
                <div class="row sm-gutter rever-new">
                    <div class="col l-3 m-12">
                        <div class="t-new-ctg__inner">
                            <h3 class="t-new-ctg__title">
                                Bài viết mới        
                            </h3>
                            <ul class="t-new-ctg__list">
                                <?php foreach ($new as $item) : ?>
                                    <li class="t-new-ctg__item">
                                        <a class="t-new-ctg__item-link" href="#">
                                            <div class="t-new-ctg__item-imgbox">
                                                <img class="t-new-ctg__item-img" src="<?php echo uploads(); ?>new/<?php echo $item['thunbar_new']; ?>" alt="">
                                            </div>
                                            <p class="t-new-ctg__item-content">
                                                <?php echo strip_tags($item['description']); ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col l-9 new-btt">
                        <div class="t-home-new-tt">
                            <div class="row sm-gutter">
                                <?php foreach($news as $item) :?>
                                    <div class="col l-4 m-6 c-6">
                                        <div class="t-home-new-tt__inner">
                                            <a class="t-home-new__inner-home-link" href="chi-tiet-tin-tuc.php?id=<?php echo $item['id']; ?>">
                                                <img class="t-home-new__img" src="<?php echo uploads(); ?>new/<?php echo $item['thunbar_new']; ?>" alt="">
                                                <div class="t-home-new__txtbox">
                                                    <h4 class="t-home-new__ttl">
                                                        <?php echo strip_tags($item['name']) ?>
                                                    </h4>
                                                    <p class="t-home-new__content">
                                                        <?php echo strip_tags($item['description']); ?>
                                                    </p>
                                                    <div class="t-home-new__date">
                                                        <span class="t-home-new__date-details"><?php echo $item['updated_at']; ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
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
                        <?php for($i = 1 ; $i <=  $sotrang ; $i++ ) : ?>      
                            <?php
                                    if(isset($_GET['page']))
                                    {
                                        $p = $_GET['page'];
                                    }    
                                    else
                                    {
                                        $p = 1;
                                    }
                                ?>
                            <li class="s-pagination__item <?php echo ($i == $p) ? 's-pagination__item--active' : '' ?>">
                                <a class="s-pagination__item-link" href="?page=<?php echo $i; ?>">
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
    </div>
    <!-- footer -->
    <?php require_once __DIR__ . '/layouts/footer.php'; ?>