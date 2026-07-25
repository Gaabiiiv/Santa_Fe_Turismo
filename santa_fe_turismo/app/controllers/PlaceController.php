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

	$allowed = [
'image/jpeg',
'image/png',
'image/webp'
];

if(
!in_array(
$_FILES['image']['type'],
$allowed
)
){
die('Formato de imagen no permitido');
}



                $uploadDir = __DIR__ . '/../../public/uploads/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $imageName = uniqid('img_') . '.' . $extension;

                if (!move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    $uploadDir . $imageName
                )) {
                    die('No se pudo guardar la imagen.');
                }
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
