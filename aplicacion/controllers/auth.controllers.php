<?php
    require_once './aplicacion/models/user.model.php';
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
        if (!isset($_POST['email']) || empty($_POST['email']))  {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }

        if (!isset($_POST['password']) || empty($_POST['password']))  {
            return $this->view->showLogin('Falta completar la contraseña');
        
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Verifico si el usuario existe en la base de datos
        $userFromDB = $this->models->getUserByEmail($email);

        if($userFromDB && password_verify($password, $userFromDB->password)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] =  $userFromDB->id;
            $_SESSION['EMAIL_USER'] =  $userFromDB->email;
            $_SESSION['LAST_ACTIVITY'] =  time();

            // Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Usuario o contraseña incorrectos');
        }
    }
}