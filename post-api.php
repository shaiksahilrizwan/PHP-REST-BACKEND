<?php
    include("header_info.php");
    include("database_connect.php");
    #This is POST API Endpoint
    header('Access-Control-AllowMethods: POST');
    $getData=json_decode(file_get_contents("php://input"),true);
    #extract id
    $id=$getData['id'];
    $name=$getData['name'];
    $age=$getData['age'];
    #Writing Insert Query
    $sql="INSERT INTO EMPLOYEE VALUES({$id},'{$name}',{$age})";
    #Run Query
    try{
    if(mysqli_query($conn,$sql)){
        #INSERT Success
        echo json_encode(array("message"=>"Inserted Record Successfully","status"=>"true"));
    }
    }catch(Exception $e){
        #no records present
        echo json_encode(array("message"=>"Record Insertion Failed","status"=>"false"));
    }