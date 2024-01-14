<?php
header('Content-Type: application/json');
include('../Connect_Data.php');
session_start();
$connect = new Connect_Data();
$connect->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "data_Project") {
    $post = $_POST;
    $Date = explode('/', $post['Date']);
    $post['Date'] = ($Date[2] - 543) . '-' . $Date[1] . '-' . $Date[0];
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id <= 0) {
        //insert
        $connect->sql = "SELECT MAX(Project_code) as maxid from project";
        $connect->queryData();
        $rsconnect = $connect->fetch_AssocData();
        $id = $rsconnect['maxid'] + 1;

        $connect->sql = "INSERT INTO `project` (`Project_code`, `Name_Project`, `Date`, `Address`, `Salesperson_Code`,Status_Project)  VALUES 
       ('" . $id . "',
       '" . $post['Name_Project'] . "',
       '" . $post['Date'] . "',
       '" . $post['Address'] . "',
       '" . $_SESSION['Salesperson_Code'] . "',
       '1'
       )";
        $connect->queryData();
        $result = ["id" => $connect->id_insertrows(), "status" => "ok"];
    } else {
        //update
        $connect->sql = "UPDATE `project` SET
         `Name_Project`= '" . $post['Name_Project'] . "',
         `Date`= '" . $post['Date'] . "',
         `Address`= '" . $post['Address'] . "',
         `Salesperson_Code`='" . $_SESSION['Salesperson_Code'] . "'
        WHERE Project_code='".$id."'";
        $connect->queryData();
        $result = ["id" => $id, "status" => "ok"];


    }
    echo json_encode($result);
} else if ($data == "data_Contract_register") {
    $post = $_POST;
    $Project_code = $_GET['id'];
    $connect->sql = "SELECT * from contract_register WHERE Project_ID='".$Project_code."'";
    $connect->queryData();
    $row = $connect->num_rows();
    if($row>0){
        //update
        $connect->sql = "UPDATE `contract_register` SET 
        `registration_code`='" . $post['registration_code'] . "',
        `Customer_ID`='" . $post['Customer_ID'] . "',
        `type_payment`='" . $post['type_payment'] . "',
        `period_payment`='" . $post['period_payment'] . "',
        `money_payment`='" . $post['money_payment'] . "',
        `contract_es`='" . $post['contract_es'] . "',
        `contract_el`='" . $post['contract_el'] . "',
        `contract_model`='" . $post['contract_model'] . "',
        Order_details ='" . $post['Order_details'] . "'
        WHERE `Project_ID`='".$Project_code."'";
        $connect->queryData();
        $result = ["id" => $post['registration_code'], "status" => "ok"];
    }
    else{
        //insert
        $connect->sql = "SELECT MAX(registration_code) as maxid from contract_register";
        $connect->queryData();
        $rsconnect = $connect->fetch_AssocData();
        $id = $rsconnect['maxid'] + 1;

        $connect->sql = "INSERT INTO `contract_register`
         VALUES 
        ('" . $id . "',
        '" . $Project_code . "',
        '" . $post['Customer_ID'] . "',
        '" . $post['type_payment'] . "',
        '" . $post['period_payment'] . "',
        '" . $post['money_payment'] . "',
        '" . $post['contract_es'] . "',
        '" . $post['contract_el'] . "',
        '" . $post['contract_model'] . "',
        '" . $post['Order_details'] . "'
        )";
        $connect->queryData();
        $result = ["id" => $connect->id_insertrows(), "status" => "ok"];
    }

    echo json_encode($result);
}
else if($data=="data_Installation"){
    $post = $_POST;
    $Contract_delivery_datesend = explode('/', $post['Contract_delivery_datesend']);
    $post['Contract_delivery_datesend'] = ($Contract_delivery_datesend[2] - 543) . '-' . $Contract_delivery_datesend[1] . '-' . $Contract_delivery_datesend[0];

    $Contract_delivery_dateoffer = explode('/', $post['Contract_delivery_dateoffer']);
    $post['Contract_delivery_dateoffer'] = ($Contract_delivery_dateoffer[2] - 543) . '-' . $Contract_delivery_dateoffer[1] . '-' . $Contract_delivery_dateoffer[0];
    

    $Project_code = $_GET['id'];
    $connect->sql = "SELECT * from installation_work WHERE Project_ID='".$Project_code."'";
    $connect->queryData();
    $row = $connect->num_rows();
    if($row>0){
        //update
        if ($_FILES["Picture"]["error"] > 0) {
            $filename ="";
        }
        else{
            $filename = $_FILES['Picture']['name']; 
            $location = "../uploadfile/".$filename; 
            $uploadOk = 1; 
              
            if($uploadOk == 0){ 
                
            }else{ 
               /* Upload file */
               if(move_uploaded_file($_FILES['Picture']['tmp_name'], $location)){ 
                  
               }else{ 
                  
               } 
            } 
        }

         if($filename==""){
            if($post['hiddenPic']==""){
                $filename="";
            }
            else{
                $filename=$post['hiddenPic'];
            }
           
        }
        

        $connect->sql = "UPDATE `installation_work` SET 
        `Installation_code`= '" . $post['Installation_code'] . "',
        `Contract_delivery_datesend`= '" . $post['Contract_delivery_datesend'] . "',
        `Contract_delivery_dateoffer`= '" . $post['Contract_delivery_dateoffer'] . "',
        `Project_work_page`= '" . $post['Project_work_page'] . "',
        `Picture`= '" . $filename . "',
        `Credit_department`= '" . $post['Credit_department'] . "',
        `Installation_department`= '" . $post['Installation_department'] . "',
        `Installation_status`= '" . $post['Installation_status'] . "'
        WHERE `Project_ID`='".$Project_code."'";
        $connect->queryData();
        $result = ["id" => $Project_code, "status" => "ok"];

    }
    else{
        //insert
        if ($_FILES["Picture"]["error"] > 0) {
            $filename ="";
        }
        else{
            $filename = $_FILES['Picture']['name']; 
            $location = "../uploadfile/".$filename; 
            $uploadOk = 1; 
              
            if($uploadOk == 0){ 
                
            }else{ 
               /* Upload file */
               if(move_uploaded_file($_FILES['Picture']['tmp_name'], $location)){ 
                  
               }else{ 
                  
               } 
            } 
        }

        $connect->sql = "SELECT MAX(Installation_code) as maxid from installation_work";
        $connect->queryData();
        $rsconnect = $connect->fetch_AssocData();
        $id = $rsconnect['maxid'] + 1;
        $connect->sql = "INSERT INTO `installation_work` 
         VALUES
         ('".$id."',
        '".$Project_code."',
         '".$post['Contract_delivery_datesend']."',
         '".$post['Contract_delivery_dateoffer']."',
         '".$post['Project_work_page']."',
         '".$filename."',
         '".$post['Credit_department']."',
         '".$post['Installation_department']."',
         '".$post['Installation_status']."'
         )";
        $connect->queryData();
        $result = ["id" => $connect->id_insertrows(), "status" => "ok"];

    }
    echo json_encode($result);
}
else if($data=="projectStatus"){
    $connect->sql = "UPDATE project SET Status_Project = '0' 
    WHERE Project_code='" . $_GET['id'] . "'";
   $connect->queryData();
   echo json_encode(["result" => $connect->affected_rows()]);
}
