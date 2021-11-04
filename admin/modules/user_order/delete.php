
<?php
    $open = 'user_order';
    require_once __DIR__ . '/../../autoload/autoload.php';

    $id = intval(getInput('id')); // lấy id

    $editTransaction = $db->fetchID("transaction", $id);
        if (empty($editTransaction))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('user_order');
        }

/*
      
*/

    $num = $db->delete("transaction", $id);
    if ($num > 0)
    {
        $_SESSION['success'] = " Xóa thành công !";
        redirectAdmin("user_order");
    } 
    else
    {
        $_SESSION['error'] = " Xóa không thành công !";
        redirectAdmin("user_order");
    }
?>


