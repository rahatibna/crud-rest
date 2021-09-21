<?php
  
    header( 'Content-Type: application/json' );
    header( 'Access-Control-Allow-Origin: *' );
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,  Access-Control-Allow-Methods, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data['sid'];
    $FullName = $data['eFullName'];
    $MobileNumber = $data['eMobileNumber'];
    $EmailId = $data['eEmail'];
    
    // {"FullName":"Khadiza Khatun","MobileNumber":"01598765345","EmailId":"k@g.c","Gender":"Female","Age":"51","BloodGroup":"B+","password":"k","Address":"","Message":" hlw","PostingDate":"2018-04-13 11:09:18","status":"1"}

    include "config.php";

    $sql = "UPDATE tblblooddonars SET FullName = '{$FullName}' , MobileNumber ='{$MobileNumber}' , EmailId = '{$EmailId}'  WHERE id = {$id} " ;

    if (mysqli_query($conn,$sql)) {
        echo json_encode(array('message' => 'Record Updated' , 'status' => true));
    } else {
        echo json_encode(array('message' => 'Record Not Updated' , 'status' => false));
    }
    
?>