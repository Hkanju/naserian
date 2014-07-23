<?php
/*
  * This Calendar Application was designed by:
  *
  *         Kyle Ferreira
  *         http://www.SterlingSavvy.com
  *
  * Credits for following the template of:
  *
  *         David Walsh
  *        http://davidwalsh.name/php-calendar
  *
  * You are free and welcome to use and manipulate this code as you wish.
  * Please keep a reference to those who helped shape it (ie: the sources above)
  */

/*
  * This is a Calendar Application Class
  *
  * Because this is a calendar application I've included a reference of all the Date()
  * format text to call so you can customize your own look and feel :)
  *
  * a    =    'am' or 'pm'
  * A    =    'AM' or 'PM'
  * B    =    Swatch Internet time
  * d    =    day of the month, 2 digits with leading zeros; i.e. '01' to '31'
  * D    =    day of the week, textual, 3 letters; i.e. 'Fri'
  * F    =    month, textual, long; i.e. 'January'
  * g    =    hour, 12-hour format without leading zeros; i.e. '1' to '12'
  * G    =    hour, 24-hour format without leading zeros; i.e. '0' to '23'
  * h    =    hour, 12-hour format; i.e. '01' to '12'
  * H    =    hour, 24-hour format; i.e. '00' to '23'
  * i    =    minutes; i.e. '00' to '59'
  * I    =    '1' if Daylight Savings Time, '0' otherwise.    --> Note this is Capital i --> I
  * j    =    day of the month without leading zeros; i.e. '1' to '31'
  * l    =    day of the week, textual, long; i.e. 'Friday'    --> Note this is Lowercase L --> l
  * L    =    boolean for whether it is a leap year; i.e. '0' or '1'
  * m    =    month; i.e. '01' to '12'
  * M    =    month, textual, 3 letters; i.e. 'Jan'
  * n    =    month without leading zeros; i.e. '1' to '12'
  * r    =     RFC 822 formatted date; i.e. 'Thu, 21 Dec 2000 16:01:07 +0200' (added in PHP 4.0.4)
  * s    =     seconds; i.e. '00' to '59'
  * S    =     English ordinal suffix, textual, 2 characters; i.e. 'th', 'nd'
  * t    =     number of days in the given month; i.e. '28' to '31'
  * T    =     Timezone setting of this machine; i.e. 'MDT'
  * U    =     seconds since the epoch
  * w    =     day of the week, numeric, i.e. '0' (Sunday) to '6' (Saturday)
  * Y    =     year, 4 digits; i.e. '1999'
  * y    =     year, 2 digits; i.e. '99'
  * z    =     day of the year; i.e. '0' to '365'
  * Z    =     timezone offset in seconds (i.e. '-43200' to '43200').
  * The offset for timezones west of UTC is always negative, and for those east of UTC is always positive.
  */
class Calendar
{



     /*
      * Variables for the class
      *
      * Title: refers to the month that should be placed in the heading of the view
      * Calendar: holds the completed calendar
      * Month: holds month
      * Year: holds year value
      * Style: refers to which css style to apply to the calendar (default is: calendar classes)
      * Select Month: Used in the control menu to select which month to view
      * Select Year: Used in the control menu to select which year to view
      * Next Month: Used to select the next month in the control menu
      * Previous Month: Used to select the previous month in the control menu
      * Year Next Month: Stores the year information for the next month control
      * Year Previous Month: Stores the year information for the previous month control
      * Next Month Url: Sets the data for the link
      * Previous Month Url: Sets the data for the link
      * Store Next Link: Sets the link for the view
      * Store Previous Link: Sets the link for the view
      * Display Controls: Shows all the control options in the menu
      * Start Form: holds the <form> tag to start the form as well as table information
      * Close Form: holds the </form> tag to close the form as well as table information
      */
     public $title;
     public $calendar;
     public $month;
     public $year;
     public $style;
     public $selectMonth;
     public $selectYear;
     public $nextMonth;
     public $previousMonth;
     public $yearNextMonth;
     public $yearPreviousMonth;
     public $nextMonthUrl;
     public $previousMonthUrl;
     public $storeNextLink;
     public $storePreviousLink;
     public $displayControls;
     public $startForm;
     public $closeForm;
     
     public $controller;
     public $dialog;

     /*
      * Constructor
      *
      * By Default set the month year to null so the applications will grab the
      * current month and year in the event the none is specified
      */
      
     /*function __construct($month = NULL, $year = NULL, $style = "calendar")
     {
         $this->month = $month;
         $this->year = $year;
         $this->style = $style;
         $this->init();
     } */
     
      function __construct($month = NULL, $year = NULL, $style = "calendar",$dialog=NULL)
     {
         $this->month = $month;
         $this->year = $year;
         $this->style = $style;
         //$this->dialog = $dialog;
         $this->init();
     }

     /*
      * Initializing function that runs upon class instantiation
      *
      * Sets the title of the application
      * Then draws the calendar but does not print it
      * Printing has to be be called via printCalendar
      */
     public function init()
     {
         /*
          * Call set title function
          * Call draw calendar function
          * Default gets the current month year for the title.
          * Overriding month and year will alter this for both
          * functions.
          */
         $this->setTitle();
         $this->setControlMenu();
         $this->setController();
         $this->drawCalendar();
         $this->setDialog();
     }

     /*
      * Set the title
      * If there is another function that passed the date, either by calendar manipulation
      * (like moving to the next month or previous year etc.) or if it was manually overrided
      * by the user / developer - it'll set the proper header title accordingly.
      */
     public function setTitle()
     {
         if(($this->month == NULL) || ($this->year == NULL))
         {
             $this->title = date("F Y");
         }
         else
         {
             $this->title = date('F Y',mktime(0,0,0,$this->month,1,$this->year));
         }
     }
     
     public function currentController(){

        return $this->controller = Yii::app()->controller;
     }
     
      public function setController(){

        $this->controller = Yii::app()->controller;
     }

     /*
      * Print out the control menu
      */
     public function printControlMenu()
     {
         return $this->displayControls;
     }

     /*
      * Print out starting tag of form
      */
     public function printStartForm()
     {
         return $this->startForm;
     }

     /*
      * Print out closing tag of form
      */
     public function printCloseForm()
     {
         return $this->closeForm;
     }

     /*
      * Builds the control menu
      */
     public function setControlMenu()
     {
         /*
          * If the application didn't provide $month / $year data
          * Set the default values to the current month and year
          * We only set this once here and it'll be used and implied
          * for the drawCalendar function. Since this function is called
          * first through the init() function
          */
         if(($this->month == NULL) || ($this->year == NULL))
         {
             // Month in numbers with the leading 0
             $this->month = date("m");
             $this->year = date("Y");
         }

         /* select month control */
         $this->selectMonth = '<select class="'. $this->style .'-control-select" name="month" id="month">';
         for($x = 1; $x <= 12; $x++)
         {
             $this->selectMonth.= '<option value="'.$x.'"'.
             ($x != $this->month ? '' : ' selected="selected"').'>'.date('F',mktime(0,0,0,$x,1,$this->year)).'</option>';
         }
         $this->selectMonth.= '</select>';

         /* select year control */
         // Alter this year_range number to change how many years difference are selectable.
         $year_range = 7;
         $this->selectYear = '<select class="'. $this->style .'-control-select" name="year" id="year">';
         for($x = ($this->year-floor($year_range/2)); $x <= ($this->year+floor($year_range/2)); $x++)
         {
             $this->selectYear.= '<option value="'.$x.'"'.($x != $this->year ? '' : ' selected="selected"').'>'.$x.'</option>';
         }
         $this->selectYear.= '</select>';

         /* "next month" control and "previous month" control */
         /* For plain old PHP
         $this->nextMonth = '<a href="?month='.($this->month != 12 ? $this->month + 1 : 1).
         '&year='.($this->month != 12 ? $this->year : $this->year + 1).'" class="control">Next Month >></a>';
         $this->previousMonth = '<a href="?month='.($this->month != 1 ? $this->month - 1 : 12).
         '&year='.($this->month != 1 ? $this->year : $this->year - 1).'" class="control"><<     Previous Month</a>'; */

         // For Yii Framework

         $this->nextMonth = ($this->month != 12 ? $this->month + 1 : 1);
         $this->yearNextMonth = ($this->month != 12 ? $this->year : $this->year + 1);
         $this->previousMonth = ($this->month != 1 ? $this->month - 1 : 12);
         $this->yearPreviousMonth = ($this->month != 1 ? $this->year : $this->year - 1);
        
         /* Bring all the controls together in a menu */
         $this->startForm = '<table cellpadding="0" cellspacing="0" class="'. $this->style .'-control"><tr><td><form method="post">';
         $this->displayControls = $this->selectMonth.$this->selectYear.
             ' <input type="submit" name="submit" value="Go" />';
         $this->closeForm = '</form></td></tr></table>';
     }

     /*
      * Print out the Calendar to the screen
      */
     public function printCalendar()
     {
         return $this->calendar;
     }

     public function do_alert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
    
     public function cs()
    {

     echo '<script type="text/javascript">
      function win1() {
         window.open("win1.php","Window1","menubar=no,width=460,height=360,toolbar=no");
      }</script>';
   }
   
   public function setDialog(){

    //return $this->controller->render('popupBox', array());
     /* $cs = Yii::app()->getClientScript();
      $cs->registerScript(
      'my-hello-world-1',
     // 'var greetings = "Hello" + " " + "World";
     // alert(greetings);',
      'var link = "/law/index.php/calendarEvents/create/"
      window.open(link,"PopUp Window","menubar=no,width=700,height=300,toolbar=no");',
      CClientScript::POS_END
);
      return $cs; */
   }
     /*
      * Draw the Calendar
      */
     public function drawCalendar()
     
     {

         /* We need to take the month value and turn it into one without a leading 0 */
         if((substr($this->month, 0, 1)) == 0)
         {
             // if value is between 01 - 09, drop the 0
             $tempMonth = substr($this->month, 1);
             $this->month = $tempMonth;
         }

         /* draw table */
         $this->calendar = '<table cellpadding="0" cellspacing="0" class="'. $this->style .'">';

         /* table headings */
         $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
         $this->calendar.= '<tr class="'. $this->style .'-row"><td class="'. $this->style .'-day-head">'
             .implode('</td><td class="'. $this->style .'-day-head">',$headings).'</td></tr>';

         /* days and weeks vars now ... */
         $running_day = date('w',mktime(0,0,0,$this->month,1,$this->year));
         $days_in_month = date('t',mktime(0,0,0,$this->month,1,$this->year));
         $days_in_this_week = 1;
         $day_counter = 0;
         $dates_array = array();

         /* row for week one */
         $this->calendar.= '<tr class="'. $style .'-row">';

         /* print "blank" days until the first of the current week */
         for($x = 0; $x < $running_day; $x++):
             $this->calendar.= '<td class="'. $this->style .'-day-np"> </td>';
             $days_in_this_week++;
         endfor;

         /* keep going with days.... */
         for($list_day = 1; $list_day <= $days_in_month; $list_day++):
             if($list_day == date("j",mktime(0,0,0,$this->month)))
             {
                 $this->calendar.= '<td class="'. $this->style .'-current-day">';
             }
             else
             {
                 if(($running_day == "0") || ($running_day == "6"))
                 {
                     $this->calendar.= '<td class="'. $this->style .'-weekend-day">';
                 }
                 else
                 {
                     $this->calendar.= '<td class="'. $this->style .'-day">';
                 }
             }

                 /* add in the day number */
                 //$this->calendar.MyDialog::displayMsg($list_day,$this->style);

                   
                //$this->calendar.= '<div class="'. $this->style .'-day-number">'.'<a href="/law/index.php/calendarEvents/create">'.$list_day.'</a>'.'</div>';

                $yiiButton = CHtml::Button($list_day,array('onclick'=>"javascript:myPopup($id);"));
                  //$yiiButton = CHtml::Button($list_day,array('onclick'=>"javascript:myPopup('/law/index.php/calendarEvents/create','','width=500,height=200');"));

                 $this->calendar.= '<div class="'. $this->style .'-day-number">'.'<a href="javascript:myPopup();"</a>'.$list_day.'</div>';

                //$this->calendar.= '<div class="'. $this->style .'-day-number">'.$yiiButton.'</div>';


                $list_month = $this->month;
                $list_year = $this->year;
                
                // $this->calendar.= '<div class="'. $this->style .'-day-number">'.'<a href=\"javascript:MM_openBrWindow('"/law/index.php/calendarEvent/create"','','"width=500,height=300"');\">'.$list_day.'</a>'.'</div>';

                 /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
                 
                 $month = $this->month;
                 $year = $this->year;
                 
                 $results = CalendarEvents::model()->findAllBySql("SELECT * FROM  calendar_events WHERE event_day = $list_day and event_month =$month and event_year=$year");
                 
                 foreach($results as $result){
                     $link = $result->event_title;
                     $desc = $result->event_desc;
                     $time = $result->event_time;
                     
                 $this->calendar.= '<div class="'. $this->style .'-text"><a href="#" title="'.$link.'&#10;&#13; desc='.$desc.'&#10;&#13; time='.$time.'&#10;&#13; ">'.$link.'</a></div><br/>';
                // $this->calendar.= '<div class="'. $this->style .'-text"><a href="javascript:alert(hello)">hello</a>';

                 }
                 //echo CHtml::Button('View',array('onclick'=>"javascript:do+alert('Silva');"));
                 
                //$this->calendar.= '<div class="'. $this->style .'-text"><a href="create" onMouseOver="self.status="12"; return true;"><b> 1</b></a></div><br/>';
                 
                 /*$this->beginWidget('zii.widgets.jui.CJuiDialog', array('id'=>'help',
                 // additional javascript options for the dialog plugin
                 'options'=>array('title'=>'Help','autoOpen'=>true,'width'=>'350px','height'=>'450','resizable'=>false,),)
                 );  */

                // $this->calendar.= '<div class="'. $this->style .'-text"><a href="#">Event 2</a></div>';
                 $this->calendar.= str_repeat('<p> </p>',2);

             $this->calendar.= '</td>';
             
             
             if($running_day == 6):
                 $this->calendar.= '</tr>';
                 if(($day_counter+1) != $days_in_month):
                     $this->calendar.= '<tr class="'. $this->style .'-row">';
                 endif;
                 $running_day = -1;
                 $days_in_this_week = 0;
             endif;
             $days_in_this_week++; $running_day++; $day_counter++;
         endfor;

         /* finish the rest of the days in the week */
         if($days_in_this_week < 8) :
             for($x = 1; $x <= (8 - $days_in_this_week); $x++):
                 $this->calendar.= '<td class="'. $this->style .'-day-np"> </td>';
             endfor;
         endif;

         /* final row */
         $this->calendar.= '</tr>';

         /* end the table */
         $this->calendar.= '</table>';
         
         //$this->currentController();

         

     }
}

?>
