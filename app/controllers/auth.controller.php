<?php 
require_once './app/views/auth.view.php';
require_once './app/models/user.model.php';
require_once './helpers/auth.helper.php';

class AuthController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function auth() {//recibe por post desde el login
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {//chequea que no lleguen vacios(igual el form tiene el required)
            $this->view->showLogin('Faltan completar datos');
            return;//sale ya desde aca y no pasa por los otros if
        }

        // busco el usuario
        $user = $this->model->getByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            // ACA LO AUTENTIQUE credenciales validas....
            
            AuthHelper::login($user);
            
            header('Location: ' . BASE_URL."listAdmin");
        } else {
            $this->view->showLogin('Usuario inválido'); //lo mando de nuevo al login con el mensaje de error
        }
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}
