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
    // init form variables
    $fullname = $_POST["FullName"];
    $phonenumber = $_POST["phonenumber"];
    $resaddr = $_POST["resaddr"];
    $offaddr = $_POST["offaddr"];
    $occupation = $_POST["occupation"];
    $duration = $_POST["duration"];
    $amount = $_POST["amount"];
    $accpayout = $_POST["accpayout"];
    $accnamepayout = $_POST["accnamepayout"];
    $bankname = $_POST["bankname"];
    $kinname = $_POST["kinname"];
    $kinphonenumber = $_POST["kinphonenumber"];
    $kinemail = $_POST["kinemail"];
    $reference = $_POST["reference"];

    //inserting into fixeddepositdb
    $query = "INSERT INTO FIXEDDEPOSITDB (FullName, PhoneNumber, HomeAddress, OfficeAddress, Occupation,  NextOfKinName, NextOfKinPhoneNo,NextOfKinEmail,Reference) VALUES('".$fullname."','".$phonenumber."','".$resaddr."','".$offaddr."','".$occupation."','".$kinname."','".$kinphonenumber."','".$kinemail."','".$reference."');"; 
    //get the customerID
    if($connection->query($query) == true){
        $customerid = $connection->insert_id;
    }

    //inserting into payoutdb
    $query1 = "INSERT INTO PAYOUTDB(AccNoPayout, AccNamePayout, BankNamePayout, CustomerID) VALUES('".$accpayout."','".$accnamepayout."','".$bankname."',".$customerid.");";
    //get the payoutID
    if($connection->query($query1) == true){
        $payoutid = $connection->insert_id;
    }

    //inserting into placementdb
    $query2 = "INSERT INTO PLACEMENTDB(ProposedDuration, Amount, CustomerID, PayoutID) VALUES(".$duration.",'".$amount."',".$customerid.",".$payoutid.");";

    
    if($connection->query($query2) == true){
        echo "Thanks for filling out this form. We will process your request and get in touch with you shortly!";
    }
    else {
        echo "Error connecting to database".$connection->error;
    }

        $connection->close();









?>