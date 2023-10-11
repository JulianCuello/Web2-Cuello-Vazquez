<?php
require_once './app/views/list.view.php';

class ShowController{

    private $view;

    public function __construct(){
        $this->view = new AlertView();
    }

    public function showError404($error){
        $this->view->renderError($error);
    }
}
