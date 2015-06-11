<?php

Class Events_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function create($data)
    {
        return $this->db->insert("events", $data);
    }
    
    function retrive($id = NULL)
    {
        if($id == NULL)
        {
            return $this->db->get('events')->result_array();
        } else {   
            return $this->db->get_where('events', array('id' => $id))->result_array();
        }
    }
    
    function update($data)
    {
        return $this->db->update('events', $data, array('id'=>$data['id']));
    }
    
    function delete($id)
    {
        return $this->db->delete('events', array('id' => $id));
    }
}
