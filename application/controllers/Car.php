<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller
{

    function ViewCar()
	{
		//$id = 1;
		$id = $this->input->get('id');
		$result = $this->Home_model->viewCar($id);
                $mark = $result[0]['producer'];
                $model = $result[0]['model'];
                $year = $result[0]['year'];
                  if($this->aauth->get_user_id(FALSE))
                {
                    $userview['fkuser'] =  $this->aauth->get_user_id(FALSE);
                }
                $userview['car']=$mark.'-'.$model.'-'.$year;
                $this->Home_model->addMostView($userview);
		/*echo '<pre>';
		print_r($result);
		echo  '</pre>';*/
		//var_dump($result);
                $data = array('response' => $result);
                $this->load->view('carView', $data);
	}
    function viewUsedCar()
    {
        $result = $this->Home_model->selectUsed();
        $data = array('response' => $result);
        $this->load->view('result_search_view', $data);
    }
    function viewNewCar()
    {
        $result = $this->Home_model->selectNew();
        $data = array('response' => $result);
        $this->load->view('result_search_view', $data);
    }
}	
