
<?php
    $open = 'admin';
    require_once __DIR__ . '/../../autoload/autoload.php';
    $category = $db->fetchAll("admin");  // lấy tất cả dữ liệu trong bảng category

    $id = intval(getInput('id')); // lấy id
    
    $editAdmin = $db->fetchID("admin", $id);
        if (empty($editAdmin))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('admin');
        }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name"        => postInput('name'),
            "email"       => postInput('email'),
            "phone"       => postInput('phone'),
            "address"     => postInput('address'),
            "level"       => postInput('level')
        ];

        $error = [];

        $error = [];

    if(postInput('name') == '')
        {
            $error['name'] = "Mời Bạn Nhập Đầy Đủ  Họ Tên ";     
        }
    
    if(postInput('email') == '')
        {
            $error['email'] = "Mời Bạn Nhập Email";     
        }
        else
        {
            // kiem tra email tồn tại
            if(postInput("email") != $editAdmin['email'])
            {
                $is_check = $db->fetchOne("admin", " email = '".$data['email']."' ");
                if($is_check != NULL)
                {
                    $error['email'] = "Email Đã Tồn Tại .";
                }
            }
        }
        // end email

        if(postInput('phone') == '')
        {
            $error['phone'] = "Nhập Sđt ";     
        }    

        if(postInput('address') == '')
        {
            $error['address'] = "Nhập địa chỉ";     
        }    

        if(postInput('level') == '')
        {
            $error['level'] = "Chọn level";     
        }    

        //  pass
        if (postInput('password') != NULL && postInput("re_password") != NULL)
        {
            if(postInput('password') != postInput('re_password'))
            {
                $error['password'] = "Mật Khẩu Thay Đổi Không Khớp ";
            }
            else
            {
                $data['password'] = MD5(postInput("password"));
            }
        }

        // nếu error trống có nghĩa là không có lỗi.
        if(empty($error))
        {
            $id_update = $db->update("admin", $data, array("id" => $id));
                if ($id_update > 0)
                {     
                    $_SESSION['success'] = "Update thành công";
                    redirectAdmin("admin");
                }
                else
                {
                    $_SESSION['error'] = "Update  thất bại ";
                }
        } 
    }
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">THÊM MỚI <span class="border-bottom-warning">ADMIN</span></h1>
        <?php require_once __DIR__.'/../../../partials/notification.php' ?>
        <!--  -->
        <div class="row">
            <div class="card-body">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Họ Và Tên</label>
                        <input name="name" type="text" value="<?php echo $editAdmin['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?></p>
                        <?php endif; ?>
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold"> Email </label>
                        <input name="email" type="email" value="<?php echo $editAdmin['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger"> <?php echo $error['email']; ?></p>
                        <?php endif; ?>
                      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Số Điện Thoại (phone) </label>
                        <input name="phone" type="number" value="<?php echo $editAdmin['phone']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <?php if (isset($error['phone'])): ?>
                            <p class="text-danger"> <?php echo $error['phone']; ?></p>
                        <?php endif; ?>
                      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Mật Khẩu (Password) </label>
                        <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <?php if (isset($error['password'])): ?>
                            <p class="text-danger"> <?php echo $error['password']; ?></p>
                        <?php endif; ?>
                      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">ConfigPassword </label>
                        <input name="re_password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <?php if (isset($error['re_password'])): ?>
                            <p class="text-danger"> <?php echo $error['re_password']; ?></p>
                        <?php endif; ?>
                      
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Địa Chỉ (Address) </label>
                        <input name="address" type="text" value="<?php echo $editAdmin['address']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="hi, address">
                        <?php if (isset($error['address'])): ?>
                            <p class="text-danger"> <?php echo $error['address']; ?></p>
                        <?php endif; ?>
                      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold"> Level  </label>
                        <div class="">
                            <select class="form-control" name="level">
                            <option value="1" <?php echo isset($data['level']) && $data['level'] == 1 ? "selected = 'selected'" : ''; ?>>CTV</option>
                            <option value="2" <?php echo isset($data['level']) && $data['level'] == 2 ? "selected = 'selected'" : ''; ?>>Admin</option>
                            </select>
                        </div>
                        <?php if (isset($error['level'])): ?>
                            <p class="text-danger"> <?php echo $error['level']; ?></p>
                        <?php endif; ?>
                      
                    </div>
                
                    <button type="submit" class="btn btn-primary mt-5">Add now</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Kết thúc Nội Dung-->
<?php   require_once __DIR__ . '/../../layouts/footer.php' ?>    