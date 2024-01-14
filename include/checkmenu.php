<?php
    if($_SESSION['Salesperson_position']=="admin_sale"){
        include("menu_admin.php");
    }
    else if($_SESSION['Salesperson_position']=="ฝ่ายสินเชื่อ"){
        include("menu_credit.php");
    } 
    else if($_SESSION['Salesperson_position']=="ฝ่ายติดตั้ง"){
        include("menu_install.php");
    } 
    else{

    }
?>