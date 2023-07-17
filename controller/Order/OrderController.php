<?php
require dirname(__DIR__, 2) . '/model/Order/OrderModel.php';

class OrderController
{
    private $OrderModel;
    function __construct()
    {
        $this->OrderModel = new OrderModel();
    }

    function OrderGenerate($orderHeader, $orderBody)
    {
        return $this->OrderModel->OrderGenerate($orderHeader, $orderBody);
    }
}


if (json_decode(file_get_contents("php://input"), true)) {
    $OrderController = new OrderController();
    $Post = json_decode(file_get_contents("php://input"), true);
    switch ($Post['method']) {
        case 'OrderCreate':
            // $data =  (OBJECT)$Post['orderHeader'];
            // var_dump($data->id);
            // var_dump($Post['orderBody']);
            var_dump( $OrderController->OrderGenerate($Post['orderHeader'], $Post['orderBody']));
            break;

        default:

            break;
    }
}
