<?php
require dirname(__DIR__, 2) . '/Config/Connection.php';

class CustomerModel extends DataBaseMethod
{

    function CostumerList($Search)
    {
        $query = "SELECT clte_id
        ,clte_nombre
        ,clte_dni_ruc
        ,clte_direccion
        ,clte_telefono
    FROM clientes
    WHERE (clte_nombre LIKE '%$Search%')
        OR (clte_dni_ruc LIKE '$Search%')
        LIMIT 1000";

        return  $this->BDList($query);
    }
}

