<div class = "content">
<div class = "left">

  <!LEFT PANE - 1 !>
  <div class = "leftcontent"><ul>
    <li><div class = "leftdiv head">C A T A L O G U E</div></li><br>
    <?php
     $tasks = array("Task1","Task2","Task3","Task4","Task5");
     foreach($tasks as $task)
     {
       echo '<li>';
  	   echo '<div class = "leftdiv">'.$task.'</div>';
  	   echo '</li>';
  	   echo '<br>';
     }
    ?>
  </div>
  
  <br> <br> <br>
  
  <!LEFT PANE - 2 !>
  <div class = "leftcontent"><ul>
    <li><div class = "leftdiv head">APPOINTMENTS</div></li><br>
    <?php
     $events = array("Event1","Event2","Event3","Event4","Event5");
     foreach($events as $event)
     {
       echo '<li>';
  	   echo '<div class = "leftdiv">'.$event.'</div>';
  	   echo '</li>';
  	   echo '<br>';
     }
    ?>
  </div>

</div>

<! Center screen !>