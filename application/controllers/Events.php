<?php

Class Events extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->library('aauth');
        $this->load->model('Events_model');
    }
    
    public function add()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        if($this->aauth->is_member('Admin', FALSE))
        {
            $item = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'image' => $this->input->post('image'),
                'date' => now(),
            );
            
            $storedItem = $this->Events_model->create($item);
            
            if ($storedItem)
            {
                $result['code'] = 'success';
            }else{
                $result['code'] = 'error';
            }
        }else{
            $result['code'] = 'not_allowed';
        }
        
        echo json_encode($result);
    }
    
    public function view()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        $result['items'] = $this->Events_model->retrive();
        $result['code'] = 'success';
        echo json_encode($result);
    }
    
    public function delete()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        if($this->aauth->is_member('Admin', FALSE))
        {
            $id = $this->input->post('id');
        
            $this->Events_model->delete($id);
            $result['code'] = 'success';
        }else{
            $result['code'] = 'not_allowed';
        }
        echo json_encode($result);
    }
    
    public function edit()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        if($this->aauth->is_member('Admin', FALSE))
        {
            $item = array(
                'id' =>$this->input->post('id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'image' => $this->input->post('image'),
                'date' => now(),
            ); 
            $this->Events_model->update($item);
            $result['code'] = 'sucess';            
        }else{
            $result['code'] = 'not_allowed';
        }
        echo json_encode($result);
    }
    
    
}

