<?php require dirname(__DIR__, 1) . "/layout/header.php"; ?>


<div class="card shadow-none border border-300 mb-3">

    <div class="card-body p-0">

        <div class="p-3 code-to-copy">
            <p class="fs-2 fw-bold">Lista de Pedidos</p>

            <div class="row g-3 align-items-center float-end mb-3">
                <div class="col-auto">
                    <label for="Buscar Producto" class="col-form-label">Busqueda</label>
                </div>
                <div class="col-auto">
                    <input id="SearchOrder" class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search">
                    
                </div>

            </div>

            <div id="OrderListTable">

               

            </div>

        </div>
    </div>
    
</div>
<div class="float-end">
    <a href="<?php echo config::PATH . "view/Employee/EmployeesCreate.php" ?>" class="btn btn-primary" title="Nuevo"> Nuevo </a>
</div>

<script  src="<?php echo config::PATH . "js/Order/OrderList.js" ?>">

</script>

<?php require dirname(__DIR__, 1) . "/Order/PartialView/OrderProductListModal.php"; ?>
<?php require dirname(__DIR__, 1) . "/layout/footer.php"; ?>