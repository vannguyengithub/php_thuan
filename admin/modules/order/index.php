
<?php
    $open = 'order';
    require_once __DIR__ . '/../../autoload/autoload.php';   

    $orders = $db->fetchAll('orders');
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

    $sql = "SELECT transaction.*, transaction.name as nameuser, orders.name as nameorders, orders.qty as qtyorders, orders.id as delID, transaction.amount as total, orders.product_id as idproduct  FROM orders LEFT JOIN transaction ON transaction.id = orders.transaction_id ORDER BY ID DESC";
    $orders = $db->fetchJone('orders', $sql, $p, 10, true);

    if(isset($orders['page']))
    {
        $sotrang = $orders['page'];
        unset($orders['page']);
    }
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 text-gray-800">DANH SÁCH <span class="border-bottom-warning">ĐƠN HÀNG</span></h1>
    <div class="row">
        <div class="card-body">
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
                            <th>name</th>
                            <th>SĐT</th>
                            <th>Address</th>
                            <th>Name product</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <th>STT</th>
                            <th>Họ Và Tên</th>
                            <th>name</th>
                            <th>SĐT</th>
                            <th>Address</th>
                            <th>Name product</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>DELETE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $stt= 1; foreach ($orders as $item) :?>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['nameuser'] ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['phone'] ?></td>
                            <td><?php echo $item['address'] ?></td>
                            <td><?php echo $item['nameorders'] ?></td>
                            <td><?php echo $item['qtyorders'] ?></td>
                            <td><?php echo $item['total']?>vnđ</td>
                            <td><a class="btn btn-outline-danger" href="delete.php?id=<?php echo $item['delID'] ?>"> Delete </a></td>
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
               