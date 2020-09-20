<?php
namespace authorize;
include '../config/dbQuery.php';
use DB\dbQuery;

class authorizeAdmin{
    public function authorize(){
        try {
            if($_POST['sub']){
                $user = new dbQuery();

                $login = $_POST['Login'];
                $password = $_POST['Password'];

                $admin=$user->admin();

                if($admin['login'] == $login && $admin['password'] == $password){
                    session_start();
                    $_SESSION['is_admin'] = true;
                    header("Location: http://localhost/index.php");
                }
            }
        }catch (\PDOException $ex){
            $ex->getMessage();
        }
    }
}
$authAdmin = new authorizeAdmin();
$authAdmin->authorize();