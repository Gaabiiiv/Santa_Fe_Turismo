<?php

require_once 'Database.php';

class User {

    public static function create($data) {

        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO users (username, email, password)
            VALUES (?, ?, ?)
        ");

        return $stmt->execute([
            $data['username'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
    }

    public static function findByEmail($email) {

        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT *
            FROM users
            WHERE email = ?
        ");

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
