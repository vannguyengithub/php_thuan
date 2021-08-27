<?php

    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";





    // -------xóa----------------
    // lấy id 
    $id = intval(getInput('id')); 

    $deleteAdmin = $db->fetchID("admin", $id);
    if( empty($deleteAdmin))
        {
            $_SESSION['error'] = "Dữ Liệu Không Tồn Tại";
            redirectAdmin("admin");
        }
    // end Id 

    

    $num = $db-> delete("admin", $id);
    if ($num > 0)
        {
            $_SESSION['success'] = "Xóa Thành Công ";
            redirectAdmin("admin");
        }else
        {
            $_SESSION['error'] = "Xóa Thất Bại";
            redirectAdmin("admin");
        }
   
?>
