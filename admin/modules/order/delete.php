
<?php
    $open = 'order';
    require_once __DIR__ . '/../../autoload/autoload.php';

    $id = intval(getInput('id')); // lấy id
    $editOrder = $db->fetchID("orders", $id);
        if (empty($editOrder))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('order');
        }

/*
      
*/

    $num = $db->delete("orders", $id);
    if ($num > 0)
    {
        $_SESSION['success'] = " Xóa thành công !";
        redirectAdmin("order");
    } 
    else
    {
        $_SESSION['error'] = " Xóa không thành công !";
        redirectAdmin("order");
    }
?>


