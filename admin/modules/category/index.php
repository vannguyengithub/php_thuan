
<?php
    $open = 'category';
    require_once __DIR__ . '/../../autoload/autoload.php';   

    $category = $db->fetchAll('category');
?>


<?php   require_once __DIR__ . '/../../layouts/header.php'?>    
    <!-- Nội Dung -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">DANH SÁCH <span class="border-bottom-success">CATEGORY</span></h1>
    <div class="row">
        <div class="card-body">
            <a class="btn btn-primary"href="add.php">Thêm Mới <span class="border-bottom-success">Category</span></a>
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
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Update_date</th>
                            <th>Show Home</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Update_date</th>
                            <th>Show Home</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $stt= 1; foreach ($category as $item) :?>
                        <tr>
                            <td><?php echo $stt?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['slug'] ?></td>
                            <td><?php echo $item['created_at'] ?></td>
                            <td>
                                <a href="home.php?id=<?php echo $item['id']; ?>" class="btn btn-xs <?php echo $item['home'] == 1 ? 'btn-info' : 'btn-default'; ?>">
                                    <?php echo $item['home'] == 1 ? 'Hiển thị' : 'Không'; ?>
                                </a>
                            </td>
                            <td><a class="btn btn-outline-info" href="edit.php?id=<?php echo $item['id'] ?>"> Edit </a></td>
                            <td><a class="btn btn-outline-danger" href="delete.php?id=<?php echo $item['id'] ?>"> Delete </a></td>
                        </tr>
                        <?php $stt++;  endforeach; ?>
                    </tbody>
                </table>
                <!-- phân trang -->
                <div class="pull-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
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
               