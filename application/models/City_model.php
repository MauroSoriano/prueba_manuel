<?php
defined('BASEPATH') or exit('No tienes permiso para acceder a este script');

class City_model extends CI_Model
{
    private $cities = 'cities';

    function findAll()
    {
        $query = $this->db->get($this->cities);
        return $query->result();
    }
}
