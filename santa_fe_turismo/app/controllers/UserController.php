<?php

require_once __DIR__ . '/../models/User.php';

class UserController {

    public function register() {

        if ($_POST) {

            User::create($_POST);

            header("Location: index.php?action=login");
            exit;
        }
    }

    public function login() {

        if ($_POST) {

            $user = User::findByEmail($_POST['email']);

            if (
                $user &&
                password_verify($_POST['password'], $user['password'])
            ) {

                $_SESSION['user'] = $user;

                header("Location: index.php?action=places");
                exit;
            }

            echo "Credenciales incorrectas";
        }
    }
}
