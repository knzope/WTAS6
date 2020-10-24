<?php
header("Content-Type: application/json; charset=UTF-8");
require 'database.php';
require 'crud.php';

$req=$_GET['req'] ?? null;
$db=new database();
$customer= new crud($db->connect());

switch($req)
{
    case 'add':
        $obj=$_GET['object'];
        $temp=json_decode($obj);
        echo $customer->addcustomerdetail($temp);
        break;

    case 'check_uname':
        $uname=$_GET['uname'];
        echo $customer->check_customer_uname($uname);
        break;
                    
    case 'check_email':
        $email=$_GET['email'];
        echo $customer->check_customer_email($email);
        break;
    
    case 'check_phone':
        $phone=$_GET['phone'];
        echo $customer->check_customer_phone($phone);
        break;
    case 'get_uname':
            $uname=$_GET['uname'];
            echo $customer->get_user_detail($uname);
            break;
    case 'get_all_uname':
                
                echo $customer->get_all_user_detail();
                break;
    case 'search_uname':
                $uname=$_GET['uname'];
                echo $customer->search_user_detail($uname);
                break;

    case 'update':
        $obj=$_GET['object'];
        $temp=json_decode($obj);
        $uname=$_GET['uname'];
        echo $customer->update_user_detail($temp,$uname);
        break;

    case 'delete':
            $uname=$_GET['uname'];
            echo $customer->delete_user_detail($uname);
            break;

    default:
        echo json_encode(["In-valid request"]);
        break;
}

?>