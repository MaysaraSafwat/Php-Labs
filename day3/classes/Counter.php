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

    public function increment(){
       
        if(!isset($_SESSION[_SESSION_KEY])){
            $this->_count++;
            $_SESSION[_SESSION_KEY] = true;
            return $this->_count;
        }else {
            return false;
        }


    }

    public function update_counter(){
       $handle=  fopen(_COUNTER_FILE, "w+");
       fwrite($handle, $this->_count);
       fclose($handle);

    }
    public function increment_and_update(){
        if($this->increment() != false){
        $this->update_counter();
        }
    }


}