<?php
    require_once './aplicacion/models/auth.model.php';
    require_once './aplicacion/view/auth.view.php';

class AuthControllers{
    private $models;
    private $view;

    public function __construct() {
        $this->models = new UserModel();
        $this->view = new AuthView(); 
    }


    public function showLogin() {
        // Muestro el formulario de login
        return  $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['user']) || empty($_POST['user']))  {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }

        if (!isset($_POST['password']) || empty($_POST['password']))  {
            return $this->view->showLogin('Falta completar la contraseña');
        
        }

        $user = $_POST['user'];
        $password = $_POST['password'];

        // Verifico si el usuario existe en la base de datos
        $userFromDB = $this->models->getUser($user);

        if($userFromDB && password_verify($password, $userFromDB->password)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] =  $userFromDB->id;
            $_SESSION['NAME_USER'] =  $userFromDB->user;
            $_SESSION['LAST_ACTIVITY'] =  time();

            // Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Usuario o contraseña incorrectos');
        }
    }

    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }

}