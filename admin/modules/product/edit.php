
<?php
    $open = 'product';
    require_once __DIR__ . '/../../autoload/autoload.php';
    $category = $db->fetchAll("category");  // lấy tất cả dữ liệu trong bảng category

    $id = intval(getInput('id')); // lấy id
    
    $editProduct = $db->fetchID("product", $id);
        if (empty($editProduct))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('product');
        }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name"          => postInput('name'),
            "slug"          => to_slug(postInput('name')),
            "category_id"   => postInput('category_id'),
            "price"         => postInput('price'),
            "content"       => postInput('content'),
            "number"        => postInput('number'),
            "sale"          => postInput('sale'),
        ];

        $error = [];

        if(postInput('name') == '')
        {
            $error['name'] = "Hãy nhập đầy đủ tên danh mục !";
        }

        if(postInput('category_id') == '')
        {
            $error['category_id'] = "Bạn hãy chọn danh mục !";
        }

        if(postInput('price') == '')
        {
            $error['price'] = "Bạn hãy nhập giá cho sản phẩm !";
        }

        

        // nếu error trống có nghĩa là không có lỗi.
        if(empty($error))
        {
            if (isset($_FILES['thunbar']))
            {
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_error = $_FILES['thunbar']['error'];

                if ($file_error == 0)
                {
                    $part = ROOT ."product/";
                    $data["thunbar"] = $file_name;
                }
            }
            if (isset($_FILES['thunbar_1']))
            {
                $file_name = $_FILES['thunbar_1']['name'];
                $file_tmp = $_FILES['thunbar_1']['tmp_name'];
                $file_type = $_FILES['thunbar_1']['type'];
                $file_error = $_FILES['thunbar_1']['error'];

                if ($file_error == 0)
                {
                    $part = ROOT ."product/";
                    $data["thunbar_1"] = $file_name;
                }
            }
            if (isset($_FILES['thunbar_2']))
            {
                $file_name = $_FILES['thunbar_2']['name'];
                $file_tmp = $_FILES['thunbar_2']['tmp_name'];
                $file_type = $_FILES['thunbar_2']['type'];
                $file_error = $_FILES['thunbar_2']['error'];

                if ($file_error == 0)
                {
                    $part = ROOT ."product/";
                    $data["thunbar_2"] = $file_name;
                }
            }
            if (isset($_FILES['thunbar_3']))
            {
                $file_name = $_FILES['thunbar_3']['name'];
                $file_tmp = $_FILES['thunbar_3']['tmp_name'];
                $file_type = $_FILES['thunbar_3']['type'];
                $file_error = $_FILES['thunbar_3']['error'];

                if ($file_error == 0)
                {
                    $part = ROOT ."product/";
                    $data["thunbar_3"] = $file_name;
                }
            }
            

            /**
             * thành công rồi updated
             */
             $update = $db->update("product", $data, array("id"=>$id));
             if ($update > 0)
             {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION["success"] = "Update thành công !";
                redirectAdmin("product");
             }
             else
             {
                 $_SESSION["error"] = "Update thất bại !";
             }
        } 
    }
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">CHỈNH SỬA <span class="border-bottom-danger">SẢN PHẨM</span></h1>
        <?php require_once __DIR__.'/../../../partials/notification.php' ?>
        <!--  -->
        <div class="row">
            <div class="card-body">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Danh Mục Sản Phẩm</label>
                        <select name="category_id" id="" class="form-control">
                            <option value=""> - Chọn Danh Mục Của Sản Phẩm -  </option>
                            <?php foreach ($category as $item) : ?>
                                <option value="<?php echo $item['id']; ?>" <?php echo $editProduct['category_id'] == $item['id'] ? "selected = 'selected'" : ''; ?> > <?php echo $item['name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($error['category_id'])): ?>
                            <p class="text-danger"> <?php echo $error['category_id']; ?></p>
                        <?php endif; ?>
                      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Tên Sản Phẩm</label>
                        <input name="name" value="<?php echo $editProduct['name']; ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name product">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?></p>
                        <?php endif; ?>
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Giá Sản Phẩm (vnđ)</label>
                        <input name="price" value="<?php echo $editProduct['price']; ?>" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="$.Enter price product...">
                       
                      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Số Lượng Sản Phẩm</label>
                        <input name="number" value="<?php echo $editProduct['number']; ?>" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                      
                      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold"> Giảm giá (%)</label>
                        <input name="sale" value="<?php echo $editProduct['sale']; ?>" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0%">
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold"> Hình Ảnh </label>
                        <input name="thunbar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                       
                        <br>
                        <div class="text-center">
                            <img src="<?php echo uploads() ?>product/<?php echo $editProduct['thunbar']; ?>" alt="" style="width: 200px; height: 200px;">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold"> Ảnh Details (chi tiết sản phẩm) </label>
                        <input name="thunbar_1" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <br>
                        <div class="text-center">
                            <img src="<?php echo uploads() ?>product/<?php echo $editProduct['thunbar_1']; ?>" alt="" style="width: 200px; height: 200px;">
                        </div>

                        <input name="thunbar_2" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <br>
                        <div class="text-center">
                            <img src="<?php echo uploads() ?>product/<?php echo $editProduct['thunbar_2']; ?>" alt="" style="width: 200px; height: 200px;">
                        </div>

                        <input name="thunbar_3" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <br>
                        <div class="text-center">
                            <img src="<?php echo uploads() ?>product/<?php echo $editProduct['thunbar_3']; ?>" alt="" style="width: 200px; height: 200px;">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Nội Dung (Content)</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?php echo $editProduct['content']; ?></textarea>
                       
                    </div>
                
                    <button type="submit" class="btn btn-primary">Add now</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Kết thúc Nội Dung-->
<?php   require_once __DIR__ . '/../../layouts/footer.php' ?>
<!-- include ckeditor css/js -->    
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
        <!-- include ckeditor css/js -->
        