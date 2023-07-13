<?php
require dirname(__DIR__, 2) . '/model/Customer/CustomerModel.php';

class CustomerController
{

    private $CustomerModel;
    public function __construct()
    {

        $this->CustomerModel = new CustomerModel();
    }

    function CostumerList($Search)
    {
        // $CustomerModel =  new CustomerModel();
        return $this->CustomerModel->CostumerList($Search);
    }
}



if (isset($_POST['method'])) {
    $CustomerController = new CustomerController();
    switch ($_POST['method']) {
        case 'CostumerList':
            $CostumerList = array();
            
            $Costumersarry =  $CustomerController->CostumerList($_POST['data']);
            // foreach ($Costumersarry as $Costumers){

            //     $newobj->id = $Costumers
            // }



            print_r  (json_encode(array_map(
                function ($Costumersarry) {
                    $newobj = new stdClass();
                    $newobj->id = $Costumersarry->clte_id;
                    $newobj->text = $Costumersarry->clte_nombre;
                    
                    return $newobj;
                },
                $Costumersarry
            )));
            break;

        default:
            # code...
            break;
    }
}


?>
