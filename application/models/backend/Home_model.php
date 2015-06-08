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
        $query = $this->db->query("select distinct model from cars where producer = '" . $prod . "'");
        $result=$query->result_array();
        return $result;
    }

    function truncate(){
        $this->db->truncate('cars');
    }

    function addtestcar($data){
        $this->db->query("INSERT INTO cars VALUES ('','".$data."','','','','','','','','','','','','','','','','','','','','','','','','','','')");
    }


}