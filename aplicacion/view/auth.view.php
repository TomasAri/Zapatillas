<?php
class AuthView {

    private $user = null; 

    public function showLogin($error = '') {
        require 'plantillas/form_login.phtml';
    }

}
