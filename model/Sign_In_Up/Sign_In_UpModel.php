<?php
require dirname(__DIR__, 2) . '/Config/Connection.php';

class Sign_In_UpModel extends DataBaseMethod
{
    function SignIn($User, $Password)
    {
        $query = "SELECT u.IDempleado
        FROM usuarios u
        INNER JOIN empleados e ON
        u.IDempleado = e.id WHERE u.Usuario ='$User' 
        AND Clave = '$Password' AND e.estado = 1";
        $DataUser = $this->BDList($query);
        $IDemployee = "";
        foreach ($DataUser as $Data) {
            $IDemployee = $Data->IDempleado;
        }
        return $IDemployee;
    }

    // function SignUp()
    // {
    // }
}
?>