
<?php
    $open = 'admin';
    require_once __DIR__ . '/../../autoload/autoload.php';   

    $admin = $db->fetchAll('admin');

    /**
     * Phân trang
     */
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    $sql = "SELECT admin.* FROM admin ORDER BY ID DESC";

    $product = $db->fetchJone('product', $sql, $p, 4, true);
    if(isset($product['page']))
    {
        $sotrang = $product['page'];
        unset($product['page']);
    }

?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 text-gray-800">DANH SÁCH <span class="border-bottom-warning">ADMIN</span></h1>
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
                            <td><?php echo $item['level'] ?></td>
                            <td><a class="btn btn-outline-info" href="edit.php?id=<?php echo $item['id'] ?>"> Edit </a></td>
                            <td><a class="btn btn-outline-danger" href="delete.php?id=<?php echo $item['id'] ?>"> Delete </a></td>
                        </tr>
                        <?php $stt++;  endforeach; ?>
                    </tbody>
                </table>
                <!-- phân trang -->
                <div class="pull-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination float-right">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php for($i = 1 ; $i <=  $sotrang ; $i++ ) : ?>
                                <?php
                                    if(isset($_GET['page']))
                                    {
                                        $p = $_GET['page'];
                                    }    
                                    else
                                    {
                                        $p = 1;
                                    }
                                ?>
                                <li class="page-item <?php echo ( $i == $p ) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>

                            <?php endfor; ?>
                            
                            
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Kết thúc Nội Dung-->
<?php   require_once __DIR__ . '/../../layouts/footer.php'?>    
               