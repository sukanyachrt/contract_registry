<?php
include('../Connect_Data.php');
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
    echo '<tr>
    <td class="text-center">' . $rsconnect['Customer_ID'] . '</td>
    <td class="text-center">' . $rsconnect['Customer_Name'] . '</td>
    <td class="text-center">' . $rsconnect['Address'] . '</td>
    <td class="text-center">' . $rsconnect['Telephone_Number'] . '</td>
    <td class="text-center">' . $rsconnect['Salesperson_Name'] . '</td>
    <td class="text-center">' . $Customer_Status . '</td>
    <td class="text-center">
        <a  href="data.php?id='.$rsconnect['Customer_ID'].'"><button class="border-warning text-warning"><i class="bx bx-edit-alt me-1"></i></button></a>
        <button class="border-danger text-danger"  onclick="updateCustomerStatus('.$rsconnect['Customer_ID'].')"><i class="bx bx-trash me-1"></i></button>
    </td>
    </tr>';
}
