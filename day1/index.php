<?php
$error ="";
    require_once("views/contact.php");
    require_once("config.php");

if (!empty($_POST)){
   $error = validate_form();
   var_dump($error);
   if(empty($error)){
    print_confirmation();
    exit();
   }
   
}  

 
function validate_form (){
    if(!empty(check_for_empty_fields())) {
        return check_for_empty_fields();
    }
    else {
        if(strlen($_POST["name"]) >_NAME_LENGTH_){
            return "Name is too long";
        }else if(strlen($_POST["message"])> _MSG_LENGTH_){
            return "Msg is too long";
        } else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
          return "Email is not valid" ;
        }
         else{
            return "";
         } 
    }
    
}
function print_confirmation(){
    echo '<body>
    <div>'  
    .'<center><h1 style="color:green">'._THANK_YOU_MSG.'</h1></br>'
    ."<h3> Your Submitted Data is </h3></br>"
    ."<b> Name : </b>".trim($_POST['name'])."</br>"
    ."<b> Email : </b>".trim(strtolower($_POST['email']))."</br>"
    ."<b> Message : </b>".trim($_POST['message'])."</br>"
    .'</center>'.
'</div></body>';
}

function check_for_empty_fields(){
    foreach($_POST as $key => $value){
        if(empty($value)){
            return "please fill ".$key;
        }
    }
}

function remember_var($var){
    if(isset($_POST[$var]) && !empty($_POST[$var])){
      return $_POST[$var];
    }else{
        return "";
    }
  }