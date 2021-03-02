<?php
defined('BASEPATH') or exit('No tienes permiso para acceder a este script');

class User_model extends CI_Model
{
    public $table = 'users';
    public $table_id = 'id';

    public $cities = 'cities';
    public $cities_id = 'cities_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function find($id)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id);

        $query = $this->db->get();
        return $query->row();
    }

    function findAll()
    {
        $this->db->select('users.*, cities.id AS city_id, cities.name AS city_name');
        $this->db->from('users');
        $this->db->join('cities', 'users.city_id = cities.id');
        $query = $this->db->get();
        return $query->result();
    }

    function pagination($page_size, $offset)
    {
        $this->db->select('users.*, cities.id AS city_id, cities.name AS city_name');
        $this->db->from('users');
        $this->db->join('cities', 'users.city_id = cities.id');
        $this->db->limit($page_size, $offset);

        $query = $this->db->get();
        return $query->result();
    }

    function count()
    {
        $this->db->select();
        $this->db->from('users');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update($id, $data)
    {
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }
}
