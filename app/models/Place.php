<?php

require_once 'Database.php';

class Place {

    public static function all() {

        $db = Database::connect();

        $stmt = $db->query("
            SELECT *
            FROM places
            ORDER BY id DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {

        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO places
            (name, description, location, user_id, image)
            VALUES (?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['name'],
            $data['description'],
            $data['location'],
            $data['user_id'],
            $data['image']
        ]);
    }

    public static function find($id) {

        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT *
            FROM places
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
