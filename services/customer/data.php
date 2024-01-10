<?php
header('Content-Type: application/json');
include('../Connect_Data.php');
session_start();
$connect = new Connect_Data();
$connect->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "customerStatus") {
    $connect->sql = "UPDATE customer SET Customer_Status = '0' 
     WHERE Customer_ID='" . $_GET['id'] . "'";
    $connect->queryData();
    echo json_encode(["result" => $connect->affected_rows()]);
} else if ($data == "updateCustomerAll") {
    #update table login
    $post = $_POST;
   
    #update table salesperson
    $connect->sql = "UPDATE `customer` SET 
    `Customer_Name`='" . $post['Customer_Name'] . "',
    `Address`='" . $post['Address'] . "',
    `Telephone_Number`='" . $post['Telephone_Number'] . "',
    `Customer_Status`='" . $post['Customer_Status'] . "',
    Salesperson_Code ='" . $_SESSION['Salesperson_Code'] . "'
    WHERE Customer_ID='" . $_GET['id'] . "'";
    $connect->queryData();

    echo json_encode(["result" => $connect->affected_rows()]);
} else if ($data == "insertcustomer") {
    $post = $_POST;
   
    $connect->sql = "INSERT INTO `customer` (`Customer_Name`, `Address`, `Telephone_Number`, `Customer_Status`, `Salesperson_Code`) VALUES 
    ('" . $post['Customer_Name'] . "',
    '" . $post['Address'] . "',
    '" . $post['Telephone_Number'] . "',
    '" . $post['Customer_Status'] . "',
    '" . $_SESSION['Salesperson_Code'] . "'
    )";
    $connect->queryData();

    


    echo json_encode(["result" => $connect->affected_rows()]);
} else if ($data == "dataCustomerByID") {
    $connect->sql = "SELECT
    t_cus.Customer_ID,
    t_cus.Customer_Name,
    t_cus.Address,
    t_cus.`Telephone_Number`,
    t_cus.Customer_Status,
    t_cus.Salesperson_Code,
    t_sale.Salesperson_Name 
    FROM
    customer AS t_cus
    INNER JOIN salesperson AS t_sale ON t_cus.Salesperson_Code = t_sale.Salesperson_Code
    WHERE t_cus.Customer_ID='" . $_GET['id'] . "'";
    $connect->queryData();
    $row = $connect->num_rows();
    if ($row > 0) {
        $rsconnect = $connect->fetch_AssocData();

        array_push($result, ["status" => "ok", "data" => $rsconnect]);
    } else {
        array_push($result, ["status" => "no"]);
    }

    echo json_encode($result[0]);
} else if ($data == "maxIdCustomer") {
    $connect->sql = "SELECT	MAX( Customer_ID )+ 1 AS maxid FROM	customer";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();

    $result = ["maxid" => $rsconnect['maxid']];
    echo json_encode($result);
}
