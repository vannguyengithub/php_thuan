
<?php
    $open = 'news';
    require_once __DIR__ . '/../../autoload/autoload.php';

    $id = intval(getInput('id')); // lấy id
    
    $editNew = $db->fetchID("new", $id);
        if (empty($editNew))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('news');
        }

/*
      
*/

    $num = $db->delete("new", $id);
    if ($num > 0)
    {
        $_SESSION['success'] = " Xóa thành công !";
        redirectAdmin("news");
    } 
    else
    {
        $_SESSION['error'] = " Xóa không thành công !";
        redirectAdmin("news");
    }
?>


