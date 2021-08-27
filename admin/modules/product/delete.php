
<?php
    $open = 'product';
    require_once __DIR__ . '/../../autoload/autoload.php';

    $id = intval(getInput('id')); // lấy id
    
    $editProduct = $db->fetchID("product", $id);
        if (empty($editProduct))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('product');
        }

/*
      
*/

    $num = $db->delete("product", $id);
    if ($num > 0)
    {
        $_SESSION['success'] = " Xóa thành công !";
        redirectAdmin("product");
    } 
    else
    {
        $_SESSION['error'] = " Xóa không thành công !";
        redirectAdmin("product");
    }
?>


