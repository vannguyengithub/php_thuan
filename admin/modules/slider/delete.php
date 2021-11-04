
<?php
    $open = 'slider';
    require_once __DIR__ . '/../../autoload/autoload.php';

    $id = intval(getInput('id')); // lấy id
    
    $editSlider = $db->fetchID("sliders", $id);
        if (empty($editSlider))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('slider');
        }

/*
      
*/

    $num = $db->delete("sliders", $id);
    if ($num > 0)
    {
        $_SESSION['success'] = " Xóa thành công !";
        redirectAdmin("slider");
    } 
    else
    {
        $_SESSION['error'] = " Xóa không thành công !";
        redirectAdmin("slider");
    }
?>


