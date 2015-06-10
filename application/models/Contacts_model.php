<?php

class contacts_model extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function addContacts($contacts)
    {
        return $this->db->insert("contacts",$contacts);    
                
    }
    function getContacts($id=null)
    {
        if($id==null)
        {
            return $this->db->get('contacts')->result_array();
        }  
        else 
        {
            return $this->db->get_where('contacts', array('id' => $id))->result_array();       
        }
           
                
    }
    function editContacts($contacts)
    {
        return $this->db->update('contacts', $contacts, array("id"=>$contacts["id"]));
    }
    function deleteContacts($id)
    {
         return $this->db->delete('contacts', array("id"=>$id)); 
    }       
}

