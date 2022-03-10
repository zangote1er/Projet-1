<?php
 $string= 
   file_get_contents("data.json");
  if($string===false){
      //deal with error...
  }
  $json_a=json_decode($string, true);
  if ($json_a===false){
      //deal with error...
  }
   foreach ($json_a["rows"] as $person_fullname=> $person_a) {
       echo "<p> ".$person_a["fullname"]. "
       ".$person_a["cid_number"]." ".$person_a["type"]." ".$person_a["userfullname"]." </p>";

        }
       ?>     
