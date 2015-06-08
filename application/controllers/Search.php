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
        $keyword = $this->input->post['keyword'];
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


        if (isset($_GET['model'])) {
            $_GET['model'] = clean($_GET['model']);
            if ($count == 1) {
                $sql = $sql . " and ";
            }


            if ($count == 0) {
                $sql = $sql . " where ";
                $count++;
            }


            $sql = $sql . "model like '%" . $_GET['model'] . "%'";

        }

        if (isset($_GET['producer'])) {
            $_GET['producer'] = clean($_GET['producer']);
            if ($count == 1) {
                $sql = $sql . " and ";
            }

            if ($count == 0) {
                $sql = $sql . "where ";
                $count++;
            }

            $sql = $sql . "producer like '%" . $_GET['producer'] . "%'";

        }


        if (isset($_GET['upperecapacity']) && isset($_GET['lowerecapacity'])) {
            $_GET['upperecapacity'] = clean($_GET['upperecapacity']);
            $_GET['lowerecapacity'] = clean($_GET['lowerecapacity']);
            if ($count == 1) {
                $sql = $sql . " and ";
            }


            if ($count == 0) {
                $sql = $sql . "where ";
                $count++;
            }
            $sql = $sql . "ecapacity BETWEEN " . $_GET['lowerecapacity'] . "  and  " . $_GET['upperecapacity'];
        } elseif (isset($_GET['upperecapacity']) or isset($_GET['lowerecapacity'])) {
            if ($count == 1) {
                $sql = $sql . " and ";
            }


            if ($count == 0) {
                $sql = $sql . "where ";
                $count++;
            }


            if (isset($_GET['upperecapacity'])) {

                $_GET['upperecapacity'] = clean($_GET['upperecapacity']);
                $sql = $sql . "ecapacity <= '" . $_GET['upperecapacity'] . "'";
            } elseif (isset($_GET['lowerecapacity'])) {
                $_GET['lowerecapacity'] = clean($_GET['lowerecapacity']);
                $sql = $sql . "ecapacity >= '" . $_GET['lowerecapacity'] . "'";
            }


        }


        if (isset($_GET['upperyear']) && isset($_GET['loweryear'])) {
            $_GET['upperyear'] = clean($_GET['upperyear']);
            $_GET['loweryear'] = clean($_GET['loweryear']);
            if ($count == 1) {
                $sql = $sql . " and ";
            }


            if ($count == 0) {
                $sql = $sql . "where ";
                $count++;
            }
            $sql = $sql . "year BETWEEN " . $_GET['loweryear'] . " and " . $_GET['upperyear'];
        } elseif (isset($_GET['upperyear']) or isset($_GET['loweryear'])) {
            if ($count == 1) {
                $sql = $sql . " and ";
            }


            if ($count == 0) {
                $sql = $sql . "where ";
                $count++;
            }


            if (isset($_GET['upperyear'])) {
                $_GET['upperyear'] = clean($_GET['upperyear']);
                $sql = $sql . "year <= '" . $_GET['upperyear'] . "'";
            } elseif (isset($_GET['loweryear'])) {
                $_GET['loweryear'] = clean($_GET['loweryear']);
                $sql = $sql . "year >= '" . $_GET['loweryear'] . "'";
            }


        }


        if (isset($_GET['upperprice']) && isset($_GET['lowerprice'])) {
            $_GET['upperprice'] = clean($_GET['upperprice']);
            $_GET['lowerprice'] = clean($_GET['lowerprice']);
            if ($count == 1) {
                $sql = $sql . " and ";
            }


            if ($count == 0) {
                $sql = $sql . "where ";
                $count++;
            }
            $sql = $sql . "price BETWEEN " . $_GET['lowerprice'] . " and  " . $_GET['upperprice'];
        } elseif (isset($_GET['upperprice']) or isset($_GET['lowerprice'])) {
            if ($count == 1) {
                $sql = $sql . " and ";
            }


            if ($count == 0) {
                $sql = $sql . "where ";
                $count++;
            }


            if (isset($_GET['upperprice'])) {
                $_GET['upperprice'] = clean($_GET['upperprice']);
                $sql = $sql . "price <= '" . $_GET['upperprice'] . "'";
            } elseif (isset($_GET['lowerprice'])) {
                $_GET['lowerprice'] = clean($_GET['lowerprice']);
                $sql = $sql . "price >= '" . $_GET['lowerprice'] . "'";
            }


        }


        $result['items'] = $this->Home_model->AdvancedSearchModel($sql);
        echo json_encode($result);
        // Build our view's data object
//        $data = array('response' => $result);

        // Load the JSON view
//        $this->load->view('advencedsearch', $data);


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
