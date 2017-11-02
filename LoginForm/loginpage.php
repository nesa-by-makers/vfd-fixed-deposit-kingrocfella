

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
$adminusername = $_POST["adminusername"];
$adminpassword = $_POST["adminpassword"];

//verify the user
$verifyuser = 'CALL verify();';


$verifyquery = $connection->query($verifyuser);



    $verifyresult = $verifyquery->fetch_assoc();
        $getusername = $verifyresult['username'];
        $getpassword = $verifyresult['password'];
   
       

if (($getusername == $adminusername) && ($getpassword == $adminpassword)){
    echo "You have successfully logged in!";
}
else {
    echo "Wrong username or password!";
}


?>