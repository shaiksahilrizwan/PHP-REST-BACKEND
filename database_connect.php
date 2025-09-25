<?php
$conn=null;
try{
        #Database Connection 
        $conn=mysqli_connect('127.0.0.1','root','','ORG');  
    }
    catch(Exception $e){
        #If Failed to connect send the message with code
        echo json_encode(array("message"=>"Failed to connect","status"=>"false"));     
        die();
    }