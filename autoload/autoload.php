<?php
        session_start();
        require_once __DIR__.'/../libraries/Database.php';
        require_once __DIR__.'/../libraries/Function.php';
        $db = new Database;






        /**
         * đến file để lưu ảnh của product
         */
        define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/website/public/uploads/");

        $category = $db->fetchAll('category');  

        
        /**
         * lấy danh sách sản phẩm mới
         */

        $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 6";
        $productNew = $db->fetchsql($sqlNew);

?>