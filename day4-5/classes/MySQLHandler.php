<?php

class MySQLHandler implements DbHandler{

    private $_db_handler;
    private $_table;

    public function __construct($table){
        
        $this->$_table = $table;
        $check = $this->connect();
        var_dump($check);
    }

    public function connect(){
        try{
            $h = mysqli_connect(_HOST_, _USERNAME_, _PASS_, _DB_);
            if($h){
                $this->$_db_handler = $h;
                return true;
            }else{
                return false;
            }

        }catch(Exception $e){
            var_dump($e);
            die("something went wrong!");
        }
    }

    public function get_result_set($sql_qry){
        var_dump($sql_qry);
        try{
        $result_handler = mysqli_query($this->$_db_handler, $sql_qry);
        $result_array = array();
        
        if($result_handler){
            while($row = mysqli_fetch_array($result_handler)){
            $result_array[]= array_change_key_case($row);
            }
            return $result_array;
        }else{
            return false;
        }
        }catch(Exception $e){
            var_dump("xouldnt exectute query");
        }
    }

    public function get_all_items_paginated($cols = array(), $start =0){

       
    $qry = "select * from items";
    $res = array();
    
    $res = $this->get_result_set($qry);
    var_dump($res);
    }

}