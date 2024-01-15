<?php
include('../Connect_Data.php');
error_reporting(0);
$connect = new Connect_Data();
$connect->connectData();
$connect->sql = "SELECT
t_install.Installation_code,
t_install.Contract_delivery_datesend,
t_install.Contract_delivery_dateoffer,
t_install.Project_work_page,
t_install.Picture,
t_contract.Order_details,
t_install.Credit_department,
t_install.Installation_department,
t_install.Installation_status,
t_project.Project_code,
t_project.Name_Project,
t_project.DATE,
t_project.Address,
t_project.Salesperson_Code,
t_contract.registration_code,
t_contract.Customer_ID,
t_contract.type_payment,
t_contract.money_payment,
t_contract.period_payment,
t_contract.contract_el,
t_contract.contract_es,
t_contract.contract_model,
t_cus.Customer_Name,
t_sale.Salesperson_Name 
FROM
project AS t_project
INNER JOIN contract_register AS t_contract ON t_project.Project_code = t_contract.Project_ID
INNER JOIN installation_work AS t_install ON t_project.Project_code = t_install.Project_ID
INNER JOIN customer AS t_cus ON t_contract.Customer_ID = t_cus.Customer_ID
INNER JOIN salesperson AS t_sale ON t_project.Salesperson_Code = t_sale.Salesperson_Code
WHERE Status_Project=1";
$connect->queryData();
while ($rsconnect = $connect->fetch_AssocData()) {
    echo '<tr>
    <td class="text-center">' . $rsconnect['Project_code'] . '</td>
    <td class="text-center">' . $rsconnect['Name_Project'] . '</td>
    <td class="text-center">' . $rsconnect['registration_code'] . '</td>
   
    <td class="text-center">' . $rsconnect['DATE'] . '</td>
    <td class="text-center">' . $rsconnect['Customer_Name'] . '</td>
    <td class="text-center">' . $rsconnect['Address'] . '</td>
    <td class="text-center">
    <a  href="show.php?id=' . $rsconnect['Project_code'] . '"><button class="border-secondary text-secondary"><i class="bx bx-zoom-in me-1"></i></button></a>
        <a  href="data.php?id=' . $rsconnect['Project_code'] . '"><button class="border-warning text-warning"><i class="bx bx-edit-alt me-1"></i></button></a>
        <button class="border-danger text-danger"  onclick="updateProjectStatus(' . $rsconnect['Project_code'] . ')"><i class="bx bx-trash me-1"></i></button>
    </td>
    </tr>';
}
?>