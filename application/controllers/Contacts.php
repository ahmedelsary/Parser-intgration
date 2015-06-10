<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('aauth');
    }
	public function index()
	{
            //if admin
            $this->view(null);
	}
        
        // view function for contacts return all contacts / and code success
        public function view()
        {
            $result = new ArrayObject();
            header('Content-Type: application/json');
            $this->load->model("contacts_model");
            $result["code"] = 'success';
            $result["items"] = $this->contacts_model->getContacts();
            echo json_encode($result);
        }
        
        // add function for contacts returns code of the add status
        public function add()
        {
            $result = new ArrayObject();
            header('Content-Type: application/json');
            if($this->aauth->is_member('Admin', False))
            {
                $contacts = array(
                        'email' =>$this->input->post('email'),
                        'phone' =>$this->input->post('phone'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'street' =>$this->input->post('street'),
                        'facebook' =>$this->input->post('facebook'),
                        'linkedin' => $this->input->post('linkedin'),
                        'twitter' => $this->input->post('twitter'),
                        'googleplus' => $this->input->post('googleplus'),
                        'dribble' => $this->input->post('dribble'),
                        );
                    $this->load->model("contacts_model");
                    $storedContacts = $this->contacts_model->addContacts($contacts);
                    if ($storedContacts){
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
        
        // edit function for contacts returns a status code of the edit operation 
        public function edit()
        {   
            $result = new ArrayObject();
            header('Content-Type: application/json');
            if ($this->aauth->is_member('Admin', FALSE))
            {
                    $contacts = array(
                        'id' =>$this->input->post('id'),
                        'email' =>$this->input->post('email'),
                        'phone' =>$this->input->post('phone'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'street' =>$this->input->post('street'),
                        'facebook' =>$this->input->post('facebook'),
                        'linkedin' => $this->input->post('linkedin'),
                        'twitter' => $this->input->post('twitter'),
                        'googleplus' => $this->input->post('googleplus'),
                        'dribble' => $this->input->post('dribble'),
                        );
                    $this->load->model("contacts_model");
                    $this->contacts_model->editContacts($contacts);
                    $result['code'] = 'sucess';
 
            }
            else 
            {
                $result['code'] = 'not_allowed';    
            }
            echo json_encode($result);
        }
        
        // delete function for contacts returns status code of the function 
        public function delete()
        {
            
           $id = $this->input->post('id');
           $result = new ArrayObject();
           header('Content-Type: application/json');
           if ($this->aauth->is_member('Admin', FALSE))
           {
                $this->load->model("contacts_model");
                $this->contacts_model->deleteContacts($id);
                $result["code"]="success";
           }  
           else 
            {
               $result['code'] = 'not_allowed';
            }
           echo json_encode($result);

        }
        

        
        
}
