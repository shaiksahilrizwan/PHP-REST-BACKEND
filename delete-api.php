<?php
    include("header_info.php");
    include("database_connect.php");
    #This is UPDATE API Endpoint
    header('Access-Control-AllowMethods: DELETE');
    $getData=json_decode(file_get_contents("php://input"),true);
    #extract id
    $id=$getData['id'];
    #Writing DELETE Query
    $sql="DELETE FROM EMPLOYEE WHERE ID={$id}";
    $sqlCheck="SELECT * FROM EMPLOYEE WHERE ID={$id}";
    if(mysqli_num_rows(mysqli_query($conn,$sqlCheck))>0){

        #Run Query
        try{
            if(mysqli_query($conn,$sql)){
                #Delete Success
                echo json_encode(array("message"=>"Delete Record Successfully","status"=>"true"));
        }
        }catch(Exception $e){
        #no records present
            echo json_encode(array("message"=>"Delete Record Failed","status"=>"false"));
    }
}else{
    echo json_encode(array("message"=>"Delete Record Failed","status"=>"false"));
}