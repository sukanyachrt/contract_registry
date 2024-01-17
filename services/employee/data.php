<?php
header('Content-Type: application/json');
include('../Connect_Data.php');
//error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();

if ($data == "updateEmployStatus") {
    $connect->sql = "UPDATE salesperson SET Salesperson_status = '0' 
     WHERE Salesperson_Code='" . $_GET['id'] . "'";
    $connect->queryData();
    echo json_encode(["result" => $connect->affected_rows()]);
} else if ($data == "updateEmployAll") {
    #update table login
    $post = $_POST;
    $connect->sql = "UPDATE `login` SET `Login_Code`='" . $post['Login_Code'] . "',
    `Password_ID`='" . $post['Password_ID'] . "' 
    WHERE Salesperson_Code='" . $_GET['id'] . "'";
    $connect->queryData();

    #update table salesperson
    $connect->sql = "UPDATE `salesperson` SET 
    `Salesperson_Name`='" . $post['Salesperson_Name'] . "',
    `Telephone_Number`='" . $post['Telephone_Number'] . "',
    `Salesperson_position`='" . $post['Salesperson_position'] . "'
    WHERE Salesperson_Code='" . $_GET['id'] . "'";
    $connect->queryData();

    echo json_encode(["result" => $connect->affected_rows()]);
} else if ($data == "insertemploy") {
    $post = $_POST;
    $connect->sql = "SELECT	MAX( Salesperson_Code )+ 1 AS maxid FROM	salesperson";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $maxid=$rsconnect['maxid'];
    $connect->sql = "INSERT INTO `salesperson` (`Salesperson_Code`, `Salesperson_Name`, `Telephone_Number`, `Salesperson_position`, `Salesperson_status`) VALUES ('" . $maxid. "',
    '" . $post['Salesperson_Name'] . "',
    '" . $post['Telephone_Number'] . "',
    '" . $post['Salesperson_position'] . "',
    '1')";
    $connect->queryData();

    $connect->sql = "INSERT INTO `login`(`Login_Code`, `Password_ID`, `Salesperson_Code`) VALUES
     ( '" . $post['Login_Code'] . "',
      '" . $post['Password_ID'] . "',
      '" . $maxid . "'
    )";
    $connect->queryData();


    echo json_encode(["result" => $connect->affected_rows()]);
} else if ($data == "dataEmployByID") {
    $connect->sql = "SELECT
	t_sale.Salesperson_Code,
	t_sale.Salesperson_Name,
	t_sale.Telephone_Number,
	t_sale.Salesperson_position,
    t_sale.Salesperson_status,
	t_login.Login_Code,
	t_login.Password_ID 
FROM
	salesperson as t_sale
	INNER JOIN login as t_login ON t_sale.Salesperson_Code = t_login.Salesperson_Code
    WHERE t_sale.Salesperson_Code='" . $_GET['id'] . "'";
    $connect->queryData();
    $row = $connect->num_rows();
    if ($row > 0) {
        $rsconnect = $connect->fetch_AssocData();

        array_push($result, ["status" => "ok", "data" => $rsconnect]);
    } else {
        array_push($result, ["status" => "no"]);
    }

    echo json_encode($result[0]);
} else if ($data == "maxIdEmploy") {
    $connect->sql = "SELECT	MAX( Salesperson_Code )+ 1 AS maxid FROM	salesperson";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();

    $result = ["maxid" => $rsconnect['maxid']];
    echo json_encode($result);
}
