<?php

Yii::import('zii.widgets.jui.CJuiDialog');
class MyDialog extends CJuiDialog {
    // class contents here
    
    public function displayMsg($list_day,$style){
     // $var = "This is great";

       $var.= '<div class="'. $style .'-day-number">'.'<a href="/law/index.php/calendarEvents/create">'.$list_day.'</a>'.'</div>';
       return $var;

    }
}

?>
