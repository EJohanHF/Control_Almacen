<?php
require dirname(__DIR__, 3) . "/controller/Order/OrderController.php";

//Post
$Post = json_decode(file_get_contents("php://input"), true);

//Method
$OrderController = new OrderController();
$OrderListData = $OrderController->OrderList(isset($Post['SearchOrder'])? $Post['SearchOrder'] : "");

$StateProduct = [
    json_decode('{"Class":"info", "State":"Borrador", "FontAsw":"fa-regular fa-clock"}'), // 0 = 1
    json_decode('{"Class":"warning", "State":"Pendiente", "FontAsw":"fa-regular fa-clock"}'), // 1
    json_decode('{"Class":"primary", "State":"Despachado",  "FontAsw":"fa-solid fa-check"}'), // 2
    json_decode('{"Class":"success", "State":"Cancelado",  "FontAsw":"fa-solid fa-ban" }'), // 3
    json_decode('{"Class":"danger", "State":"Error", "FontAsw":"fa-regular fa-circle-exclamation"}') // No es ninguno
];


$TotalPage = ceil(count((array)$OrderListData) / 10);
$StarOrdenPage = 0;
$TotalOrdenXPage = 10;
$ActiveClass = 0;


isset($Post['Page']) ? $StarOrdenPage = $ActiveClass = $Post['Page'] : "";

$OrderListData = array_slice($OrderListData, $StarOrdenPage, $TotalOrdenXPage);

$StarOrdenPage = 0
?>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Nr. Pedido</th>
            <th scope="col">Cliente</th>
            <th scope="col">Total</th>
            <th scope="col">Fecha Reg.</th>
            <th scope="col">Estado</th>
            <th scope="col">Accion</th>

        </tr>
    </thead>
    <tbody>

        <?php foreach ($OrderListData as $Data) {
            # code...
        ?>
            <tr id="<?php print_r($Data->ord_id) ?>">

                <td scope="row"><?php print_r($Data->ord_id) ?></td>
                <td scope="row" style="width: 20rem;"><?php print_r($Data->clte_nombre) ?></td>
                <td scope="row"><?php print_r($Data->ord_total) ?></td>
                <td scope="row"><?php print_r($Data->ord_fecha) ?></td>
                <td scope="row">

                    <?php

                    $ord_estado = 3;
                    switch ($Data->ord_estado) {
                        case 0:
                            $ord_estado = $Data->ord_estado;
                            break;
                        case 1:
                            $ord_estado = $Data->ord_estado;
                            break;
                        case 2:
                            $ord_estado = $Data->ord_estado;
                            break;
                        case 3:
                            $ord_estado = $Data->ord_estado;
                            break;

                        default:
                            $ord_estado = array_key_last($StateProduct);
                            break;
                    }

                    ?>

                    <span class="badge local-bg-<?php print_r($StateProduct[$ord_estado]->Class); ?>"><?php echo ($StateProduct[$ord_estado]->State); ?>
                        <i class="<?php print_r($StateProduct[$ord_estado]->FontAsw) ?>"></i>
                    </span>



                </td>


                <td>


                    <?php if ($Data->ord_estado == 1 or $Data->ord_estado == 0) { ?>
                        <i class="fa-solid fa-check local-i-susses" title="Despacha" id="OrderDispatch"></i>
                        <i class="fa-solid fa-xmark local-i-danger " title="Cancelar" id="OrderCancel"></i>
                    <?php } ?>
                    <i class="fa-solid fa-eye local-cursor-pointer " id="ListProductModal" data-bs-toggle="modal" data-bs-target="#OrderProductListModal"></i>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>



<ul class="pagination pagination-rounded mb-0 float-end pb-3">
    <?php
    for ($i = 1; $i <= $TotalPage; $i++) {
        $StarOrdenPageNext = ($i == 1 ? $StarOrdenPage : $StarOrdenPage +=  10)
    ?>
        <li onclick="OrderListTableLoad(document.querySelector('#SearchOrder').value,<?php print_r($StarOrdenPageNext); ?> );" class="page-item"><a class="page-link <?php echo  $StarOrdenPageNext == $ActiveClass ? 'active' : '' ?>"><?php echo $i; ?></a></li>
    <?php } ?>
</ul>