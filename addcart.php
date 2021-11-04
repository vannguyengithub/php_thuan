<?php
    require_once __DIR__. "/autoload/autoload.php";

    // if( !isset($_SESSION['name_id'])) 
    // {
    //     echo "<script> alert('Mời bạn đăng nhập trước !'); location.href='index.php' </script>";
    // }



    // lấy id
    $id = intval(getInput('id'));
    $product = $db->fetchID("product", $id);
     
    /**
     * kiểm tra nếu tồn tại thì cập nhật thêm product vào giỏ hàng 
     * ngược lại thì tạo mới 
     */

    if( !isset($_SESSION['cart'][$id]))
    {
        // tạo mới giỏ hàng mới.
        $_SESSION['cart'][$id]['name']      = $product['name'];
        $_SESSION['cart'][$id]['thunbar']   = $product['thunbar'];
        $_SESSION['cart'][$id]['qty']       = 1;
        $_SESSION['cart'][$id]['price']   = ((100 - $product['sale']) * ($product['price'])) / 100;
    }
    else
    {
        // cập nhật lại giỏ hàng
        $_SESSION['cart'][$id]['qty'] += 1;
    }
    echo "<script> alert('Thêm giỏ hàng thành công! hãy vào giỏ hàng để xem!');location.href='gio-hang.php' </script>";
?>