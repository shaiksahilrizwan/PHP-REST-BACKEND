<?php 
    include('header_info.php');
    header('Access-Control-AllowMethods: GET');
    include('database_connect.php');
    #getting the json data
    try{
    $getData=json_decode(file_get_contents("php://input"),true);
    }
    catch(Exception $e){
        echo json_encode(array("message"=>"No JSON Data passed to fetch against","status"=>"false"));
        die();
    }
    #extract id
    $id=$getData['id'];
    #Writing Fetch Query
    $sql="SELECT * FROM EMPLOYEE where ID={$id}";
    #Run Query
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        #convert data to ASSOC Array
        $data=mysqli_fetch_all($res,MYSQLI_ASSOC);
        echo json_encode($data);
    }else{
        #no records present
        echo json_encode(array("message"=>"No Records Found","status"=>"false"));
    }