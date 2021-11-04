
<?php
    $open = 'category';
    require_once __DIR__ . '/../../autoload/autoload.php';

    $id = intval(getInput('id')); // lấy id
    
    $editCategory = $db->fetchID("category", $id);
        if (empty($editCategory))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('category');
        }

/*
      
*/

    $num = $db->delete("category", $id);
    if ($num > 0)
    {
        $_SESSION['success'] = " Xóa thành công !";
        redirectAdmin("category");
    } 
    else
    {
        $_SESSION['error'] = " Xóa không thành công !";
        redirectAdmin("category");
    }
?>


