<?php
session_start();
if((isset($_SESSION['employeeloginemail'])) &&(isset($_SESSION['employeeloginpass'])) == false )
{
  header('Location: http://localhost/vfdform/vfd-fixed-deposit-kingrocfella/EmployeeLogin/Employee.html');
  exit();
}

?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 
</head>
<body>
    <table class="table table-bordered">
    <thead>
   <tr> <th>Full Name</th>
        <th>Phone Number</th>
        <th>Office Address</th>
        <th>Duration</th>
        <th>Amount</th>
        <th>AccountNumber[Payout]</th>
        <th>AccountName[Payout]</th>
        <th>BankName[Payout]</th>
        <th>Already vetted by</th>
        <th>Vet by <?php echo $_SESSION["employeename"];   ?></th>
    </tr>   
    </thead>
    <?php
         
        
        
            $connection = new mysqli('localhost','root','Stoneage1992.','vfd');
           
            $query = "SELECT * FROM FIXEDDEPOSITDB WHERE ID IN (SELECT CustomerID FROM supdashboard) AND ID NOT IN (SELECT CustomerID FROM treasurydashboard);";
            
          
          
            $fdquery = $connection->query($query);
            while($row = $fdquery->fetch_assoc()){
             
              echo "<tr> <td>".$row['FullName']."</td><td>".$row['PhoneNumber']."</td> <td>".$row['OfficeAddress']."</td>";
              
            
            
              
            
              
               $query2 = "SELECT * FROM PAYOUTDB WHERE CustomerID = ".$row['ID'].";";
               $query3 = "SELECT * FROM PLACEMENTDB WHERE CustomerID = ".$row['ID'].";";
               $payquery = $connection->query($query2);
               $placement = $connection->query($query3);
                while($rowplace =  $placement->fetch_assoc()){
                    echo "<td>".$rowplace['ProposedDuration']."</td><td>".$rowplace['Amount']."</td>";
                    $query4 = "SELECT CEOName FROM ceodashboard WHERE CustomerID = ".$row['ID'].";";
                    $trquery = $connection->query($query4);
                    while ($rowtr = $trquery->fetch_assoc()){
          
                        while ($rowpayout = $payquery->fetch_assoc()){
                            echo "<td>".$rowpayout['AccNoPayout']."</td><td>".$rowpayout['AccNamePayout']."</td><td>".$rowpayout['BankNamePayout']."</td><td>".$rowtr['CEOName']."</td><td> <a href='treasuryinsertdb.php?id=".$row['ID']."&paid=paid'>Paid</a></td></tr>";

                        }
                    }
                
                }
          
            }
            
            
    ?>
    
    </table>
            <form action = "http://localhost/vfdform/vfd-fixed-deposit-kingrocfella/EmployeeLogin/employeesignout.php">
              <button> Log Out </button>

            </form>
        
                       
</html>
