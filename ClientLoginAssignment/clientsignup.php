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
$userpassword = $_POST["password"];


// insert into clientdatabase
$query = $connection->prepare("INSERT INTO CLIENTDB (FirstName, LastName, Email, PhoneNumber, Password) VALUES (?,?,?,?,?)");
$query->bind_param("sssss",$firstname,$lastname,$useremail,$phonenumber,$userpassword);

if($query->execute() == true){
    header("Location: http://localhost/vfdform/clientlogin/VfdForm.html"); /* Redirect to form */ 
    exit();
}
else {
    header("Location: http://localhost/vfdform/clientlogin/redirectloginpage.html"); /* Redirect to signin page */ 
    exit();
}


?>