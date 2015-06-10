<?php

class branches_model extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function addBranch($branch)
    {
        return $this->db->insert("branches",$branch);    
                
    }
    function getBranches($id=null)
    {
        if($id==null)
        {
            return $this->db->get('branches')->result_array();
        }  
        else 
        {
            return $this->db->get_where('branches', array('id' => $id))->result_array();       
        }
           
                
    }
    function editBranch($branch)
    {
        return $this->db->update('branches', $branch, array("id"=>$branch["id"]));
    }
    function deleteBranch($id)
    {
         return $this->db->delete('branches', array("id"=>$id)); 
    }       
}

