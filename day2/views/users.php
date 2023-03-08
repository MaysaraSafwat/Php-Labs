<?php

$users = convert_to_array();
$keys=["Date of Visit","IP Address","Name","Email","Message"];
foreach($users as $user){
    $i=0;
    $user_details = explode(",",$user);
      echo "New User <br/>";
      echo str_repeat("*", 20);
        echo "<div>";
    foreach($user_details as $value ){
      echo "<h4>$keys[$i]: $value </h4>";
      $i++;
    }
      echo "</div>";
}
?>