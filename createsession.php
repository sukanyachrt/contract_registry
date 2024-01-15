<?php
header('Content-Type: application/json');
session_start(); // เริ่ม Session

if (isset($_POST['status']) && $_POST['status'] === 'ok') {
    
    $data = $_POST['data'];
    $_SESSION['Salesperson_Code'] = $data['Salesperson_Code'];
    $_SESSION['Salesperson_Name'] =$data['Salesperson_Name'];
    $_SESSION['Salesperson_position'] =$data['Salesperson_position'];
    if($_SESSION['Salesperson_position']=="admin_sale"){
        echo json_encode(["data"=>"ok","page"=>"views/contract/index.php"]);
    }
    else if($_SESSION['Salesperson_position']=="ฝ่ายสินเชื่อ"){
        echo json_encode(["data"=>"ok","page"=>"views/contract/listcontract.php"]);
    } 
    else if($_SESSION['Salesperson_position']=="ฝ่ายติดตั้ง"){
        echo json_encode(["data"=>"ok","page"=>"views/contract/install.php"]);
    } 
    else{

    }
    
    
} else {
    echo json_encode(["data"=>"no"]);
}
