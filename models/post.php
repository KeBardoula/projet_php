<?php
    class post {
        private $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function getPosts($limit = 20) {
            try {
                $stmt = $this->pdo->prepare('SELECT title, content FROM article LIMIT :limit');
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                return [];
            }
        }
    }
?>