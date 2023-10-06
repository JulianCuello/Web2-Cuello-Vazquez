<?php


class TaskView {

    
    public function showUserList($tasks) {
        
        require './templates/show/show.list.phtml';
    }

    public function showError($error) {
        require './templates/show.error.phtml';
        
    }
}
