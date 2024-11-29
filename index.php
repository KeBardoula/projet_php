<?php
    require_once 'Controller/post.php';

    $controller = new PostController($pdo);
    $controller->index();
?>