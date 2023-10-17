<?php 
//vista de autenticacion
class AuthView {
    
    public function showLogin($error = null) {
        require './templates/auth/login.phtml';
    } 
}
