<?php 
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
function save_to_file($date) {
    $ip = getRealUserIp();
    $fp = fopen(_SAVED_USERS_FILE_, "a");
    $written_string = $date." ,".
    $ip." ,".
    implode(" ,", $_POST);
    fwrite($fp, $written_string.PHP_EOL);
    fclose($fp);
}
function convert_to_array() {
    return file(_SAVED_USERS_FILE_);
}


?>