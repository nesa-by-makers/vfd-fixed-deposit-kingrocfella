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
        <th>Res. Address</th>
        <th>Office Address</th>
        <th>Occupation</th>
        <th>Reference </th>
        <th>Duration</th>
        <th>Amount</th>
        <th>AccountNo</th>
        <th>AccountName</th>
        <th>BankName</th>
        <th>Vetted by <?php session_start(); echo $_SESSION["employeename"];   ?></th>
    </tr>   
    </thead>
    <?php
        
        
        
            $connection = new mysqli('localhost','root','Stoneage1992.','vfd');
            $query = "SELECT * FROM FIXEDDEPOSITDB WHERE Reference = '".$_SESSION["employeename"]."';";

            $fdquery = $connection->query($query);
            while($row = $fdquery->fetch_assoc()){
              echo "<tr> <td>".$row['FullName']."</td><td>".$row['PhoneNumber']."</td> <td>".$row['HomeAddress']."</td><td>".$row['OfficeAddress']."</td><td>".$row['Occupation']."</td><td>".$row['Reference']."</td>";
               
               $query2 = "SELECT * FROM PAYOUTDB WHERE CustomerID = ".$row['ID'].";";
               $query3 = "SELECT * FROM PLACEMENTDB WHERE CustomerID = ".$row['ID'].";";
               $payquery = $connection->query($query2);
               $placement = $connection->query($query3);
               while($rowplace =  $placement->fetch_assoc()){
                echo "<td>".$rowplace['ProposedDuration']."</td><td>".$rowplace['Amount']."</td>";
              }
              while ($rowpayout = $payquery->fetch_assoc()){
                echo "<td>".$rowpayout['AccNoPayout']."</td><td>".$rowpayout['AccNamePayout']."</td><td>".$rowpayout['BankNamePayout']."</td><td> <input type='checkbox' value=''></td></tr>";
              }
            }

    ?>
    
    </table>
            </body>             
</html>
