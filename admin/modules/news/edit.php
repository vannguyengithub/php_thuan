
<?php
    $open = 'news';
    require_once __DIR__ . '/../../autoload/autoload.php';

    $id = intval(getInput('id')); // lấy id
    
    $editNew = $db->fetchID("new", $id);
        if (empty($editNew))
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại!";
            redirectAdmin('news');
        }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name"          => postInput('name'),
            "slug"          => to_slug(postInput('name')),
            "description"   => postInput('description'),
            "content"       => postInput('content'),
        ];

        $error = [];

        if(postInput('name') == '')
        {
            $error['name'] = "Hãy nhập đầy đủ tiêu đề tin tức !";
        }

        if(postInput('description') == '')
        {
            $error['description'] = "Bạn hãy viết mô tả về tin tức !";
        }

        if(postInput('content') == '')
        {
            $error['content'] = "Bạn hãy viết nội dung gì đó về tin tức !";
        }

       

        if (! isset($_FILES['thunbar_new']))
        {
            $error['thunbar_new'] = "Hãy chọn hình ảnh !";
        }


        // nếu error trống có nghĩa là không có lỗi.
        if(empty($error))
        {
            if (isset($_FILES['thunbar_new']))
            {
                $file_name = $_FILES['thunbar_new']['name'];
                $file_tmp = $_FILES['thunbar_new']['tmp_name'];
                $file_type = $_FILES['thunbar_new']['type'];
                $file_error = $_FILES['thunbar_new']['error'];

                if ($file_error == 0)
                {
                    $part = ROOT ."new/";
                    $data["thunbar_new"] = $file_name;
                }
            }
            
            /**
             * thành công rồi updated
             */
             $update = $db->update("new", $data, array("id"=>$id));
             if ($update > 0)
             {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION["success"] = "Update thành công !";
                redirectAdmin("news");
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
        <h1 class="h3 mb-4 text-gray-800">CHỈNH SỬA <span class="border-bottom-warning">NEW (tin tức)</span></h1>
        <?php require_once __DIR__.'/../../../partials/notification.php' ?>
        <!--  -->
        <div class="row">
            <div class="card-body">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Nhập tiêu đề tin tức</label>
                        <textarea name="name" class="form-control" id="" cols="30" rows="3" placeholder="Hi, nhập tiêu đề tại đây."> <?php echo $editNew['name']; ?> </textarea>
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?></p>
                        <?php endif; ?>
                      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Nhập description (Mô tả)</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="5" placeholder="Hi, nhập mô tả tại đây."> <?php echo $editNew['description']; ?> </textarea>
                        <?php if (isset($error['description'])): ?>
                            <p class="text-danger"> <?php echo $error['description']; ?></p>
                        <?php endif; ?>
                      
                    </div>
                  
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold"> Hình Ảnh (tin tức)</label>
                        <input name="thunbar_new" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <div class="text-center">
                            <img src="<?php echo uploads() ?>new/<?php echo $editNew['thunbar_new']; ?>" alt="" style="width: 200px; height: 200px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Nội Dung (tin tức)</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"> <?php echo $editNew['content']; ?> </textarea>
                        <?php if (isset($error['content'])): ?>
                            <p class="text-danger"> <?php echo $error['content']; ?></p>
                        <?php endif; ?>
                      
                    </div>
                
                    <button type="submit" class="btn btn-primary">Add now</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Kết thúc Nội Dung-->
<?php   require_once __DIR__ . '/../../layouts/footer.php' ?>    
        <script type="text/javascript"> 
		// summer note
			$(function() {
				$('#content').summernote({
				height: 350,   //set editable area's height
				});
		})
	    </script>
        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
