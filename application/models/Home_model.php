<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 20/04/15
 * Time: 01:34 م
 */
class Home_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function addNewCar($data){
        $this->db->insert('cars',$data);
    }
    function searchReport(){
        $query = $this->db->query("select keyword , COUNT(*) as count from simsearch group by keyword ORDER BY COUNT(*) DESc limit 5");

        $result=$query->result_array();

        return $result;
    }
    function searchReportForUser(){
	$r=2;
	$ss="SELECT keyword , COUNT(*) as count FROM simsearch WHERE fkuser=".$r." group by keyword";
        $query = $this->db->query($ss);

        $result=$query->result_array();

        return $result;
    }
    function searchReportDayly(){
        $query = $this->db->query("SELECT keyword , COUNT(*) as count FROM simsearch WHERE serdate between DATE_SUB(now() ,INTERVAL 1 DAY) and now() group by keyword ORDER BY COUNT(*)  DESc limit 5");

        $result=$query->result_array();

        return $result;
    }
    function searchReportWeekly(){
        $query = $this->db->query("SELECT keyword , COUNT(*) as count  FROM simsearch WHERE serdate between DATE_SUB(now() ,INTERVAL 7 DAY) and now() group by keyword ORDER BY COUNT(*)  DESc limit 5");

        $result=$query->result_array();

        return $result;
    }
    function searchReportMonthly(){
        $query = $this->db->query("SELECT keyword , COUNT(*) as count  FROM simsearch WHERE serdate between DATE_SUB(now() ,INTERVAL 30 DAY) and now() group by keyword ORDER BY COUNT(*)  DESc limit 5");

        $result=$query->result_array();

        return $result;
    }
    function searchReportYearly(){
        $query = $this->db->query("SELECT keyword , COUNT(*) as count  FROM simsearch WHERE serdate between DATE_SUB(now() ,INTERVAL 365 DAY) and now() group by keyword ORDER BY count  DESc limit 5");

        $result=$query->result_array();

        return $result;
    }

    function viewCar($id){
        $query = $this->db->query("select * from cars where id = $id ");

        $result=$query->result_array();

        return $result;
    }
    function keywordReport($data){
        $this->db->insert('simsearch',$data);
    }
    function simpleSearchModel($keyword){
        $query = $this->db->query("select * from cars where model like '%$keyword%'  or producer like '%$keyword%'");

        $result=$query->result_array();

        return $result;
    }
    function AdvancedSearchModel($query){
        $query = $this->db->query("$query");
        $result=$query->result_array();
        return $result;
    }

    function SelectModelByMark($prod){
        $query = $this->db->query("select distinct model from cars where producer like '%" . $prod . "%'");
        
        $result=$query->result_array();
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
        return $result;
    }

    function truncate(){
        $this->db->truncate('cars');
    }

    function addtestcar($data){
        $this->db->query("INSERT INTO cars VALUES ('','".$data."','','','','','','','','','','','','','','','','','','','','','','','','','','')");
    }
 function addMostView($mark,$model,$year){
        $userid=1;
        $this->db->query("insert into mostview(car,fkuser) values (CONCAT('$mark','-','$model','-','$year'),".$userid.")");
    }

    function mostViewReport($time){
        if($time == 0)
        {
            $query = $this->db->query("select car , COUNT(*) as count from mostview group by car ORDER BY COUNT(*)  DESc limit 5");
        }
    else
        {
            $query = $this->db->query("SELECT car , COUNT(*) as count  FROM mostview WHERE date between DATE_SUB(now() ,INTERVAL ".$time." DAY) and now() group by car ORDER BY COUNT(*)  DESc limit 5");
        }
        $result=$query->result_array();
        return $result;
    }
    function selectUsed()
    {
        $query = $this->db->query("select * from cars where type = 'used' ");

        $result=$query->result_array();

        return $result;
    }
    function selectNew()
    {
        $query = $this->db->query("select * from cars where type = 'new' ");

        $result=$query->result_array();

        return $result;
    }
    
    
        function AdvancedSearchMark(){
        $query = $this->db->query("select producer from cars");

        $result=$query->result_array();

        return $result;
    }

}
