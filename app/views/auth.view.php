<?php 
//vista de autenticacion
class AuthView {
    
    public function showLogin($error = null) {
        require './templates/login.phtml';
    } 
}
