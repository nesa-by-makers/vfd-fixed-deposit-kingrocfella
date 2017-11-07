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
        <th>Duration</th>
        <th>Amount</th>
        <th>AccountNo</th>
        <th>AccountName</th>
        <th>BankName</th>
        <th>NOK Name</th>
        <th>NOK Phone No.</th>
        <th>NOK Email </th>
        <th>Reference </th>
    </tr>   
    </thead>
    <?php
            $connection = new mysqli('localhost','root','Stoneage1992.','vfd');
            $query = "SELECT * FROM FIXEDDEPOSITDB;";
            $query2 = "SELECT * FROM PAYOUTDB;";
            $query3 = "SELECT * FROM PLACEMENTDB;";
            $fdquery = $connection->query($query);
            $payquery = $connection->query($query2);
            $placement = $connection->query($query3);
                for ($i = 0; $i <= $fdquery->num_rows; $i++){
                        $row = $fdquery->fetch_assoc();
                        $rowpayout =  $payquery->fetch_assoc(); 
                        $rowplace =  $placement->fetch_assoc();
                        echo "<tr> <td>".$row['FullName']."</td><td>".$row['PhoneNumber']."</td> <td>".$row['HomeAddress']."</td><td>".$row['OfficeAddress']."</td><td>".$row['Occupation']."</td><td>".$rowplace['ProposedDuration']."</td><td>".$rowplace['Amount']."</td><td>".$rowpayout['AccNoPayout']."</td><td>".$rowpayout['AccNamePayout']."</td><td>".$rowpayout['BankNamePayout']."</td><td>".$row['NextOfKinName']."</td><td>".$row['NextOfKinPhoneNo']."</td><td>".$row['NextOfKinEmail']."</td><td>".$row['Reference']."</td></tr>";
                        
                      
                }
    ?>
    </table>
</body>
</html>