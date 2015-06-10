<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{

    function SimpleSearch(){

        $this->load->view('SimpleSearch_view');

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');


        $this->form_validation->set_rules('keyword', 'keyword', 'required');

        if ($this->input->post('sub')) {

            if ($this->form_validation->run() == FALSE) {
                echo 'please enter a value';
            } else {
                $keyword = trim($this->input->post('keyword'), "'");

                $result = $this->Home_model->simpleSearchModel($keyword);

                $data = array('response' => $result);


                $this->load->view('result_search_view', $data);

            }


        }
    }


    public function AdvancedSearch()
    {
        $this->load->view('AdvancedSearch_view');

        $this->form_validation->set_rules('maxcapacity', 'maxcapacity', 'integer');
        $this->form_validation->set_rules('mincapacity', 'mincapacity', 'integer');
        $this->form_validation->set_rules('maxyear', 'maxyear', 'integer');
        $this->form_validation->set_rules('minyear', 'minyear', 'integer');
        $this->form_validation->set_rules('maxprice', 'maxprice', 'integer');
        $this->form_validation->set_rules('minprice', 'minprice', 'integer');
        if ($this->input->post('sub')) {
            if ($this->form_validation->run() == FALSE) {

                echo '
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Error</h3>
                </div>
                <div class="panel-body">
                    please enter a valid value!
                </div>
			</div>';

            } else {

                $count = 0;

                $sql = "select * from cars ";


                if ($this->input->post('model')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . " where ";
                        $count++;
                    }


                    $sql = $sql . "model like '%" . $this->input->post('model') . "%'";

                }

                if ($this->input->post('mark')) {

                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }

                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }

                    $sql = $sql . "producer like '%" . $this->input->post('mark') . "%'";

                }


                if ($this->input->post('maxcapacity') && $this->input->post('mincapacity')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }
                    $sql = $sql . "ecapacity BETWEEN " . $this->input->post('mincapacity') . "  and  " . $this->input->post('maxcapacity');
                } elseif ($this->input->post('maxcapacity') or $this->input->post('mincapacity')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }


                    if ($this->input->post('maxcapacity')) {


                        $sql = $sql . "ecapacity <= '" . $this->input->post('maxcapacity') . "'";
                    } elseif ($this->input->post('mincapacity')) {

                        $sql = $sql . "ecapacity >= '" . $this->input->post('mincapacity') . "'";
                    }


                }


                if ($this->input->post('maxyear') && $this->input->post('minyear')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }
                    $sql = $sql . "year BETWEEN " . $this->input->post('minyear') . " and " . $this->input->post('maxyear');
                } elseif ($this->input->post('maxyear') or $this->input->post('minyear')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }


                    if ($this->input->post('maxyear')) {

                        $sql = $sql . "year <= '" . $this->input->post('maxyear') . "'";
                    } elseif ($this->input->post('minyear')) {

                        $sql = $sql . "year >= '" . $this->input->post('minyear') . "'";
                    }


                }


                if ($this->input->post('maxprice') && $this->input->post('minprice')) {
                    $mprice = (int)$this->input->post('maxprice');
                    $nprice = (int)$this->input->post('minprice');
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }
                    $sql = $sql . "price BETWEEN " . $nprice . " and  " . $mprice;
                } elseif ($this->input->post('maxprice')) {
                    $mprice = (int)$this->input->post('maxprice');
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . " where ";
                        $count++;
                    }

                    $sql = $sql . "price <= '" . $mprice . "'";
                } elseif ($this->input->post('minprice')) {
                    $nprice = (int)$this->input->post('minprice');
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . " where ";
                        $count++;
                    }
                    $sql = $sql . " price >= '" . $nprice . "'";
                }

                $result = $this->Home_model->AdvancedSearchModel($sql);

                $data = array('response' => $result);
                $this->load->view('result_search_view', $data);


            }
        }

    }


    function SimpleSearchApi()
    {
        header('Content-Type: application/json');
        $keyword = $this->input->post('keyword');
        
        $result = new ArrayObject();
        $result['items'] = $this->Home_model->simpleSearchModel($keyword);
        echo json_encode($result);
    }


    function AdvancedSearchApi()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');

                $count = 0;

                $sql = "select * from cars ";


                if ($this->input->post('model')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . " where ";
                        $count++;
                    }


                    $sql = $sql . "model like '%" . $this->input->post('model') . "%'";

                }

                if ($this->input->post('mark')) {

                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }

                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }

                    $sql = $sql . "producer like '%" . $this->input->post('mark') . "%'";

                }


                if ($this->input->post('maxcapacity') && $this->input->post('mincapacity')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }
                    $sql = $sql . "ecapacity BETWEEN " . $this->input->post('mincapacity') . "  and  " . $this->input->post('maxcapacity');
                } elseif ($this->input->post('maxcapacity') or $this->input->post('mincapacity')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }


                    if ($this->input->post('maxcapacity')) {


                        $sql = $sql . "ecapacity <= '" . $this->input->post('maxcapacity') . "'";
                    } elseif ($this->input->post('mincapacity')) {

                        $sql = $sql . "ecapacity >= '" . $this->input->post('mincapacity') . "'";
                    }


                }


                if ($this->input->post('maxyear') && $this->input->post('minyear')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }
                    $sql = $sql . "year BETWEEN " . $this->input->post('minyear') . " and " . $this->input->post('maxyear');
                } elseif ($this->input->post('maxyear') or $this->input->post('minyear')) {
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }


                    if ($this->input->post('maxyear')) {

                        $sql = $sql . "year <= '" . $this->input->post('maxyear') . "'";
                    } elseif ($this->input->post('minyear')) {

                        $sql = $sql . "year >= '" . $this->input->post('minyear') . "'";
                    }


                }


                if ($this->input->post('maxprice') && $this->input->post('minprice')) {
                    $mprice = (int)$this->input->post('maxprice');
                    $nprice = (int)$this->input->post('minprice');
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }
                    $sql = $sql . "price BETWEEN " . $nprice . " and  " . $mprice;
                } elseif ($this->input->post('maxprice')) {
                    $mprice = (int)$this->input->post('maxprice');
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . " where ";
                        $count++;
                    }

                    $sql = $sql . "price <= '" . $mprice . "'";
                } elseif ($this->input->post('minprice')) {
                    $nprice = (int)$this->input->post('minprice');
                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }


                    if ($count == 0) {
                        $sql = $sql . " where ";
                        $count++;
                    }
                    $sql = $sql . " price >= '" . $nprice . "'";
                }

        $result['items'] = $this->Home_model->AdvancedSearchModel($sql);
        echo json_encode($result);
    }


    function  getModels()
    {
        $mark = $this->input->get('mark');
        $result = $this->Home_model->SelectModelByMark($mark);
        echo '<option value="">Select Model</option>';
        foreach ($result as $row) {
            echo "<option value=" . $row['model'] . ">" . $row['model'] . "</option>";
        }
    }


}
