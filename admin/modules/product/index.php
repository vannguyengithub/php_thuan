
<?php
    $open = 'product';
    require_once __DIR__ . '/../../autoload/autoload.php';   

    $product = $db->fetchAll('product');

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

    $sql = "SELECT product.*, category.name as namecate FROM product
            LEFT JOIN category on category.id = product.category_id";

    $product = $db->fetchJone('product', $sql, $p, 10, true);
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
        <h1 class="h3 text-gray-800">DANH SÁCH <span class="border-bottom-danger">SẢN PHẨM</span></h1>
    <div class="row">
        <div class="card-body">
            <a class="btn btn-primary"href="add.php">Thêm Mới <span class="border-bottom-danger">Product</span></a>
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Update_date</th>
                            <th>Category_id</th>
                            <th>price</th>
                            <th>Sale (%)</th>
                            <th>Ảnh (thunbar)</th>
                            <th>Số Lượng</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <th>STT</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Update_date</th>
                            <th>Category_id</th>
                            <th>price</th>
                            <th>Sale (%)</th>
                            <th>Ảnh (thunbar)</th>
                            <th>Số Lượng</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $stt= 1; foreach ($product as $item) :?>
                        <tr class="text-center">
                            <td><?php echo $stt?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['slug'] ?></td>
                            <td><?php echo $item['created_at'] ?></td>
                            <td><?php echo $item['namecate'] ?></td>
                            <td><?php echo $item['price']?> &#8363; </td>
                            <td><?php echo $item['sale']?> %</td>
                            <td><img src="<?php echo uploads() ?>product/<?php echo $item['thunbar_3']?>" width="125px" height="110px" ></td>
                            <td><?php echo $item['number'] ?></td>
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
               