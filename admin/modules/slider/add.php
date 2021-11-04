
<?php
    $open = 'slider';
    require_once __DIR__ . '/../../autoload/autoload.php';


    /**
     * Lấy ra danh sách danh mục sản phẩm.
     */
    $sliders = $db->fetchAll("sliders");



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];

        if (! isset($_FILES['thunbar_slider']))
        {
            $error['thunbar_slider'] = "Hãy chọn hình ảnh làm slider!";
        }


        /**
         * nếu error trống có nghĩa là không có lỗi.
         */
        if(empty($error))
        {
            if (isset($_FILES['thunbar_slider']))
            {
                $file_name = $_FILES['thunbar_slider']['name'];
                $file_tmp = $_FILES['thunbar_slider']['tmp_name'];
                $file_type = $_FILES['thunbar_slider']['type'];
                $file_error = $_FILES['thunbar_slider']['error'];

                if ($file_error == 0)
                {
                    $part = ROOT ."slider/";
                    $data["thunbar_slider"] = $file_name;
                }
            }
            /**
             * thành công rồi insert
             */
            $id_insert = $db->insert("sliders", $data);
            if ($id_insert)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION["success"] = "Thêm mới thành công !";
                redirectAdmin("slider");
            }
            else
            {
                $_SESSION["error"] = "Thêm mới thất bại !";
            }
        } 
    }
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <?php require_once __DIR__.'/../../../partials/notification.php' ?>
        <!--  -->
        <div class="row">
            <div class="card-body">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
             
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold"> Hình Ảnh Slider </label>
                        <input name="thunbar_slider" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <?php if (isset($error['thunbar_slider'])): ?>
                            <p class="text-danger"> <?php echo $error['thunbar_slider']; ?></p>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Add now</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Kết thúc Nội Dung-->
<?php   require_once __DIR__ . '/../../layouts/footer.php' ?>    
