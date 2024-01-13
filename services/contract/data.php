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

        $connect->sql = "INSERT INTO `project` (`Project_code`, `Name_Project`, `Date`, `Address`, `Salesperson_Code`)  VALUES 
       ('" . $id . "',
       '" . $post['Name_Project'] . "',
       '" . $post['Date'] . "',
       '" . $post['Address'] . "',
       '" . $_SESSION['Salesperson_Code'] . "'
       )";
        $connect->queryData();
        $result = ["id" => $connect->id_insertrows(), "status" => "ok"];
    } else {
        //update

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
    }
    else{
        //insert
        $connect->sql = "SELECT MAX(registration_code) as maxid from contract_register";
        $connect->queryData();
        $rsconnect = $connect->fetch_AssocData();
        $id = $rsconnect['maxid'] + 1;

        $connect->sql = "INSERT INTO `contract_register`
        (`registration_code`, `Project_ID`, `Customer_ID`, `Installment_payment`, `Sale_Contract`) VALUES 
        ('" . $id . "',
        '" . $Project_code . "',
        '" . $_POST['Customer_ID'] . "',
        '" . $_POST['Installment_payment'] . "',
        '" . $_POST['Sale_Contract'] . "'
        )";
        $connect->queryData();
        $result = ["id" => $connect->id_insertrows(), "status" => "ok"];
    }

    echo json_encode($result);
}
else if($data=="data_Installation"){
    echo json_encode($_POST);
}
