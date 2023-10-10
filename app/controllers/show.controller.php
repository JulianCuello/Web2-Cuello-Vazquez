<?php
    require_once './app/views/list.view.php';

    class ShowController{
    
    private $view;

    function __construct(){
        $this->view=new ListView();
    }
    
    public function showError404($error){
        $this->view->renderError($error);
    }
}
