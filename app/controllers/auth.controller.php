<?php
require_once './app/views/auth.view.php';
require_once './app/models/user.model.php';
require_once './helpers/auth.helper.php';

class AuthController{
    private $view;
    private $model;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function auth(){ //autenticacion de Usuario
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $this->view->showLogin('Datos incompletos');
            return;
        }

        //traigo el usuario de la base de datos
        $user = $this->model->getByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            // se autentican las credenciales y permito el acceso
            AuthHelper::login($user);
            header('Location: ' . BASE_URL . "listAdmin");
        } else {
            //se redirije para volver a ingresar.
            $this->view->showLogin('Usuario inválido'); 
        }
    }

    public function logout(){
        AuthHelper::logout();
        header('Location: ' . BASE_URL);
    }

}

// $clave='admin';
// echo password_hash($clave,PASSWORD_BCRYPT);

