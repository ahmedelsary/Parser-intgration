<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('aauth');
    }
	public function index()
	{
            //if admin
//            $this->view(null);
            
            
            
	}
        
        // view function for news return all news / and code success
        public function view()
        {
            $result = new ArrayObject();
            header('Content-Type: application/json');
            $this->load->model("news_model");
            $result["code"] = 'success';
            $result["items"] = $this->news_model->getNews();
            echo json_encode($result);
        }
        
        // add function for news returns code of the add status
        public function add()
        {
            $result = new ArrayObject();
            header('Content-Type: application/json');
            if($this->aauth->is_member('Admin', False))
            {
                
//                $datestring = "%Y-%m-%d %h:%i";
//                $time = time();
//            
//                $now = mdate($datestring, $time);
            
                $item = array(
                        'title' =>$this->input->post('title'),
                        'description' =>$this->input->post('description'),
                        'image' => $this->input->post('image'),
                        'date' => $this->input->post('date'),
                        );
                    $this->load->model("news_model");
                    $storedItem = $this->news_model->addNews($item);
                    if ($storedItem){
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
        
        // edit function for news returns a status code of the edit operation 
        public function edit()
        {   
            $result = new ArrayObject();
            header('Content-Type: application/json');
            if ($this->aauth->is_member('Admin', FALSE))
            {
                    $item = array(
                        'id' =>$this->input->post('id'),
                        'title' =>$this->input->post('title'),
                        'description' =>$this->input->post('description'),
                        'image' => $this->input->post('image', null),
                        'date' => $this->input->post('date', now()),
                        );
                    $this->load->model("news_model");
                    $this->news_model->editNews($item);
                    $result['code'] = 'sucess';
 
            }
            else 
            {
                $result['code'] = 'not_allowed';    
            }
            echo json_encode($result);
        }
        
        // delete function for news returns status code of the function 
        public function delete()
        {
            
           $id = $this->input->post('id');
           $result = new ArrayObject();
           header('Content-Type: application/json');
           if ($this->aauth->is_member('Admin', FALSE))
           {
                $this->load->model("news_model");
                $this->news_model->deleteNews($id);
                $result["code"]="success";
           }  
           else 
            {
               $result['code'] = 'not_allowed';
            }
           echo json_encode($result);

        }
        

        
        
}
