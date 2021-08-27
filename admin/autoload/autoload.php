<?php
        session_start();
        require_once __DIR__.'/../../libraries/Database.php';
        require_once __DIR__.'/../../libraries/Function.php';
        $db = new Database;






        /**
         * đến file để lưu ảnh của product
         */
        define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/website/public/uploads/");

        
?>