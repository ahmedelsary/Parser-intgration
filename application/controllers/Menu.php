<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('aauth');
        }

        public function index()
	{
            //if admin
            $this->view();
            
	}
        public function view()
        {
            
            $result = new ArrayObject();
            header('Content-Type: application/json');
            
            $this->load->model("menu_model");
            $items = $this->menu_model->getMenu();
            
            $result['code'] = 'success';
            $result['items'] = $items;
            echo json_encode($result);
            
            //$this->load->view('menu_view',$data);
            ///$this->load->view('add_item_view');
        }
        
        public function add()
        {
            $result = new ArrayObject();
            header('Content-Type: application/json');
            if($this->aauth->is_member('Admin', False))
            {
//            $this->load->library("form_validation");
//            $this->form_validation->set_rules("title","Title","required|alpha|xss_clean");
//            $this->form_validation->set_rules("url","Url","required|alpha|xss_clean");
//            $this->form_validation->set_rules("icon_path","icon_path","required|alpha|xss_clean");
//            $this->form_validation->set_rules("sort","sort","xss_clean");
//            $this->form_validation->set_rules("parent_id","parent_id","xss_clean");
            
//            if($this->form_validation->run()==TRUE)
//            {
                
                    
                $item = array(
                        'title' =>$this->input->post('title'),
                        'url' => $this->input->post('url'),
                        'icon_path' => $this->input->post('icon_path'),
                        'sort' =>$this->input->post('sort'),
                        'parent_id' => $this->input->post('parent_id'),
                        );


                    $this->load->model("menu_model");
                    //$data["items"]=$this->menu_model->getMenu();
                    $storedItem = $this->menu_model->addItem($item);
                    
     
                    if ($storedItem){
                        $result['code'] = 'success';
                    }
                    else {
                        $result['code'] = 'error';
                        $result['msgs'] = 'error happened';
                    }
            }  else {
                $result['code'] = 'not_allowed';
            }
                    echo json_encode($result);
                    
            
        }
        public function edit()
        {
            $result = new ArrayObject();
            header('Content-Type: application/json');
            if ($this->aauth->is_member('Admin', FALSE))
            {
//            if ($_SERVER['REQUEST_METHOD'] === 'POST') 
//                {
//                     $this->load->library("form_validation");
//                    $this->form_validation->set_rules("title","Title","required|alpha|xss_clean");
//                    $this->form_validation->set_rules("url","Url","required|alpha|xss_clean");
//                    $this->form_validation->set_rules("icon_path","icon_path","required|alpha|xss_clean");
//                    $this->form_validation->set_rules("sort","sort","xss_clean");
//                    $this->form_validation->set_rules("parent_id","parent_id","xss_clean");
//                    if($this->form_validation->run()==FALSE)
//                        {
//                            return '{"result":"error"}';
//                        }
//                    else 
//                       {
//                            $item = array(
//                                        'title' => set_value("title"),
//                                        'url' => set_value("url"),
//                                        'icon_path' => set_value("icon_path"),
//                                        'sort' => set_value("sort",0),
//                                        'parent_id' => set_value("parent_id",null),
//                                        );
                    $item = array(
                        'id' =>$this->input->post('id'),
                        'title' =>$this->input->post('title'),
                        'url' => $this->input->post('url'),
                        'icon_path' => $this->input->post('icon_path'),
                        'sort' =>$this->input->post('sort'),
                        'parent_id' => $this->input->post('parent_id'),
                        );

                            $this->load->model("menu_model");
                            //$data["items"]=$this->menu_model->getMenu();
                            $this->menu_model->editItem($item);
                            $result['code'] = 'sucess';
                            //$data["message"]="the Item has successflly added.";
                            //$this->load->view('menu_view',$data);
                            //$this->load->view('add_item_view');
                            


//                        }
//                }
//            else 
//                {
//                $this->load->model("menu_model");
//                //return $data=$this->menu_model->getItem($id);
//               
//                $data=$this->menu_model->editItem($item);
//               
//               
//                }

            }  else {
                $result['code'] = 'not_allowed';
                
            }
            echo json_encode($result);

        }
        public function delete()
        {
            $result = new ArrayObject();
            header('Content-Type: application/json');
            if($this->aauth->is_member('Admin', FALSE))
            {
            $id = $this->input->post('id');
            $this->load->model("menu_model");
            //$data["items"]=$this->menu_model->getMenu();
           $this->menu_model->deleteItem($id);           
           //$this->load->view('menu_view',$data);
           //$this->load->view('add_item_view');;
           $result['code'] = 'sucess';
            }  else {
                $result['code'] = 'not_allowed';
            }
            echo json_encode($result);
        }
        

        
        
}
