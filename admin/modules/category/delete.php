
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
        xóa danh mục có sản phẩm.
*/
    $is_product = $db->fetchOne("product", "category_id = $id ");
    if ($is_product == NULL)
    {
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
    }
    else
    {
        $_SESSION['error'] = "Bạn không thể xóa khi có sản phẩm trong danh mục !";
        redirectAdmin("category");
    }
?>


