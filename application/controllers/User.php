<?php
defined('BASEPATH') or exit('No tienes permiso para acceder a este script');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper("url");
        $this->load->helper('form');
        $this->load->model('City_model');
        $this->load->database();
    }

    public function showCreate($page = 1)
    {
        $page--;

        if ($page < 0) {
            $page = 0;
        }
        $page_size = 5;
        $offset = $page * $page_size;



        $vdata["users"] = $this->User_model->pagination($page_size, $offset);
        $vdata["current_page"] = $page + 1;
        $vdata["last_page"] = ceil($this->User_model->count() / $page_size);
        $this->load->view('users/create', $vdata);
    }

    public function showNew($user_id = null)
    {

        $vdata["first_name"] = $vdata["last_name"] = $vdata["email"] = "";
        $vdata["cities"] = $this->City_model->findAll();
        if (isset($user_id)) {

            $user = $this->User_model->find($user_id);

            if (isset($user)) {
                $vdata["first_name"] = $user->first_name;
                $vdata["last_name"] = $user->last_name;
                $vdata["email"] = $user->email;
                $vdata["city_id"] = $user->city_id;

            }
        }

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data["first_name"] = $this->input->post("first_name");
            $data["last_name"] = $this->input->post("last_name");
            $data["email"] = $this->input->post("email");
            $data["city_id"] = $this->input->post("city_id");

            $vdata["first_name"] = $this->input->post("first_name");
            $vdata["last_name"] = $this->input->post("last_name");
            $vdata["email"] = $this->input->post("email");
            $vdata["city_id"] = $this->input->post("city_id");
            echo '<script type="text/javascript">
        alert("Usuario registrado correctamente");
        window.location.href="http://localhost/crud_ci3/usuarios/1";
        </script>';


            if (isset($user_id)) {
                $this->User_model->update($user_id, $data);
            } else {
                $this->User_model->insert($data);
            }
        }

        $this->load->view('users/new-user', $vdata);
    }

    public function borrar($user_id = null)
    {
        $this->User_model->delete($user_id);

        redirect("/usuarios/1");
    }

    // public function ver($user_id = null)
    // {
    //     if (!isset($user_id)) {
    //         show_404();
    //     }
    //     $user = $this->User_model->find($user_id);

    //     if (!isset($user)) {
    //         show_404();
    //     }

    //     if (isset($user)) {
    //         $vdata["first_name"] = $user->first_name;
    //         $vdata["last_name"] = $user->last_name;
    //         $vdata["email"] = $user->email;
    //     } else {
    //         $vdata["first_name"] = $vdata["last_name"] = $vdata["email"] = "";
    //     }

    //     $this->load->view('users/view_user', $vdata);
    // }
}
