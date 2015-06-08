<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('aauth');
    }
	public function index()
	{
            //if admin
            $this->view(null);
	}
        
        // view function for branches return all branches / and code success
        public function view()
        {
            $result = new ArrayObject();
            header('Content-Type: application/json');
            $this->load->model("branches_model");
            $result["code"] = 'success';
            $result["branches"] = $this->branches_model->getBranches($this->input->post('id'));
            echo json_encode($result);
        }
        
        // add function for branches returns code of the add status
        public function add()
        {
            $result = new ArrayObject();
            header('Content-Type: application/json');
            if($this->aauth->is_member('Admin', False))
            {
                $branch = array(
                        'image_path' =>$this->input->post('image_path'),
                        'email' =>$this->input->post('email'),
                        'phone' =>$this->input->post('phone'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'street' =>$this->input->post('street'),
                        
                        );
                    $this->load->model("branches_model");
                    $storedBranch = $this->branches_model->addBranch($branch);
                    if ($storedBranch){
                        $result['code'] = 'success';
                    }
                    else 
                    {
                        $result['code'] = 'error';
                        $result['msgs'] = 'error happened';
                    }
            }  
            else 
            {
                $result['code'] = 'not_allowed';
            }
            echo json_encode($result);
                    
        }
        
        // edit function for branches returns a status code of the edit operation 
        public function edit()
        {   
            $result = new ArrayObject();
            header('Content-Type: application/json');
            if ($this->aauth->is_member('Admin', FALSE))
            {
                $branch = array(
                        'id' =>$this->input->post('id'),
                        'image_path' =>$this->input->post('image_path'),
                        'email' =>$this->input->post('email'),
                        'phone' =>$this->input->post('phone'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'street' =>$this->input->post('street'),
                        
                        );
                   
                    $this->load->model("branches_model");
                    $this->branches_model->editBranch($branch);
                    $result['code'] = 'sucess';
 
            }
            else 
            {
                $result['code'] = 'not_allowed';    
            }
            echo json_encode($result);
        }
        
        // delete function for branches returns status code of the function 
        public function delete()
        {
            
           $id = $this->input->post('id');
           $result = new ArrayObject();
           header('Content-Type: application/json');
           if ($this->aauth->is_member('Admin', FALSE))
           {
                $this->load->model("branches_model");
                $this->branches_model->deleteBranch($id);
                $result["code"]="success";
           }  
           else 
            {
               $result['code'] = 'not_allowed';
            }
           echo json_encode($result);

        }
        

        
        
}
