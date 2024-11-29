<?php
    require_once 'Includes/database.php';
    require_once 'models/post.php';

    class PostController {
        private $postModel;

        public function __construct($pdo) {
            $this->postModel = new Post($pdo);
        }

        public function index() {
            $posts = $this->postModel->getPosts(20);
            include 'views/post.php';
        }
    }
?>