<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ .
    '/../app/controllers/UserController.php';

require_once __DIR__ .
    '/../app/controllers/PlaceController.php';

require_once __DIR__ .
    '/../app/controllers/RatingController.php';

$action = $_GET['action'] ?? 'places';

switch ($action) {

    case 'register':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new UserController())->register();
        }

        require __DIR__ .
            '/../app/views/register.php';

        break;

    case 'login':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new UserController())->login();
        }

        require __DIR__ .
            '/../app/views/login.php';

        break;

    case 'logout':

        session_destroy();

        header("Location: index.php?action=login");
        exit;

    case 'places':

        (new PlaceController())->index();
        break;

    case 'addplaces':

        require __DIR__ . '/../app/views/addplaces.php';
        break;

    case 'create_place':

        (new PlaceController())->create();
        break;

    case 'place':

        (new PlaceController())->show();
        break;

    case 'rate':

        (new RatingController())->create();
        break;

    default:

        echo "404";
}
