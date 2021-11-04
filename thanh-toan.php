<?php
    require_once __DIR__ . '/autoload/autoload.php';
    // xử lí thanh toán 
    if(isset($_SESSION['name_user']))
    {
        $user = $db->fetchID("users", intval($_SESSION['name_id']));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_SESSION['name_user']))
        {
            $data = 
            [
                'amount'    => $_SESSION['total'],
                'users_id'  => $_SESSION['name_id'],
                'note'      => postInput('note'),
                'name'      => postInput('name'),
                'email'     => postInput('email'),
                'phone'     => postInput('phone'),
                'address'   => postInput('address'),
            ];
        }
        else
        {
            $data = 
            [
                'amount'    => $_SESSION['total'],
                'note'      => postInput('note'),
                'name'      => postInput('name'),
                'email'     => postInput('email'),
                'phone'     => postInput('phone'),
                'address'   => postInput('address'),
            ];
        }
        // 
        $idtran = $db->insert("transaction", $data);
        if($idtran > 0) 
        {
            foreach ($_SESSION['cart'] as $key => $value)
            {
                $data3 = 
                [
                    'transaction_id'    => $idtran,
                    'product_id'        => $key,
                    'qty'               => $value['qty'],
                    'price'             => $value['price'],
                    'name'              => $value['name'],
                ];
                $id_insert2 = $db->insert('orders', $data3);
            }
            unset($_SESSION['cart']);
            unset($_SESSION['total']);
            $_SESSION['success'] = "Lưu thông tin thành công! Chúng tôi sẽ liên hệ bạn sớm nhất.";
            header('location: thong-bao.php');
            
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/grid.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/base.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/fonts/fontawesome-free-5.15.4-web/css/all.css">
</head>
<body>
<section class="t-pay">
    <div class="grid wide">
        <div class="row">
            <div class="col l-7 m-12 c-12 new1">
                <div class="t-pay__inner">
                    <div class="t-pay__txtbox">
                        <h1 class="t-pay__heading"><a href="index.php">group</a></h1>
                        <div class="t-pay__info-list">
                            <div class="t-pay__info-item">
                                <a class="t-pay__info-item-link" href="gio-hang.php">Giỏ hàng</a>
                            </div>
                            <div class="t-pay__info-item">
                                <a class="t-pay__info-item-link" href="">Thông tin giao hàng</a>
                            </div>
                            <div class="t-pay__info-item">
                                <a class="t-pay__info-item-link" href="">Phương thức thanh toán </a>
                            </div>
                        </div>
                        <h3 class="t-pay__title-shipper">
                            Thông tin giao hàng
                        </h3>
                        <div class="t-pay__login">
                            <p class="t-pay__login-text">Bạn đã có tài khoản?</p>
                            <a class="t-pay__login-link" href="#">Đăng nhập</a>
                        </div>
                    </div>
                    <!--  -->
                    <form class="t-pay__form-list" action="" method="POST">
                        <div class="t-pay__form-item">
                            <input  name="name" class="t-pay__form-ipt" type="text" placeholder="Họ và tên" value="<?php if(isset($_SESSION['name_user'])) { echo $user['name']; } else{ echo '';}?>">
                        </div>
                        <div class="t-pay__form-item">
                            <input name="email" class="t-pay__form-ipt" type="email" placeholder="email"  value="<?php if(isset($_SESSION['name_user'])) { echo $user['email']; } else{ echo '';}?>">
                        </div>
                        <div class="t-pay__form-item">
                            <input name="phone" class="t-pay__form-ipt" type="tel" placeholder="Số điện thoại" value="<?php if(isset($_SESSION['name_user'])) { echo $user['phone']; } else{ echo '';}?>">
                        </div>
                        <div class="t-pay__form-item">
                            <input name="address" class="t-pay__form-ipt" type="text" placeholder="15/ Trần Văn Trà/ Tân Phú/ Q7/ TP.HCM" value="<?php if(isset($_SESSION['name_user'])) { echo $user['address']; } else{ echo '';}?>">
                        </div>
                        <div class="t-pay__form-item">
                            <textarea name="note" class="t-pay__form-ttr"  cols="30" rows="10" placeholder="Ghi chú thêm"></textarea>
                        </div>
                        <div class="t-pay-step__inner">
                        <div class="t-pay__step1">
                            <h3 class="t-pay__step1-heading"><a href="gio-hang.php"> Giỏ hàng </a></h3>
                        </div>
                        <div class="t-pay__step2">
                            <h3 class="t-pay__step2-heading"><button type="submit"> Tiếp tục đến phương thức thanh toán</button> </h3>
                        </div>
                    </div>
                    </form>
                    <!--  -->
                    
                </div>
                <!--  -->
                <hr>
                <div class="t-pay__footer">
                    <p>Powered by Nguyen</p>
                </div>
            </div>
            <div class="col l-5 m-12 c-12 new2">
                <div class="t-sidebar__inner">
                    <?php foreach ($_SESSION['cart'] as $key => $value): ?>
                        <div class="t-sidebar__product">
                            <img class="t-sidebar__product-img" src="<?php echo uploads();?>/product/<?php echo $value['thunbar']; ?>" alt="">
                            <p class="t-sidebar__product-name"><?php echo $value['name']; ?></p>
                            <input class="t-sidebar__product-qty" type="number" min="0" readonly value="<?php echo $value['qty']; ?>">
                            <h4 class="t-sidebar__product-price"><?php echo $value['price'] * $value['qty']; ?>&#8363;</h4>
                        </div>
                    <?php endforeach; ?>
                    <hr>
                    <div class="total-line-table">
                        <div class="total-line-table__list">
                            <div class="total-line-table__item">
                                <p class="total-line-table__txt">
                                    Tạm tính
                                </p>
                                <h4 class="total-line-table__price">
                                    <?php echo $_SESSION['tongtien']; ?> &#8363;
                                </h4>
                            </div>
                            <div class="total-line-table__item">
                                <p class="total-line-table__txt">
                                    Thuế VAT
                                </p>
                                <h4 class="total-line-table__price">
                                    10%
                                </h4>
                            </div>
                            <div class="total-line-table__item">
                                <p class="total-line-table__txt">
                                    Phí vận chuyển
                                </p>
                                <h4 class="total-line-table__price">
                                    ____
                                </h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--  -->
                    <div class="total__list">
                        <div class="total__item">
                            <p class="total__txt">Tổng cộng</p>
                            <h3 class="total__price"><?php echo formatPrice($_SESSION['total']); ?> &#8363;</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
