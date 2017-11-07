<?php

$servername = "localhost";
$username = "root";
$password = "Stoneage1992.";
$database = "vfd";

$connection = new mysqli($servername,$username,$password,$database);
// check connection
if ($connection->connect_error){
    die("The connection failed".connect_error);
}

// init variables from the signup form
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$useremail = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$position = $_POST["position"];
$userpassword = $_POST["password"];

// insert into clientdatabase
$query = $connection->prepare("INSERT INTO employeedb (FirstName, LastName, Email, Position, PhoneNumber, Password) VALUES (?,?,?,?,?,?)");
$query->bind_param("ssssss",$firstname,$lastname,$useremail,$position,$phonenumber,$userpassword);

if($query->execute() == true){
    header("Location: http://localhost/vfdform/vfd-fixed-deposit-kingrocfella/ClientLoginAssignment/VfdForm.php"); /* Redirect to form */ 
    exit();
}
else {
    header("Location: http://localhost/vfdform/vfd-fixed-deposit-kingrocfella/EmployeeLogin/redirectemployeelogin.html"); /* Redirect to signin page */ 
    exit();
}


?>