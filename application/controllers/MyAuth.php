<?php
/**
 * Description of MyAuth
 *
 * @author maverick
 */
class MyAuth extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->library("Aauth");
        $this->load->helper('form');
    }
    
    public function createPermissions ()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        
        
        if ($this->input->post())
        {
            $permissionName = $this->input->post('permName');
            $permDefinition = $this->input->post('permDefinition');
            
           $result = $this->aauth->create_perm($permissionName, $permDefinition);            
        }
        
//            $this->load->view('mytest');
        
        
        echo json_encode($result);
    }
    
    public function listPermissions ()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        
        $result['perms'] = $this->aauth->list_perms();
        echo json_encode($result);
    }
    
    public function allowUsers()
    {
        if ($this->input->post())
        {
            $userId = $this->input->post('userId');
            $permName = $this->input->post('permName');
            $this->aauth->allow_user($userId, $permName);
        }
        $this->load->view('mytest');
        
    }
    
    public function denyUser()
    {
        if ($this->input->post)
        {
            $id = $this->input->post('id');
            $permName = $this->input->post('permName');
            $this->aauth->deny_user($id, $permName);
        }
    }
    
    public function getPermId()
    {
//        $result;
        $result = new ArrayObject();
        header('Content-Type: application/json');
        if ($this->input->post())
        {
            $permName = $this->input->post('permName');
            $result = $this->aauth->get_perm_id($permName);
//            echo $this->aauth->get_perm_id($permName);
        
//            echo $result;
        }
        
        
        
        return json_encode($result);
    }
    
    
}
