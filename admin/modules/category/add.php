
<?php
    $open = 'category';
    require_once __DIR__ . '/../../autoload/autoload.php';

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
            $isset = $db->fetchOne("category", "name = '".$data['name']."' ");
            if($isset > 0) 
            {
                $_SESSION['error'] = "Tên danh mục đã tồn tại !";
            }
            else 
            {
                $id_insert = $db->insert("category", $data);
                if($id_insert > 0)
                {
                    $_SESSION['success'] = "Thêm mới thành công !";
                    redirectAdmin("category");
                } else 
                {
                    // thêm thất bại.   
                    $_SESSION['error'] = "Thêm mới thất bại !";
                }
            }

            
        } 
    }
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">THÊM MỚI<span class="border-bottom-success">CATEGORY</span></h1>
        <?php require_once __DIR__.'/../../../partials/notification.php' ?>
        <!--  -->
        <div class="row">
            <div class="card-body">
                <form class="form-horizontal" action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Nhập Tên Danh Mục</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
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
               