<?php
session_start();
if (!isset($_SESSION['IDemployee'])) {
    session_destroy();
    header("Location:http://localhost/control_almacen");
    die();
}

?>

<?php
require dirname(__DIR__, 1) . "/layout/header.php";

?>

<div class="card shadow-none border border-300 mb-3">

    <div class="card-body p-0">

        <div class="p-3 code-to-copy">
            <p class="fs-2 fw-bold">Lista de Productos</p>

            <div class="row g-3 align-items-center float-end mb-3">
                <div class="col-auto">
                    <label for="Buscar Producto" class="col-form-label">Busqueda</label>
                </div>
                <div class="col-auto">
                    <input id="busqueda" class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search">
                </div>

            </div>

            <div id="ProductListTable">

                <?php  //require dirname(__DIR__,1) . "/Product/PartialView/ProductListTable.php"; 
                ?>

            </div>

        </div>
    </div>

</div>
<div class="float-end">
    <a href="<?php echo config::PATH . "view/Employee/EmployeesCreate.php" ?>" class="btn btn-primary" title="Nuevo"> Nuevo </a>
</div>



<script src="<?php echo config::PATH . "js/employee/EmployeeController.js" ?>"></script>
<?php require dirname(__DIR__, 1) . "/layout/footer.php"; ?>

<script>
    const busqueda = document.querySelector('#busqueda');
    busqueda.addEventListener('keyup', () => {

        ProductListTable(busqueda.value, 0);
    })

    const ProductListTable = (busqueda, page) => {

        $.ajax({
            data: {
                busqueda: busqueda,
                page: page
            },
            method: "POST",
            url: "./PartialView/ProductListTable.php",

            success: (data) => {
                document.getElementById("ProductListTable").innerHTML = data;

            }


        })

    }

    window.addEventListener('load', () => {
        ProductListTable("", 0);
    });
</script>