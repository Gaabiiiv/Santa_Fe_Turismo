<?php

require_once __DIR__ . '/../models/Place.php';
require_once __DIR__ . '/../models/Rating.php';

class PlaceController {

    public function index() {

        $places = Place::all();

        require __DIR__ . '/../views/places.php';
    }

    public function create() {

        if (!isset($_SESSION['user'])) {

            header("Location: index.php?action=login");
            exit;
        }

        if ($_POST) {

            $imageName = null;

            if (!empty($_FILES['image']['name'])) {

                $imageName =
                    time() . "_" .
                    basename($_FILES['image']['name']);

                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    __DIR__ .
                    '/../../public/uploads/' .
                    $imageName
                );
            }

            $_POST['user_id'] = $_SESSION['user']['id'];
            $_POST['image'] = $imageName;

            Place::create($_POST);

            header("Location: index.php?action=places");
            exit;
        }
    }

    public function show() {

        $place = Place::find($_GET['id']);

        $ratings = Rating::getByPlace($_GET['id']);

        $average = Rating::getAverage($_GET['id']);

        require __DIR__ . '/../views/place_detail.php';
    }
}
