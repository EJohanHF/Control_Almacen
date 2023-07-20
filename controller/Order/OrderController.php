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

    function OrderList($search)
    {

        return $this->OrderModel->OrderList($search);
    }

    function OrderBodyList($idOrder)
    {

        return $this->OrderModel->OrderBodyList($idOrder);
    }

    function OrderStateUpdate($idOrder, $State)
    {


        return $this->OrderModel->OrderStateUpdate($idOrder, $State);
    }

    function Dashboard()
    {

        return $this->OrderModel->Dashboard();
    }
}

$Post = json_decode(file_get_contents("php://input"), true);
if (isset($Post['method'])) {
    $OrderController = new OrderController();
    $Post = json_decode(file_get_contents("php://input"), true);
    switch ($Post['method']) {
        case 'OrderCreate':
            // $data =  (OBJECT)$Post['orderHeader'];
            // var_dump($data->id);
            // var_dump($Post['orderBody']);
            print_r($OrderController->OrderGenerate($Post['orderHeader'], $Post['orderBody']));
            break;

        case 'OrderBodyList':

            print_r(json_encode($OrderController->OrderBodyList($Post['idOrder'])));
            break;


        case 'OrderStateUpdate':


            print_r($OrderController->OrderStateUpdate($Post['idOrder'], $Post['State']));
            break;
        case 'Dashboard':


            print_r(json_encode($OrderController->Dashboard()));
            break;
        default:

            break;
    }
}
