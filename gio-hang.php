<?php
    require_once __DIR__ . '/autoload/autoload.php';
    $sum = 0;
    if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    {
        echo "<script> alert('Giỏ hàng của bạn chưa có sản phẩm!'); location.href='index.php' </script>";
    }
?>
    <?php require_once __DIR__ . '/layouts/header.php'; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--  -->
    <section class="market">
        <div class="grid wide">
            <div class="market-title">
                <h1 style=" font-size: 2rem; 
                            text-align: center;
                            margin: 28px 0;
                            text-transform: uppercase;
                            font-weight: 700;">
                            Giỏ hàng 
                </h1>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr class="tab-title">
                        <th scope="col">Stt</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php $stt = 1; foreach($_SESSION['cart'] as $key => $value) : ?>
                        <tr>
                            <th class="cart__edit"><?php echo $stt; ?></th>
                            <td class="cart__edit"><?php echo $value['name']; ?></td>
                            <td class="cart__edit"><img class="img-cart" src="<?php echo uploads(); ?>product/<?php echo $value['thunbar']; ?>" alt=""></td>
                            <td>
                                <input style="width: 38px;" name="qty" id="qty" min="0" type="number" value="<?php echo $value['qty']; ?>">
                            </td>
                            <td class="cart__edit"><?php echo $value['price']; ?>&#8363;</td>
                            <td class="cart__edit"><?php echo formatPrice($value['price'] * $value['qty']); ?>&#8363;</td>
                            <td class="cart__edit">
                                <a class="btn btn-xs btn-info updateCart" id="updateC" data-key=<?php echo $key; ?> href="" onload="script();"><i class="fas fa-spinner"></i></a>
                            </td>
                            <td class="cart__edit">
                                <a class="btn btn-xs btn-danger" href="remove.php?key=<?php echo $key; ?>" onclick="return confirm('bạn chắc chắn muốn xóa!');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php  $sum += $value['price'] * $value['qty']; $_SESSION['tongtien'] = $sum ; ?>
                    <?php $stt++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <script>
        $( function(){
            $updatecart = $(".updateCart");
            $updatecart.click(function(e) {
                e.preventDefault();
                $qty = $(this).parents('tr').find("#qty").val();
                
                $key = $(this).attr("data-key");
                $.ajax({
                    url: 'cap-nhat-gio-hang.php',
                    type: 'GET',
                    data: {'qty': $qty, 'key': $key},
                    success: function(data)
                    {
                        if(data == 1)
                        {   
                            alert('Cập nhật thành công!');
                            window.location = "thanh-toan.php";
                        }
                    }
                });
            });
        })
    </script>
    <section class="total-inner mb-4">
        <div class="grid wide">
            <div class="l-6 c-12">
                <ul class="list-group">
                    <li class="list-group-item text-center mt-5 bg-dark text-white" style="font-size: 1.1rem; ">THÔNG TIN ĐƠN HÀNG</li>
                    <li class="list-group-item"><h5> SỐ TIỀN:  &nbsp; &nbsp;<?php echo $_SESSION['tongtien']; ?> &#8363; </h5> </li>
                    <li class="list-group-item"><h5> THUẾ VAT:  &nbsp; &nbsp;10%</h5> </li>
                    <li class="list-group-item"><h5> TỔNG TIỀN THANH TOÁN:  &nbsp; &nbsp;<?php $_SESSION['total'] = $_SESSION['tongtien'] * 110/100; echo formatPrice($_SESSION['total']) ?> &#8363; </h5> </li>
                    <li class="list-group-item text-center ">
                        <a class="btn btn-success " href="index.php"><h5>Tiếp tục mua hàng</h5></a>
                        <a class="btn btn-success " href="thanh-toan.php"><h5>Thanh toán</h5></a>
                    </li>
                </ul>
            </div>
            <div class="l-6 c-12">

            </div>
        </div>
    </section>
    <!--  -->
    <?php require_once __DIR__ . '/layouts/footer.php'; ?>
    