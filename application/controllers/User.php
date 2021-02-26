<?php
defined('BASEPATH') or exit('No tienes permiso para acceder a este script');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->database();
    }

    public function showCreate()
    {
        $vdata["users"] = $this->User_model->findAll();
        $this->load->view('users/create', $vdata);
    }

    public function showNew($user_id = null)
    {
        $vdata["first_name"] = $vdata["last_name"] = $vdata["email"] = "";
        if (isset($user_id)) {

            $user = $this->User_model->find($user_id);

            if (isset($user)) {
                $vdata["first_name"] = $user->first_name;
                $vdata["last_name"] = $user->last_name;
                $vdata["email"] = $user->email;
            }
        }

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data["first_name"] = $this->input->post("first_name");
            $data["last_name"] = $this->input->post("last_name");
            $data["email"] = $this->input->post("email");

            $vdata["first_name"] = $this->input->post("first_name");
            $vdata["last_name"] = $this->input->post("last_name");
            $vdata["email"] = $this->input->post("email");

            if (isset($user_id)) {
                $this->User_model->update($user_id, $data);
            } else {
                $this->User_model->insert($data);
            }
        }

        $this->load->view('users/new-user', $vdata);
    }

    public function borrar()
    {
        # code...
    }

    public function ver($user_id = null)
    {
        if (!isset($user_id)) {
            show_404();
        }
        $user = $this->User_model->find($user_id);

        if (!isset($user)) {
            show_404();
        }

        if (isset($user)) {
            $vdata["first_name"] = $user->first_name;
            $vdata["last_name"] = $user->last_name;
            $vdata["email"] = $user->email;
        } else {
            $vdata["first_name"] = $vdata["last_name"] = $vdata["email"] = "";
        }

        $this->load->view('users/view_user', $vdata);
    }
}
