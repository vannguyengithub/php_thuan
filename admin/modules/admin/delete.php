
<?php
    $open = 'admin';
    require_once __DIR__ . '/../../autoload/autoload.php';

    $id = intval(getInput('id')); // lấy id
    
    $editAdmin = $db->fetchID("admin", $id);
        if (empty($editAdmin))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('admin');
        }

/*
      
*/

    $num = $db->delete("admin", $id);
    if ($num > 0)
    {
        $_SESSION['success'] = " Xóa thành công !";
        redirectAdmin("admin");
    } 
    else
    {
        $_SESSION['error'] = " Xóa không thành công !";
        redirectAdmin("admin");
    }
?>


