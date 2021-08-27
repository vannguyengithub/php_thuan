<?php 
      $open = 'category';
      require_once __DIR__ . '/../../autoload/autoload.php';   

      $id = intval(getInput('id')); // lấy id
      $editCategory = $db->fetchID('category', $id);
      if( empty($editCategory))
      {
          $_SESSION['error'] = "Dữ liệu không tồn tại ";
          redirectAdmin('category');
      }

      $home = $editCategory['home'] == 0 ? 1 : 0;
      $update = $db->update('category', array("home" => $home ), array("id" => $id));
      if($update > 0)
        {
            $_SESSION['success'] = "Hiển thị thành công !";
            redirectAdmin("category");
        } else 
        {
            // thêm thất bại.   
            $_SESSION['error'] = "Hiển thị thất bại !";
            redirectAdmin("category");
        }
?>