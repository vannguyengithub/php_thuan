
<?php
    $open = 'admin ';
    require_once __DIR__ . '/../../autoload/autoload.php';


    /**
     * Lấy ra danh sách danh mục sản phẩm.
     */
    $category = $db->fetchAll("admin");


    $data = 
    [
        "name"        => postInput('name'),
        "email"       => postInput('email'),
        "phone"       => postInput('phone'),
        "password"    => MD5(postInput('password')),
        "address"     => postInput('address'),
        "level"       => postInput('level')
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        

        $error = [];

        if(postInput('name') == '')
        {
            $error['name'] = "Mời bạn nhập họ và tên !";     
        }
    
        if(postInput('email') == '')
        {
            $error['email'] = "Mời bạn nhập email !";     
        }
        else
        {
            // kiem tra email tồn tại 
            $is_check = $db->fetchOne("admin", " email = '".$data['email']."' ");
            if($is_check != NULL)
            {
                $error['email'] = "Email đã tồn tại !";
            }
        }
        // end email

        if(postInput('phone') == '')
        {
            $error['phone'] = "Bạn hãy nhập số điện thoại ! ";     
        }    

        if(postInput('password') == '')
        {
            $error['password'] = "Hãy nhập password !";     
        }    

        if(postInput('address') == '')
        {
            $error['address'] = "Hãy nhập địa chỉ !";     
        }    

        if(postInput('level') == '')
        {
            $error['level'] = "Hãy chọn level !";     
        }    

        if($data['password'] != MD5(postInput("re_password")))
        {
            $error['password'] = "Mật khẩu trong giống -> Nhâp lại !";
        }


        /**
         * nếu error trống có nghĩa là không có lỗi.
         */
        if(empty($error))
        {
            $id_insert = $db->insert("admin", $data);
            if ($id_insert)
            {     
                $_SESSION['success'] = "thêm mới thành công";
                redirectAdmin("admin");
            }
            else
            {
              $_SESSION['error'] = "thêm mới thất bại ";
            }
        } 
    }
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">THÊM MỚI <span class="border-bottom-danger">ADMIN</span></h1>
        <?php require_once __DIR__.'/../../../partials/notification.php' ?>
        <!--  -->
        <div class="row">
            <div class="card-body">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Họ Và Tên</label>
                        <input name="name" type="text" value="<?php echo $data['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?></p>
                        <?php endif; ?>
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold"> Email </label>
                        <input name="email" type="email" value="<?php echo $data['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger"> <?php echo $error['email']; ?></p>
                        <?php endif; ?>
                      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Số Điện Thoại (phone) </label>
                        <input name="phone" type="number" value="<?php echo $data['phone']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
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
                        <input name="address" type="text" value="<?php echo $data['address']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="hi, address">
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
        
