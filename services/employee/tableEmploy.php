<?php
include('../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();
$connect->sql = "SELECT
t_login.Login_Code,
t_login.Password_ID,
t_employ.Salesperson_Code,
t_employ.Salesperson_Name,
t_employ.`Telephone_Number`,
t_employ.Salesperson_position,
t_employ.Salesperson_status 
FROM
login AS t_login
INNER JOIN salesperson AS t_employ ON t_login.Salesperson_Code = t_employ.Salesperson_Code";
$connect->queryData();
while ($rsconnect = $connect->fetch_AssocData()) {
    if ($rsconnect['Salesperson_status'] == 1) {
        $Salesperson_status = '<span class="badge bg-label-success">ใช้งาน</span>';
    } else {
        $Salesperson_status = '<span class="badge bg-label-danger">ไม่ใช้งาน</span>';
    }
    echo '<tr>
    <td class="text-center">' . $rsconnect['Salesperson_Code'] . '</td>
    <td class="text-center">' . $rsconnect['Salesperson_Name'] . '</td>
    <td class="text-center">' . $rsconnect['Telephone_Number'] . '</td>
    <td class="text-center">' . $rsconnect['Salesperson_position'] . '</td>
    <td class="text-center">' . $Salesperson_status . '</td>
    <td class="text-center">
        <a  href="data.php?id='.$rsconnect['Salesperson_Code'].'"><button class="border-warning text-warning"><i class="bx bx-edit-alt me-1"></i></button></a>
        <button class="border-danger text-danger"  onclick="updateEmployStatus('.$rsconnect['Salesperson_Code'].')"><i class="bx bx-trash me-1"></i></button>
    </td>
    </tr>';
}
