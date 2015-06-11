<?php

class news_model extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function addNews($news)
    {
        return $this->db->insert("news",$news);    
                
    }
    function getNews($id=null)
    {
        if($id==null)
        {
            return $this->db->get('news')->result_array();
        }  
        else 
        {
            return $this->db->get_where('news', array('id' => $id))->result_array();       
        }
           
                
    }
    function editNews($news)
    {
        return $this->db->update('news', $news, array("id"=>$news["id"]));
    }
    function deleteNews($id)
    {
         return $this->db->delete('news', array("id"=>$id)); 
    }       
}

