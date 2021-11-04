
<?php
    $open = 'user_order';
    require_once __DIR__ . '/../../autoload/autoload.php';   

    $transaction = $db->fetchAll('transaction');
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

    $sql = "SELECT transaction.*, users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.users_id ORDER BY ID DESC";

    $transaction = $db->fetchJone('transaction', $sql, $p, 10, true);
    if(isset($transaction['page']))
    {
        $sotrang = $transaction['page'];
        unset($transaction['page']);
    }
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 text-gray-800">DANH SÁCH <span class="border-bottom-warning">KHÁCH HÀNG</span></h1>
    <div class="row">
        <div class="card-body">
            <!-- <a class="btn btn-primary"href="add.php">Thêm Mới <span class="border-bottom-warning">Admin</span></a> -->
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
                            <th>Tên(đã ĐK)</th>
                            <th>name(chưa ĐK)</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th> 
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                        <th>STT</th>
                            <th>Họ Và Tên</th>
                            <th>name</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>DELETE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $stt= 1; foreach ($transaction as $item) :?>
                        <tr class="text-center">    
                            <td><?php echo $stt?></td>
                            <td><?php echo $item['nameuser'] ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['phone'] ?></td>
                            <td><?php echo $item['email'] ?></td>
                            <td><?php echo $item['address'] ?></td>
                            <th>
                                <a href="status.php?id=<?php echo $item['id']; ?>" class="btn btn-xs <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-info'; ?>"><?php echo $item['status'] == 0 ? 'chưa xử lý' : 'đã xử lý'; ?></a>
                            </th>
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
               