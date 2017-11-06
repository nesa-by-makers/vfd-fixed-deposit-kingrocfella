
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

//verify the user
$verifyemployee = 'CALL verifyemployee();';
$verifyquery = $connection->query($verifyemployee);

//loop through the database and log the verified user in..
if ($verifyquery->num_rows > 0 ){
    while($row = $verifyquery->fetch_assoc()){
        $getuseremail = $row['Email'];
        $getpassword = $row['Password'];
        if (($getuseremail == $loginemail) && ($getpassword == $loginpassword)){
            header("Location: http://localhost/vfdform/clientlogin/VfdForm.html"); /* Redirect to form */ 
            exit();
        }   
    }
    header("Location: http://localhost/vfdform/vfd-fixed-deposit-kingrocfella/EmployeeLogin/wrongemployeelogin.html"); /* Redirect to signin page */ 
    exit();
}



?>