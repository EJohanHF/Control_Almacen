<?php
require dirname(__DIR__, 2) . '/model/Employee/EmployeeModel.php';
class EmployeeController
{

    function EmployeeList($id)
    {
        $EmployeeModel = new EmployeeModel();
        
        return $EmployeeModel->EmployeeList($id);
    }

    function EmployeeCreate($Nombres, $Apellidos, $Fecha_Nacimiento, $Direccion, $Email, $Telefono, $Persona_contacto)
    {
        $EmployeeModel = new EmployeeModel();
        return $EmployeeModel->EmployeeCreate($Nombres, $Apellidos, $Fecha_Nacimiento, $Direccion, $Email, $Telefono, $Persona_contacto);
    }
    function EmployeeEdit($ID, $Nombres, $Apellidos, $Fecha_Nacimiento, $Direccion, $Email, $Telefono, $Persona_contacto,$Estado)
    {
        $EmployeeModel = new EmployeeModel();
        return $EmployeeModel->EmployeeEdit($ID, $Nombres, $Apellidos, $Fecha_Nacimiento, $Direccion, $Email, $Telefono, $Persona_contacto,$Estado);
    }
    function EmployeeDelete($ID,$Estado)
    {
        $EmployeeModel = new EmployeeModel();
        return $EmployeeModel->EmployeeDelete($ID,$Estado);
    }
}

$EmployeeController = new EmployeeController();

if (isset($_POST['method']) && !empty($_POST['method'])) {

    $method = $_POST['method'];
    switch ($method) {
        case 'EmployeeCreate':
            list(
                'Nombres' => $Nombres,
                'Apellidos' => $Apellidos,
                'Fecha_Nacimiento' => $Fecha_Nacimiento,
                'Direccion' => $Direccion,
                'Email' => $Email,
                'Telefono' => $Telefono,
                'Persona_contacto' => $Persona_contacto
            ) = $_POST['data'];
            echo ($EmployeeController->EmployeeCreate($Nombres, $Apellidos, $Fecha_Nacimiento, $Direccion, $Email, $Telefono, $Persona_contacto));
            break;

        case 'EmployeeEdit':
            list(
                'IDEmployee' => $IDEmployee,
                'Nombres' => $Nombres,
                'Apellidos' => $Apellidos,
                'Fecha_Nacimiento' => $Fecha_Nacimiento,
                'Direccion' => $Direccion,
                'Email' => $Email,
                'Telefono' => $Telefono,
                'Persona_contacto' => $Persona_contacto,
                'Estado' => $Estado
            ) = $_POST['data'];
            
            echo ($EmployeeController->EmployeeEdit($IDEmployee, $Nombres, $Apellidos, $Fecha_Nacimiento, $Direccion, $Email, $Telefono, $Persona_contacto,$Estado));
            break;
        case 'EmployeeDelete':
            list(
                'ID' => $ID,
                'Estado' => $Estado) = $_POST['data'];
            echo ($EmployeeController->EmployeeDelete($ID,$Estado));
            break;
        default:
            echo 'ERROR Metodo No Encontrado '.$method;
    }
}
