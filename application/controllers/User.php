<?php
defined ('BASEPATH') or exit ('No tienes permiso para acceder a este script');

class User extends CI_Controller {
    
    public function __construct (){
        parent::__construct();
    }

    public function showCreate(){
        $this->load->view('users/create');
    }
}