<?php
require dirname(__DIR__, 3) . "/controller/Product/ProductController.php";

$ProductController =  new ProductController();


$product = $ProductController->ProductList(
    isset($_POST['busqueda']) ?  $_POST['busqueda'] : ""
);



$PaginateCount = ceil(count((array)$product) / 10);
$NumberRecordPaginate = 0;
$ActiveClass = 0;
$NumberRecord = 10;

isset($_POST['page']) ? $NumberRecordPaginate = $ActiveClass = $_POST['page']   : $NumberRecordPaginate  = 0;



$productData = array_slice($product, $NumberRecordPaginate, $NumberRecord);


$NumberRecordPaginate = 0;
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Productos</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Estado</th>

            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($productData as $data) {

        ?>
            <tr>

                <th scope="row"><?php echo $data->prod_nombre; ?></th>
                <td scope="row"><?php echo $data->prod_precioventa; ?></td>
                <td scope="row"><?php echo $data->prod_stock; ?></td>
                <td scope="row">

                    <?php

                    $class = "warning";
                    $text = "Deshabilitado";
                    if ($data->prod_estado) {
                        $class = "success";
                        $text = "Habilitado";
                    }

                    ?>


                    <span class="badge bg-<?php echo $class; ?>"><?php echo  $text; ?></span>



                </td>


                <td>

                    <?php
                    if ($data->prod_estado) {
                        $prod_nombre = str_replace("'", "\'", $data->prod_nombre)
                    ?>
                        <!--onclick="AddProductToCart();"-->
                        <button onclick="AddProductToCart(<?php echo $data->prod_id . ',' . $data->prod_precioventa . ',\'' .  $prod_nombre . '\''; ?>);" type="button" class="btn btn-w-m btn-info_local" title="Agregar Carrito"><i class="fa-solid fa-cart-shopping"></i></button>
                    <?php } ?>
                    <!--<a href="" type="button" class="btn btn-warning" title="Editar"><i class="fa-solid fa-pen-to-square"></i></i></i></a>
                    <button onclick="" type="button" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>-->
                </td>
            </tr>
        <?php

        }
        ?>

    </tbody>
</table>

<ul class="pagination pagination-rounded mb-0 float-end pb-3">
    <?php
    for ($i = 1; $i <= $PaginateCount; $i++) {
        $parmtPrevious = ($i == 1 ? $NumberRecordPaginate : $NumberRecordPaginate +=  10)
    ?>
        <li onclick="ProductListTable(document.getElementById('busqueda')? document.getElementById('busqueda').value : '',<?php echo $parmtPrevious; ?>);" class="page-item"><a class="page-link <?php echo  $parmtPrevious == $ActiveClass ? 'active' : '' ?>"><?php echo $i; ?></a></li>
    <?php } ?>
</ul>