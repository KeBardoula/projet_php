<?php
    class Post {
        private $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function getPosts($limit = 10, $offset = 0) {
            try {
                $stmt = $this->pdo->prepare('SELECT title, content FROM article LIMIT :limit OFFSET :offset');
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                return [];
            }
        }

        public function getTotalPosts() {
            try {
                $stmt = $this->pdo->query('SELECT COUNT(*) FROM article');
                return $stmt->fetchColumn();
            } catch (PDOException $e) {
                return 0;
            }
        }
    }
?>