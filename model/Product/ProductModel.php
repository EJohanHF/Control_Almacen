<?php

 require dirname(__DIR__, 2) . '/Config/Connection.php';

class ProductModel extends DataBaseMethod
{

    function ProductList($Busqueda)
    {

        $query = "SELECT prod_id
        ,prod_nombre
        ,prod_preciocompra
        ,prod_precioventa
        ,prod_stock
        ,prod_estado
        ,mrc_id
    FROM prodcutos";

        if ($Busqueda != "") {
            $query = $query . " WHERE prod_nombre LIKE '%$Busqueda%';";
        }

        return $this->BDList($query);
    }
}
