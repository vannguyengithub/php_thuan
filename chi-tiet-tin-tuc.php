<?php require_once __DIR__ . '/autoload/autoload.php'; 

    $sqlNews = "SELECT * FROM new WHERE 1 ORDER BY ID DESC LIMIT 10 ";
    $new = $db->fetchsql($sqlNews);

    $id = intval(getInput('id'));
    $newDetails = $db->fetchID('new', $id);

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
                            <div class="t-new-details">
                                <?php echo $newDetails["content"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  -->
    </div>
    <!-- footer -->
    <?php require_once __DIR__ . '/layouts/footer.php'; ?>