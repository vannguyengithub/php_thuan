
<?php
    $open = 'admin';
    require_once __DIR__ . '/../../autoload/autoload.php';   

    $admin = $db->fetchAll('admin');
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 text-gray-800">DANH SÁCH <span class="border-bottom-warning">ADMIN & CTV</span></h1>
    <div class="row">
        <div class="card-body">
            <a class="btn btn-primary"href="add.php">Thêm Mới <span class="border-bottom-warning">Admin</span></a>
        </div>
        <!-- thông báo lỗi -->
        <?php require_once __DIR__.'/../../../partials/notification.php' ?>
        <!-- end thông báo lỗi -->
    </div>
   
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-light">
                        <tr class="text-center">
                            <th>STT</th>
                            <th>Họ Và Tên</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Vị Trí</th>
                            <th>EDIT</th>           
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                        <th>STT</th>
                            <th>Họ Và Tên</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Vị Trí</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $stt= 1; foreach ($admin as $item) :?>
                        <tr class="text-center">
                            <td><?php echo $stt?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['phone'] ?></td>
                            <td><?php echo $item['email'] ?></td>
                            <td><?php echo $item['address'] ?></td>
                            <td><?php echo $item['level'] == 1 ? 'CTV' : 'Admin' ?></td>
                            <td><a class="btn btn-outline-info" href="edit.php?id=<?php echo $item['id'] ?>"> Edit </a></td>
                            <td><a class="btn btn-outline-danger" href="delete.php?id=<?php echo $item['id'] ?>"> Delete </a></td>
                        </tr>
                        <?php $stt++;  endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
    <!-- Kết thúc Nội Dung-->
<?php   require_once __DIR__ . '/../../layouts/footer.php'?>    
               