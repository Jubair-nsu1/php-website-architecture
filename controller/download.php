<?php
include("dbConnection.php");

// Download Marks as CSV
if(isset($_POST["print_report"]))
{
  $output = '';
  $c=1;

  $query = "Select * From log_history ";
  $sql =mysqli_query($conn,$query) or die('Error');
  $count = mysqli_num_rows($sql);
  if($count=1){

    $output .= '
                <table class="table" bordered="1">
                      <tr>
                           <th>No.</th>
                           <th>Employee Name</th>
                           <th>Log</th>
                           <th>Date</th>
                           <th>Time</th>
                      </tr>
              ';

      while ($row = mysqli_fetch_array($sql)) {
            $name = $row['employee_name'];
            $log = $row['log'];
            $date = $row['date'];
            $time = $row['time'];


            $output .= '
            <tr>
                    <td>'.$c++ .'</td>
                    <td>'.$name.'</td>
                    <td>'.$log.'</td>
                    <td>'.$date.'</td>
                    <td>'.$time.'</td>
            </tr>
            ';

      }//end of whileloop
      $c=0;

      $output .= '</table>';
      header('Content-Type: application/xls');
      header('Content-Disposition: attachment; filename=Log_Report.xls');
      echo $output;
  }//end of if-Statement

}

?>
