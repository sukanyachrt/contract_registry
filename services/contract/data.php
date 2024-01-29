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
        $connect->sql = "SELECT Project_code as maxid from project WHERE Project_code='" . $post['Project_code'] . "'";
        $connect->queryData();

        if ($connect->num_rows() > 0) {
            $rsconnect = $connect->fetch_AssocData();
            if ($rsconnect['maxid'] > 0) {
                $id = $rsconnect['maxid'] + 1;
            } else {
                $id = $post['Project_code'];
            }
        } else {
            $id = $post['Project_code'];
        }
       


            $connect->sql = "INSERT INTO `project` (`Project_code`, `Name_Project`, `Date`, `Address`, `Salesperson_Code`,Status_Project)  VALUES 
           ('" . $id . "',
           '" . $post['Name_Project'] . "',
           '" . $post['Date'] . "',
           '" . $post['Address'] . "',
           '" . $_SESSION['Salesperson_Code'] . "',
           '1'
           )";
            $connect->queryData();
            $result = ["id" => $id, "status" => "ok"];
    } else {
            //update
            $connect->sql = "UPDATE `project` SET
             `Name_Project`= '" . $post['Name_Project'] . "',
             `Date`= '" . $post['Date'] . "',
             `Address`= '" . $post['Address'] . "',
             `Salesperson_Code`='" . $_SESSION['Salesperson_Code'] . "'
            WHERE Project_code='" . $id . "'";
            $connect->queryData();
            $result = ["id" => $id, "status" => "ok"];
    }
    echo json_encode($result);
} else if ($data == "data_Contract_register") {
    $post = $_POST;
    $Project_code = $_GET['id'];
    $connect->sql = "SELECT * from contract_register WHERE Project_ID='" . $Project_code . "'";
    $connect->queryData();
    $row = $connect->num_rows();
    if ($row > 0) {
        //update
        if ($_FILES["Order_details"]["error"] > 0) {
            $filename = "";
        } else {
            $filename = $_FILES['Order_details']['name'];
            $location = "../uploadfile/" . $filename;
            $uploadOk = 1;

            if ($uploadOk == 0) {
            } else {
                /* Upload file */
                if (move_uploaded_file($_FILES['Order_details']['tmp_name'], $location)) {
                } else {
                }
            }
        }

        if ($filename == "") {
            if ($post['hiddenOrder_details'] == "") {
                $filename = "";
            } else {
                $filename = $post['hiddenOrder_details'];
            }
        }


        $connect->sql = "UPDATE `contract_register` SET 
        `registration_code`='" . $post['registration_code'] . "',
        `Customer_ID`='" . $post['Customer_ID'] . "',
        `contract_es`='" . $post['contract_es'] . "',
        `contract_el`='" . $post['contract_el'] . "',
        `contract_model`='" . $post['contract_model'] . "',
        `Salesperson_Code`='" . $post['Salesperson_Code'] . "',
        `Salesperson_Name`='" . $post['Salesperson_Name'] . "',
        `Salesperson_Tel`='" . $post['Salesperson_Tel'] . "',
        Order_details ='" . $filename . "'
        WHERE `Project_ID`='" . $Project_code . "'";
        $connect->queryData();
        $result = ["id" => $post['registration_code'], "status" => "ok"];
    } else {
        //insert
        $connect->sql = "SELECT registration_code as maxid from contract_register WHERE registration_code='" . $post['registration_code'] . "'";
        $connect->queryData();
        if ($connect->num_rows() > 0) {
            $rsconnect = $connect->fetch_AssocData();
            if (round($rsconnect['maxid']) > 0) {
                $id = $rsconnect['maxid'] + 1;
            } else {
                $id = $post['registration_code'];
            }
        } else {
            $id = $post['registration_code'];
        }

       
       



        if ($_FILES["Order_details"]["error"] > 0) {
            $filename = "";
        } else {
            $filename = $_FILES['Order_details']['name'];
            $location = "../uploadfile/" . $filename;
            $uploadOk = 1;

            if ($uploadOk == 0) {
            } else {
                /* Upload file */
                if (move_uploaded_file($_FILES['Order_details']['tmp_name'], $location)) {
                } else {
                }
            }
        }


        $connect->sql = "INSERT INTO `contract_register`
        
         VALUES 
        ('" . $id . "',
        '" . $Project_code . "',
        '" . $post['Customer_ID'] . "',
        '" . $post['contract_es'] . "',
        '" . $post['contract_el'] . "',
        '" . $post['contract_model'] . "',
        '" . $filename . "',
        '" . $post['Salesperson_Code'] . "',
        '" . $post['Salesperson_Name'] . "',
        '" . $post['Salesperson_Tel'] . "'
        )";
        $connect->queryData();
        $result = ["id" => $id, "status" => "ok"];
    }

    echo json_encode($result);
} else if ($data == "data_Installation") {
    $post = $_POST;
    $Contract_delivery_datesend = explode('/', $post['Contract_delivery_datesend']);
    $post['Contract_delivery_datesend'] = ($Contract_delivery_datesend[2] - 543) . '-' . $Contract_delivery_datesend[1] . '-' . $Contract_delivery_datesend[0];

    $Contract_delivery_dateoffer = explode('/', $post['Contract_delivery_dateoffer']);
    $post['Contract_delivery_dateoffer'] = ($Contract_delivery_dateoffer[2] - 543) . '-' . $Contract_delivery_dateoffer[1] . '-' . $Contract_delivery_dateoffer[0];


    $Project_code = $_GET['id'];
    $connect->sql = "SELECT * from installation_work WHERE Project_ID='" . $Project_code . "'";
    $connect->queryData();
    $row = $connect->num_rows();
    if ($row > 0) {
        //update
        if ($_FILES["uploadfile_install"]["error"] > 0) {
            $filename = "";
        } else {
            $filename = $_FILES['uploadfile_install']['name'];
            $location = "../uploadfile/" . $filename;
            $uploadOk = 1;

            if ($uploadOk == 0) {
            } else {
                /* Upload file */
                if (move_uploaded_file($_FILES['uploadfile_install']['tmp_name'], $location)) {
                } else {
                }
            }
        }

        if ($filename == "") {
            if ($post['hiddenuploadfile_install'] == "") {
                $filename = "";
            } else {
                $filename = $post['hiddenuploadfile_install'];
            }
        }


        $connect->sql = "UPDATE `installation_work` SET 
        `Installation_code`= '" . $post['Installation_code'] . "',
        `Contract_delivery_datesend`= '" . $post['Contract_delivery_datesend'] . "',
        `Contract_delivery_dateoffer`= '" . $post['Contract_delivery_dateoffer'] . "',
        `Project_work_page`= '" . $post['Project_work_page'] . "',
        `uploadfile_install`= '" . $filename . "',
        `Credit_department`= '" . $post['Credit_department'] . "',
        `Installation_department`= '" . $post['Installation_department'] . "',
        `Installation_status`= '" . $post['Installation_status'] . "'
        WHERE `Project_ID`='" . $Project_code . "'";
        $connect->queryData();
        $result = ["id" => $Project_code, "status" => "ok"];
    } else {
        //insert
        if ($_FILES["uploadfile_install"]["error"] > 0) {
            $filename = "";
        } else {
            $filename = $_FILES['uploadfile_install']['name'];
            $location = "../uploadfile/" . $filename;
            $uploadOk = 1;

            if ($uploadOk == 0) {
            } else {
                /* Upload file */
                if (move_uploaded_file($_FILES['uploadfile_install']['tmp_name'], $location)) {
                } else {
                }
            }
        }

        $connect->sql = "SELECT MAX(Installation_code) as maxid from installation_work";
        $connect->queryData();
        $rsconnect = $connect->fetch_AssocData();
        $id = $rsconnect['maxid'] + 1;
        $connect->sql = "INSERT INTO `installation_work` 
         VALUES
         ('" . $id . "',
        '" . $Project_code . "',
         '" . $post['Contract_delivery_datesend'] . "',
         '" . $post['Contract_delivery_dateoffer'] . "',
         '" . $post['Project_work_page'] . "',
         '" . $post['Credit_department'] . "',
         '" . $post['Installation_department'] . "',
         '" . $post['Installation_status'] . "',
         '" . $filename . "'
         )";
        $connect->queryData();
        $result = ["id" => $connect->id_insertrows(), "status" => "ok"];
    }
    echo json_encode($result);
} else if ($data == "data_Payment") {
    $post = json_decode($_POST['tbPaymentinformation'], true);
    $Project_code = $_GET['id'];

    $connect->sql = "DELETE FROM `payment_information` WHERE  `Project_ID`='" . $Project_code . "'";
    $connect->queryData();


    foreach ($post as $item) {
        $expdate_payment = explode('/', $item['date_payment']);
        $date_payment = ($expdate_payment[2] - 543) . '-' . $expdate_payment[1] . '-' . $expdate_payment[0];
        $connect->sql = "SELECT MAX(Payment_code) as maxid from payment_information";
        $connect->queryData();
        $rsconnect = $connect->fetch_AssocData();
        $id = $rsconnect['maxid'] + 1;

        $connect->sql = "INSERT INTO `payment_information` VALUES 
		 ('" . $id . "',
        '" . $Project_code . "',
         '" . $item['type_payment'] . "',
         '" . $item['period_payment'] . "',
         '" . $date_payment . "',
         '" . $item['money_payment'] . "'
         )";
        $connect->queryData();
        $result = ["id" => $connect->id_insertrows(), "status" => "ok"];
    }
    echo json_encode($result);
} else if ($data == "projectStatus") {
    $connect->sql = "UPDATE project SET Status_Project = '0' 
    WHERE Project_code='" . $_GET['id'] . "'";
    $connect->queryData();
    echo json_encode(["result" => $connect->affected_rows()]);
} else if ($data == "installStatus") {

    $connect->sql = "UPDATE installation_work SET Installation_status = '" . $_GET['status'] . "' 
    WHERE Project_ID ='" . $_GET['id'] . "'";
    $connect->queryData();
    echo json_encode(["result" => $connect->affected_rows()]);
}
