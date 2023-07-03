<?php
require dirname(__DIR__, 2) . '/model/User/UserModel.php';

class UserController
{

    function UserList($IDempleado)
    {
        $UseModel = new UseModel();
        return $UseModel->UserList($IDempleado);
    }
    function UserCreate($Usuario, $Clave, $IDempleado)
    {

        $UseModel = new UseModel();
        return $UseModel->UserCreate($Usuario, $Clave, $IDempleado);
    }
    function UserEdit($IdUser, $Usuario, $Clave)
    {
        $UseModel = new UseModel();
        return $UseModel->UserEdit($IdUser, $Usuario, $Clave);
    }
    function UserDelete($IdUser)
    {
        $UseModel = new UseModel();
        return $UseModel->UserDelete($IdUser);
    }
}

if (isset($_POST['method']) && !empty($_POST['method'])) {
    $UserController = new UserController;
    $method = $_POST['method'];
    switch ($method) {
        case 'UserCreate':

            list('Usuario' => $Usuario,
            'Clave' =>  $Clave,
            'IDempleado' =>  $IDempleado) = $_POST['data'];
            echo $UserController->UserCreate($Usuario, $Clave, $IDempleado);
            break;

        case 'UserEdit':

            list('IdUser'=>$IdUser,
            'Usuario'=> $Usuario,
            'Clave'=> $Clave) = $_POST['data'];
            echo $UserController->UserEdit($IdUser, $Usuario, $Clave);
            break;

        case 'UserDelete':

            list('IdUser' => $IdUser) = $_POST['data'];
            echo $UserController->UserDelete($IdUser);
            break;

        default:
            echo "Error -> Method No found";
            break;
    }
}
