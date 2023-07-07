<?php
//require_once dirname(__DIR__, 2) . '/Config/Connection.php';


class UseModel extends DataBaseMethod {

    function UserList($IDempleado){

        $query = "SELECT * FROM usuarios WHERE IDempleado = $IDempleado";

        return $this->BDList($query);
    }
    function UserCreate($Usuario , $Clave , $IDempleado){

        $query = "	INSERT INTO usuarios
        (id, Usuario, Clave, IDempleado)
        VALUES (NULL, '$Usuario', '$Clave', $IDempleado)";

        return $this->BDCreate($query);
    }
    function UserEdit($id, $Usuario, $Clave){

        $query = "UPDATE usuarios
        SET
            Usuario='$Usuario',
            Clave='$Clave'
        WHERE id=$id";

        return $this->BDUpdate($query);
    }
    function UserDelete($id){
        $query = "DELETE FROM usuarios WHERE id = $id";
        return $this->BDDelete($query);
    }
}

