<?php

class menu_model extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function addItem($item)
    {
        return $this->db->insert("menu_items",$item);    
                
    }
    function addItems($items)
    {
        return $this->db->insert_batch('menu_items', $items); 
        
    }
    function editItem($item)
    {
        return $this->db->update('menu_items', $item, array("id"=>$item["id"]));
         
        
    }
    function editItems($items)
    {
        //        $data = array(
        //   array(
        //      'title' => 'My title' ,
        //      'name' => 'My Name 2' ,
        //      'date' => 'My date 2'
        //   ),
        //   array(
        //      'title' => 'Another title' ,
        //      'name' => 'Another Name 2' ,
        //      'date' => 'Another date 2'
        //   )
        //);
        //
        //$this->db->update_batch('mytable', $data, 'title');

        // Produces:
        // UPDATE `mytable` SET `name` = CASE
        // WHEN `title` = 'My title' THEN 'My Name 2'
        // WHEN `title` = 'Another title' THEN 'Another Name 2'
        // ELSE `name` END,
        // `date` = CASE
        // WHEN `title` = 'My title' THEN 'My date 2'
        // WHEN `title` = 'Another title' THEN 'Another date 2'
        // ELSE `date` END
        // WHERE `title` IN ('My title','Another title')


        
    }
    function getItem($id)
    {
        //return $this->db->get_where('menu_items', array('id' => $id));//$this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        $query=$this->db->query("select * from menu_items where id=".$id);
        return $query->result();
        
    }
    function getItems($ids)
    {
        //loop
        return $this->db->get_where('menu_items', array('id' => $id));
         
        
    }
    function deleteItem($id)
    {
         return $this->db->delete('menu_items', array("id"=>$id)); 
         
        
    }
    function deleteItems($ids)
    {
        //loop
        return $this->db->delete('menu_items', array('id' => $id)); 
         
        
    }
    function getMenu()
    {
        $query=$this->db->query("select * from menu_items");
        return $query->result();
        //return $this->db->get('menu_items');
         
        
    }
    function deleteMenu()
    {
        return $this->db->empty_table('menu_items'); 
         
        
    }
    
    
}

