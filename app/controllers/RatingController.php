<?php

require_once __DIR__ . '/../models/Rating.php';

class RatingController {

    public function create() {

        if (!isset($_SESSION['user'])) {

            header("Location: index.php?action=login");
            exit;
        }

        if ($_POST) {

            $_POST['user_id'] =
                $_SESSION['user']['id'];

            Rating::create($_POST);

            header(
                "Location: index.php?action=place&id=" .
                $_POST['place_id']
            );

            exit;
        }
    }
}
