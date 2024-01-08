<?php
header('Content-Type: application/json');
session_start(); // เริ่ม Session

if (isset($_POST['status']) && $_POST['status'] === 'ok') {
    $data = $_POST['data'];
    $_SESSION['Salesperson_Code'] = $data['Salesperson_Code'];
    $_SESSION['Salesperson_Name'] =$data['Salesperson_Name'];
    $_SESSION['Salesperson_position'] =$data['Salesperson_position'];
    echo json_encode(["data"=>"ok","page"=>"views/employee/index.php"]);
    
} else {
    echo json_encode(["data"=>"no"]);
}
