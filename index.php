<?php
    require_once 'controller/post.php';

    $controller = new PostController($pdo);
    $controller->index();
?>