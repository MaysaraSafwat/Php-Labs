<?php

class Counter {
    private $_count;

    public function __construct(){
     $this->_count = $this->get_count();
    }

    public function get_count(){
        if(file_exists(_COUNTER_FILE)){
            return intval(file_get_contents(_COUNTER_FILE));
        }else {
            return 0; 
        }

    }
}