<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_mom_model extends App_Model {
    public function __construct(){
        parent::__construct();
        $this->table = db_prefix() . 'client_mom';
    }

    public function add($data){
        $data['token'] = bin2hex(random_bytes(16));
        $data['staff_id'] = get_staff_user_id();
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get($id = ''){
        if($id){
            $this->db->where('id', $id);
            return $this->db->get($this->table)->row();
        }
        $this->db->where('staff_id', get_staff_user_id());
        return $this->db->get($this->table)->result();
    }

    public function update($data, $id){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows() > 0;
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows() > 0;
    }

    public function get_by_token($token){
        $this->db->where('token', $token);
        return $this->db->get($this->table)->row();
    }
}
