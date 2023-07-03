<?php
require dirname(__DIR__, 2) . '/model/Sign_In_Up/Sign_In_UpModel.php';
require dirname(__DIR__, 2) . '/Config/util.php';
class Sign_In_UpModelController
{
    function SignIn($DataUser)
    {
        list('User' => $User, 'Password' => $Password) = $DataUser;
        $Sign_In_Up = new Sign_In_UpModel();
        return $Sign_In_Up->SignIn(str_replace("'", "\'", $User), str_replace("'", "\'", $Password));
    }
}

if (isset($_POST['method'])) {
    $Sign_In_UpModelController = new Sign_In_UpModelController();
    $method = $_POST['method'];
    $DataUser = $_POST['DataUser'];
    switch ($method) {
        case 'SignIn':
            $IDemployee = $Sign_In_UpModelController->SignIn($DataUser);
            $redirect = "";
            if ($IDemployee != "" && !is_null($IDemployee) && $IDemployee != 0) {
                session_start();
                $_SESSION['IDemployee'] = $IDemployee;
                $redirect= config::PATH . "view/Employee/EmployeesList.php";
                // header("Location:" .$redirect= config::PATH . "view/Employee/EmployeesList.php");
                // exit();
            }else{
                session_destroy();
            }
            echo $redirect;


            break;
        case 'SignUp':
            # code...
            break;
        default:
            echo "Error No existe El metodo";
            break;
    }
}
