<?php
require dirname(__DIR__, 2) . '/Config/Connection.php';


// $Conect = Connection();


class EmployeeModel extends DataBaseMethod
{

    function EmployeeList($id)
    {

        $query = "SELECT * FROM empleados";


        

        if (!is_null($id)) {
            $query = $query . " WHERE id = $id";
        }
         

        return  $this->BDlist($query);

    }

    function EmployeeCreate($Nombres, $Apellidos, $Fecha_Nacimiento, $Direccion, $Email, $Telefono, $Persona_contacto)
    {

        $query = "INSERT INTO empleados(
            id,
            Nombres,
            Apellidos,
            Fecha_Nacimiento,
            Direccion,
            Email, 
            Telefono, 
            Persona_contacto)
            VALUES (NULL, 
            '$Nombres', 
            '$Apellidos', 
            '$Fecha_Nacimiento', 
            '$Direccion', 
            '$Email', 
            '$Telefono', 
            '$Persona_contacto')";

        return $this->BDCreate($query);

    }


    function EmployeeEdit($ID, $Nombres, $Apellidos, $Fecha_Nacimiento, $Direccion, $Email, $Telefono, $Persona_contacto)
    {

        $query =  "UPDATE empleados
        SET
            
            Nombres='$Nombres',
            Apellidos='$Apellidos',
            Fecha_Nacimiento='2023-06-26',
            Direccion='$Direccion',
            Email='$Email',
            Telefono='$Telefono',
            Persona_contacto='$Persona_contacto'
        WHERE id=$ID ";

        return $this->BDUpdate($query);

    }

    function EmployeeDelete($id)
    {
        $query = "DELETE FROM empleados WHERE id = $id";

        return $this->BDDelete($query);
        
    }
}
     // try {
        //      $query = "INSERT INTO empleados(
        //      id,
        //      Nombres,
        //      Apellidos,
        //      Fecha_Nacimiento,
        //      Direccion,
        //      Email, 
        //      Telefono, 
        //      Persona_contacto)
        //      VALUES (NULL, 
        //      '$Nombres', 
        //      '$Apellidos', 
        //      '$Fecha_Nacimiento', 
        //      '$Direccion', 
        //      '$Email', 
        //      '$Telefono', 
        //      '$Persona_contacto')";
        //      $statement = $GLOBALS['Conect']->prepare($query);
        //      $statement->execute();
        //     return configDatabase::success;
        // } catch (PDOException  $e) {

        //     return configDatabase::error . $e->getMessage();
        // }
        // try {

        //     $query =  "UPDATE empleados
        //     SET
                
        //         Nombres='$Nombres',
        //         Apellidos='$Apellidos',
        //         Fecha_Nacimiento='2023-06-26',
        //         Direccion='$Direccion',
        //         Email='$Email',
        //         Telefono='$Telefono',
        //         Persona_contacto='$Persona_contacto'
        //     WHERE id=$ID ";
            
        //     $statement = $GLOBALS['Conect']->prepare($query);

        //     $statement->execute();

        //     return configDatabase::success;
        // } catch (PDOException  $e) {

        //     return configDatabase::error . $e->getMessage();
        // }
// try {
        //     $query = "SELECT * FROM empleados";
        //     if(!is_null($id) && !empty($id)){
        //         $query = $query . " WHERE id = $id";
        //     }
        //     // $query = $query . " ORDER BY id desc";
        //     $statement = $GLOBALS['Conect']->prepare($query);

        //     $statement->execute();

        //     return  $statement->fetchAll();
        // } catch (PDOException  $e) {
        //     return null;
        // }
                // try {
        //      $query = "DELETE FROM empleados WHERE id = $id";
            
        //      $statement = $GLOBALS['Conect']->prepare($query);
        //      $statement->execute();
        //     return configDatabase::success;
        // } catch (PDOException  $e) {

        //     return configDatabase::error . $e->getMessage();
        // }