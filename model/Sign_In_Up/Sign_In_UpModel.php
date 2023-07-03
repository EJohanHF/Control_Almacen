<?php
require dirname(__DIR__, 2) . '/Config/Connection.php';

class Sign_In_UpModel extends DataBaseMethod
{
    function SignIn($User , $Password)
    {
        $query = "SELECT IDempleado
        FROM usuarios WHERE Usuario ='$User' 
        AND Clave = '$Password';";
        $DataUser = $this->BDList($query);
        $IDemployee = "";
        foreach ($DataUser as $Data) {
            $IDemployee = $Data["IDempleado"];
        }
        return $IDemployee;
    }

    function SignUp()
    {

    }
}



