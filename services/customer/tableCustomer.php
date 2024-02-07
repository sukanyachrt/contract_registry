<?php
include('../Connect_Data.php');
session_start();
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();
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
INNER JOIN salesperson AS t_sale ON t_cus.Salesperson_Code = t_sale.Salesperson_Code";
$connect->queryData();
while ($rsconnect = $connect->fetch_AssocData()) {
    if ($rsconnect['Customer_Status'] == 1) {
        $Customer_Status = '<span class="badge bg-label-success">ใช้งาน</span>';
    } else {
        $Customer_Status = '<span class="badge bg-label-danger">ไม่ใช้งาน</span>';
    }

    if($rsconnect['Customer_ID']<=9){
        $Customer_ID="00".$rsconnect['Customer_ID'];
    }
    else if($rsconnect['Customer_ID']>=10 && $rsconnect['Customer_ID']<=99){
        $Customer_ID="0".$rsconnect['Customer_ID'];
    }
    else{
        $Customer_ID=$rsconnect['Customer_ID'];
    }


    echo '<tr>
    <td class="text-center">' . $Customer_ID . '</td>
    <td class="text-center">' . $rsconnect['Customer_Name'] . '</td>
    <td class="text-center">' . $rsconnect['Address'] . '</td>
    <td class="text-center">' . $rsconnect['Telephone_Number'] . '</td>
    <td class="text-center">' . $Customer_Status . '</td>
    <td class="text-center">';
    if ($_SESSION['Salesperson_position'] == "admin_sale") {
        echo '<a  href="show.php?id=' . $rsconnect['Customer_ID'] . '"><button class="border-secondary text-secondary"><i class="bx bx-zoom-in me-1"></i></button></a>
        <a  href="data.php?id=' . $rsconnect['Customer_ID'] . '"><button class="border-warning text-warning"><i class="bx bx-edit-alt me-1"></i></button></a>
        <button class="border-danger text-danger"  onclick="updateCustomerStatus(' . $rsconnect['Customer_ID'] . ')"><i class="bx bx-trash me-1"></i></button>';
    } else {
        echo ' <a  href="show.php?id=' . $rsconnect['Customer_ID'] . '"><button class="border-secondary text-secondary"><i class="bx bx-zoom-in me-1"></i></button></a>';
    }

    echo '</td>
    </tr>';
}
