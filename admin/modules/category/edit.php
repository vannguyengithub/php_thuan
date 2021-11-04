
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

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name'))
        ];

        $error = [];

        if(postInput('name') == '')
        {
            $error['name'] = "Hãy nhập đầy đủ tên danh mục !";
        }

        // nếu error trống có nghĩa là không có lỗi.
        if(empty($error))
        {
             // Kiểm tra trùng
             if($editCategory['name'] != $data['name'])
             {
                $isset = $db->fetchOne("category", "name = '".$data['name']."' ");
                if($isset > 0) 
                {
                    $_SESSION['error'] = "Tên danh mục đã tồn tại !";
                }
                else
                {
                    $id_update = $db->update("category", $data, array('id' => $id));
                    if($id_update > 0)
                    {
                        $_SESSION['success'] = "Updated thành công !";
                        redirectAdmin("category");
                    } else 
                    {
                        // thêm thất bại.   
                        $_SESSION['error'] = "Dữ liệu không thay đổi !";
                    }
                }
             }
             else
             {
                $id_update = $db->update("category", $data, array('id' => $id));
                if($id_update > 0)
                {
                    $_SESSION['success'] = "Updated thành công !";
                    redirectAdmin("category");
                } else 
                {
                    // thêm thất bại.   
                    $_SESSION['error'] = "Dữ liệu không thay đổi !";
                    redirectAdmin("category");
                }
             }
        } 
    }
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">SỬA TÊN <span class="border-bottom-success">CATEGORY</span></h1>
        <?php require_once __DIR__.'/../../../partials/notification.php' ?>
        <!--  -->
        <div class="row">
            <div class="card-body">
                <form class="form-horizontal" action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Nhập Tên Danh Mục</label>
                        <input name="name" value="<?php echo $editCategory["name"]; ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?></p>
                        <?php endif; ?>
                      
                    </div>
                
                    <button type="submit" class="btn btn-primary">Add now</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Kết thúc Nội Dung-->
<?php   require_once __DIR__ . '/../../layouts/footer.php' ?>    
