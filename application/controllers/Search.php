<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->pdf->fontpath='font/';
        
    }
     function SimpleSearch(){

//        $this->load->view('SimpleSearch_view');


//        $this->form_validation->set_rules('keyword', 'keyword', 'required');
        $response_result = new ArrayObject();
        header('Content-Type: application/json');
        
        if ($this->input->post()) {

//            if ($this->form_validation->run() == FALSE) {
//                echo 'please enter a value';
//            } else {
                $keyword = trim($this->input->post('keyword'), "'");

                $now=$this->input->post('now');
                if($now){

//                    $result[]=  car100100_new(0,$keyword,1);
//                    $result[]=  car100100_used(0,$keyword,1);
//
//                    $result[]=  contactcars_new(0,$keyword,1);
//                    $result[]=  contactcars_used(0,$keyword,1);

                    $result[]=  dubizzle(0,$keyword,1);


//                    $result=array_merge($result[0],$result[1],$result[2],$result[3],$result[4]);
                    $result=array_merge($result[0]);

                }else{
                    $result = $this->Home_model->simpleSearchModel($keyword);
                }

//                $data = array('response' => $result);
                $response_result['items'] = $result;
                
                
                echo json_encode($response_result);
//                $this->load->view('result_search_view', $data);

//            }


        }
    }


    public function AdvancedSearch()
    {
//        $this->load->view('AdvancedSearch_view');

//        $this->form_validation->set_rules('maxcapacity', 'maxcapacity', 'integer');
//        $this->form_validation->set_rules('mincapacity', 'mincapacity', 'integer');
//        $this->form_validation->set_rules('maxyear', 'maxyear', 'integer');
//        $this->form_validation->set_rules('minyear', 'minyear', 'integer');
//        $this->form_validation->set_rules('maxprice', 'maxprice', 'integer');
//        $this->form_validation->set_rules('minprice', 'minprice', 'integer');
        
        $response_result = new ArrayObject();
        header('Content-Type: application/json');
        
        if ($this->input->post()) {
//            if ($this->form_validation->run() == FALSE) {
//
//                echo '
//            <div class="panel panel-danger">
//                <div class="panel-heading">
//                    <h3 class="panel-title">Error</h3>
//                </div>
//                <div class="panel-body">
//                    please enter a valid value!
//                </div>
//			</div>';
//
//            } else {

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

//                $data = array('response' => $result);
                $response_result['items'] = $result;
                
                
                echo json_encode($response_result);
//                $this->load->view('result_search_view', $data);


//            }
        }

    }

    //need test
    function SimpleSearchApi()
    {
        $result = new ArrayObject();
//        header('Content-Type: application/json');

        $this->load->view('SimpleSearch_view');

        $this->form_validation->set_rules('keyword', 'keyword', 'required');

        if ($this->input->post('sub')) {

            if ($this->form_validation->run() == FALSE) {
                echo 'please enter a value';
            } else {
                $keyword = trim($this->input->post('keyword'), "'");

                $now = $this->input->post('now');
                if ($now) {

                    $result[] =  car100100_new(0, $keyword, 10);
                    $result[] =  car100100_used(0, $keyword, 10);
                    $result[] =  contactcars_new(0, $keyword, 10);
                    $result[] =  contactcars_used(0, $keyword, 10);
                    $result[] =  dubizzle(0, $keyword, 10);


                    $result['items'] = array_merge($result[0], $result[1], $result[2], $result[3], $result[4]);

                } else {
                    $result['items'] = $this->Home_model->simpleSearchModel($keyword);
                }

            }
        }
                echo json_encode($result);
    }

    //need test
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
                if ($this->input->post('type')) {

                    if ($count == 1) {
                        $sql = $sql . " and ";
                    }

                    if ($count == 0) {
                        $sql = $sql . "where ";
                        $count++;
                    }

                    $sql = $sql . "type = '" . $this->input->post('type') . "'";

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


   
    //ma7moud
    function SimpleSearchReport()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
//		$this->load->view('simpleSearchReport');
        if ($this->aauth->is_loggedin())
        {
            if ($this->aauth->is_member('Admin',FALSE))
            {
                if ($this->input->post()) 
                {
                    $type = $this->input->post('type');
                    if ($type == 'Top')
                    {
                        $result['code'] = 'success';    
                        $result['items'] = $this->Home_model->searchReport();
//                            $data = array('response' => $result);
//                            $this->load->view('SimpleSearchReport_view', $data);
                    }
                    elseif ($type == 'Dayly')
                    {
                        $result['code'] = 'success';
                        $result['items'] = $this->Home_model->searchReportDayly();
//                            $data = array('response' => $result);
//                            $this->load->view('SimpleSearchReport_view', $data);
                    }
                    elseif ($type == 'Weekly')
                    {
                        $result['code'] = 'success';
                        $result['items'] = $this->Home_model->searchReportWeekly();
//                            $data = array('response' => $result);
//                            $this->load->view('SimpleSearchReport_view', $data);
                    }
                    elseif ($type == 'Monthly')
                    {
                        $result['code'] = 'success';
                        $result['items'] = $this->Home_model->searchReportMonthly();
//                            $data = array('response' => $result);
//                            $this->load->view('SimpleSearchReport_view', $data);
                    }
                    elseif ($type == 'Yearly')
                    {
                        $result['code'] = 'success';
                        $result['items'] = $this->Home_model->searchReportYearly();
//                            $data = array('response' => $result);
//                            $this->load->view('SimpleSearchReport_view', $data);
                    }
                  echo json_encode($result);  
                }
                
            }
               
        }
    }

    //ma7moud
    function SimpleSearchReportUser()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        $result['items'] = $this->Home_model->searchReportForUser();
        echo json_encode($result);
//        $data = array('response' => $result);
//        $this->load->view('SimpleSearchReport_view', $data);
    }
    //ma7moud
    function printpdf()
    {
        
        
        if ($this->input->post()) 
        {
            
            
               // Send Headers
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="myPDF.pdf');

        // Send Headers: Prevent Caching of File
        header('Cache-Control: private');
        header('Pragma: private');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

        
            
        $pdfkeyword = $this->input->post('keyword');
        $pdfcount   = $this->input->post('count');
        $header   = $this->input->post('header');
        
        $this->pdf->AddPage();

        $this->pdf->SetFont('Arial','',12);
        // Background color
        $this->pdf->SetFillColor(200,220,255);
        // Title
        $this->pdf->Cell(0,6,"WebParser:BE ",0,1,'C',true);
        // Line break
        $this->pdf->Ln(4);


         $this->pdf->SetFont('Arial','B',15);
         // Move to the right
         $this->pdf->Cell(80);
         // Framed title
         $this->pdf->Cell(30,10,'Report',1,0,'C');
         // Line break
         $this->pdf->Ln(20);

         $this->pdf->SetFont('Arial','B',16);
         
         $this->pdf->Cell(100, 10, $header, 1, 0, 'C');
         $this->pdf->Cell(40, 10, "Count", 1, 1, 'C');
            
        for ($i=0;$i< count($pdfkeyword);$i++) {

            $this->pdf->Cell(100, 10, $pdfkeyword[$i], 1, 0, 'C');
            $this->pdf->Cell(40, 10, $pdfcount[$i], 1, 1, 'C');
            

        }
        
        // Position at 1.5 cm from bottom
        $this->pdf->SetY(266);
        // Arial italic 8
        $this->pdf->SetFont('Arial','I',8);

        // Text color in gray
        $this->pdf->SetTextColor(128);

        // Page number

        $this->pdf->Cell(0,10,'Page '.$this->pdf->PageNo(),0,0,'C');
        $this->pdf->Output();

		}

    }
    //ma7moud
    function printcsv(){


		if ($this->input->post()) 
		{
                    
                    header('Content-type: application/CSV');
                    header('Content-Disposition: attachment; filename="myCSV.csv');

                    // Send Headers: Prevent Caching of File
                    header('Cache-Control: private');
                    header('Pragma: private');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
			
			$csvkeyword = $this->input->post('keyword');
			$csvcount   = $this->input->post('count');
                        $header   = $this->input->post('header');

            $report=array();
            $report[]=array($header,"Count");
            for($i=0;$i<count($csvcount);$i++)
            {

            $report[]=array($csvkeyword[$i],$csvcount[$i]);

            }


                    $R=new CI_PHPReport();
                    $R->load(array(
                            'id'=>'report',
                            'data'=>$report
                        )
                    );

                    echo $R->render('csv');

        }
    }
    
    // ma7moud
      function MostViewReport()
	{
          $result = new ArrayObject();
        header('Content-Type: application/json');
        if ($this->input->post()) 
        {
                $type = $this->input->post('type');
                $time=0;
                if ($type == 'Top')
                {
                    $time=0;
                }
                elseif ($type == 'Dayly')
                {
                    $time=1;
                }
                elseif ($type == 'Weekly')
                {
                    $time=7;
                }
                elseif ($type == 'Monthly')
                {
                    $time=30;
                }
                elseif ($type == 'Yearly')
                {
                    $time=365;

                }
                $result['items'] = $this->Home_model->mostViewReport($time);
                echo json_encode($result);
//                $data = array('response' => $result);
//                $this->load->view('mostView_view', $data);
        }
        		
    }
    function getMark(){
        $result = new ArrayObject();
        header('Content-Type: application/json');
         $result['items'] = $this->Home_model->AdvancedSearchMark();
        echo json_encode($result);
        
        
    }
     function  getModels()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        
        $mark = $this->input->get('mark');
        $result['items'] = $this->Home_model->SelectModelByMark($mark);

        $result['code'] = 'success';
        $result['get'] = $this->input->get();
        echo json_encode($result);
//        echo '<option value="">Select Model</option>';
//        foreach ($result as $row) {
//            echo "<option value=" . $row['model'] . ">" . $row['model'] . "</option>";
//        }
    }
    
}
