<?php


class InsideAccess{
    // class contents here
    
      public function init()
     {
         /*
          * Call set title function
          * Call draw calendar function
          * Default gets the current month year for the title.
          * Overriding month and year will alter this for both
          * functions.
          */
          
         $this->isVisible($string=NULL,$user_id=NULL);
     }
     
    public  function isVisible($string,$user_id){

       $visible = false;
       $all = "All";

       if(Yii::app()->user->getPermission("Admin")){  //if user role is not Administrator
         $visible = true;

       }else{
            if($string === "All"){
               $visible = true;
            }else{
                 $string_array = explode(",",$string);
                 //Loop through the array to get the values you want:
                 $i=0;
                 while($i< sizeof($string_array)){
                //$user_visibility = strcmp($user_id,$string_array[$i]);
                
                    if($string_array[$i] == $user_id){  //is user logged in is allowed to view case file then allow  and end loop
                       //show this user, case file
                       $visible = true;
                       $i = sizeof($string_array);
                    }
                    else{
                       $visible = false;
                       $i++;
                    }
                }
          }
        }
             
          return $visible;
    }
}

?>
