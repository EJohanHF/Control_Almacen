<?php
require dirname(__DIR__, 2) . '/Config/Connection.php';

class  OrderModel
{
    private $cn;
    function __construct()
    {
        $this->cn = new DataBaseMethod();
    }

    function OrderList($Search)
    {
        $query = "SELECT ord_id, clte_id, clte_nombre, ord_total, ord_estado , ord_fecha
        FROM orden  WHERE (ord_id LIKE '$Search%')
        OR (clte_nombre LIKE '%$Search%') ORDER BY ord_id desc";
        return $this->cn->BDList($query);
    }


    function OrderBodyList($idOrder)
    {
        $query = "SELECT dt_id, ord_id, prod_id, dt_descripcion, dt_cantidad, dt_precioventa, dt_preciototal
        FROM detalle_orden WHERE ord_id = $idOrder";
        return $this->cn->BDList($query);
    }

    function OrderStateUpdate($idOrder, $State)
    {
        $query = "UPDATE orden SET ord_estado = $State WHERE ord_id = $idOrder";

        return $this->cn->BDUpdate($query);
    }

    function OrderGenerate($orderHeader, $orderBody)
    {
        $error = "error";
        if ($orderHeader) {
            if ($orderBody) {
                // 0 Cancelado 1 Borrador 2 confirmado 3 Despachado
                $dataOrderHeader = (object)$orderHeader;


                $countorderBody = count($orderBody);
                $OrderHeaderTotal = 0;
                foreach ($orderBody as $orderBodyTotal) {
                    $OrderHeaderTotal += ($orderBodyTotal['precio'] * $orderBodyTotal['cantidad']);
                }

                $queryOrderHeader = "INSERT INTO orden
        (ord_id, clte_id, clte_nombre, ord_total, ord_estado,ord_fecha)
        VALUES (NULL, $dataOrderHeader->id, '" . str_replace("'", "\'", $dataOrderHeader->text,) . "',  $OrderHeaderTotal, 1 , DATE(NOW()))";
                $OrderHearder_ID = $this->cn->BDCreateLastInsertID($queryOrderHeader);

                if (is_numeric($OrderHearder_ID) && $OrderHearder_ID != "" && $OrderHearder_ID != "0" && $OrderHearder_ID != 0) {


                    $queryOrderBodyValues = "";
                    foreach ($orderBody as $orderBodyData) {

                        $queryOrderBodyValues .= "(NULL," . $OrderHearder_ID  . "," .
                            $orderBodyData['id'] .
                            ",'" . str_replace("'", "\'", $orderBodyData['name']) . "'," .
                            $orderBodyData['cantidad'] . "," . $orderBodyData['precio'] . "," .
                            ($orderBodyData['precio'] * $orderBodyData['cantidad']) . ")";

                        if ($countorderBody !== 1) {
                            $queryOrderBodyValues .= ",";
                        }
                        $countorderBody -= 1;
                    }

                    $queryOrderBody    = "INSERT INTO detalle_orden
                     (dt_id, ord_id, prod_id, dt_descripcion, dt_cantidad, dt_precioventa, dt_preciototal)
                     VALUES $queryOrderBodyValues "; //(0, 1, 0, '', 0, 0, 0)
                    return $this->cn->BDCreate($queryOrderBody);
                }
                return $error;
            }
            return $error;
        }
        return $error;
    }

    function Dashboard()
    {
        $query = 'SELECT COUNT(ord_id) AS "Total_Ventas" 
        , (SELECT COUNT(ord_id) FROM orden WHERE ord_estado = 2 AND ord_fecha = DATE(NOW() )) AS "Total_Despachado"
        ,(SELECT COUNT(ord_id) FROM orden WHERE ord_estado = 3 AND ord_fecha = DATE(NOW() )) AS "Total_Cancelado"
        ,(SELECT SUM(ord_total) FROM orden WHERE ord_estado = 2 AND ord_fecha = DATE(NOW() )) AS "Total_Ventas_Despachado"
        FROM orden WHERE ord_fecha = DATE(NOW())';
        return $this->cn->BDList($query);
    }
}
