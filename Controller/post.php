<?php
    require_once 'Includes/database.php';
    require_once 'models/post.php';

    class PostController {
        private $postModel;

        public function __construct($pdo) {
            $this->postModel = new Post($pdo);
        }

        public function index() {
            $limit = 10; // Nombre de posts par page
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            $posts = $this->postModel->getPosts($limit, $offset);
            $totalPosts = $this->postModel->getTotalPosts(); 
            $totalPages = ceil($totalPosts / $limit);

            include 'views/post.php';
        }
    }
?>