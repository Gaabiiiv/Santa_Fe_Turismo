<?php

require_once 'Database.php';

class Rating {

    public static function create($data) {

        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO ratings
            (score, comment, user_id, place_id)
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['score'],
            $data['comment'],
            $data['user_id'],
            $data['place_id']
        ]);
    }

    public static function getByPlace($place_id) {

        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT *
            FROM ratings
            WHERE place_id = ?
        ");

        $stmt->execute([$place_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAverage($place_id) {

        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT AVG(score) as avg_score
            FROM ratings
            WHERE place_id = ?
        ");

        $stmt->execute([$place_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC)['avg_score'];
    }
}
