<?php

require_once __DIR__. "/autoload/autoload.php";
// lấy key
$key = intval(getInput('key'));

unset($_SESSION['cart'][$key]);
$_SESSION['success'] = "xóa sản phẩm thành công!";
header('location: gio-hang.php');

?>