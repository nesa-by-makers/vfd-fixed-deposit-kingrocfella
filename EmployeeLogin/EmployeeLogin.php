
<?php
 $servername= "localhost";
 $username = "root";
 $password = "Stoneage1992.";
 $database = "vfd";

 $connection = new mysqli($servername,$username,$password,$database);
 //check connection
 if ($connection->connect_error){
    die("The connection failed   ".connect_error);
}
//INIT Variables
$loginemail = $_POST["loginemail"];
$loginpassword = $_POST["loginpassword"];
$loginposition = $_POST["position"];


//verify the user
$verifyemployee = 'SELECT * FROM EMPLOYEEDB;';
$verifyquery = $connection->query($verifyemployee);

//begin session
session_start();
$getaofullname = 'SELECT FirstName,LastName FROM EMPLOYEEDB WHERE Email = "'.$loginemail.'";';
$query = $connection->query($getaofullname);
$result  = $query->fetch_assoc();
$_SESSION['employeename'] = $result['FirstName']." ".$result['LastName'];

//loop through the database and log the verified user in..
if ($verifyquery->num_rows > 0 ){
    while($row = $verifyquery->fetch_assoc()){
        $getuseremail = $row['Email'];
        $getpassword = $row['Password'];
        $getposition = $row['Position'];
        if (($getpassword == $loginpassword) && (($getuseremail == $loginemail) && ($getposition == $loginposition))){
                if ($getposition == 'Accounting Officer'){
                    header("Location: http://localhost/vfdform/vfd-fixed-deposit-kingrocfella/ClientLoginAssignment/AccountOfficerdashboard.php"); //Redirect to form 
                    exit();
                }
                
        }   
    }
    header("Location: http://localhost/vfdform/vfd-fixed-deposit-kingrocfella/EmployeeLogin/wrongemployeelogin.html"); // Redirect to signin page 
    exit();
    } 
    
?>


