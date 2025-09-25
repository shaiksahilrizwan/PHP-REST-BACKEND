<?php
    include("header_info.php");
    include("database_connect.php");
    #This is UPDATE API Endpoint
    header('Access-Control-AllowMethods: PUT');
    $getData=json_decode(file_get_contents("php://input"),true);
    #extract id
    $id=$getData['id'];
    $name=$getData['name'];
    $age=$getData['age'];
    #Writing Insert Query
    $sql="UPDATE EMPLOYEE SET ID={$id},NAME='{$name}',AGE={$age} WHERE ID={$id}";
    #Run Query
    try{
    if(mysqli_query($conn,$sql)){
        #Update Success
        echo json_encode(array("message"=>"Update Record Successfully","status"=>"true"));
    }
    }catch(Exception $e){
        #no records present
        echo json_encode(array("message"=>"Update Record Failed","status"=>"false"));
    }