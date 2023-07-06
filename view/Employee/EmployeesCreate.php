<?php
session_start();
if (!isset($_SESSION['IDemployee'])) {
    session_destroy();
    header("Location:http://localhost/control_almacen");
    die();
}

//require dirname(__DIR__, 2) . "/Config/util.php";
require dirname(__DIR__, 1) . "/layout/header.php";
require dirname(__DIR__, 2) . "/controller/Employee/EmployeeController.php";
?>



<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content ">
                    <div class="tab-pane active show" id="basic-form-preview" role="tabpanel">
                        <span class="fs-2 fw-bold">Crear Empleado</span>
                        <form action="javascript:EmployeeCreate();" id="FrmCreateEmployee" class="mt-3">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-2 row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nombres (*)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="Nombres" name="Nombres" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Apellidos (*)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="Apellidos" name="Apellidos" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">

                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" title="Fecha Nacimiento">Fec. Nacimiento (*)</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="Fecha_Nacimiento" name="Fecha_Nacimiento" required type="date">

                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Dirección (*)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="Direccion" name="Direccion" required>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2 row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Email (*)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="Email" name="Email" required>

                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Teléfono (*)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="Telefono" name="Telefono" required>

                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" title="Persona de Contacto">Pers. contacto (*)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="Persona_contacto" name="Persona_contacto" required>

                                        </div>
                                    </div>

                                </div>


                            </div>
                            <button class="btn btn-success float-end" type="submit">
                                <i class="fa-solid fa-check me-2"></i>Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo config::PATH . "js/employee/EmployeeController.js" ?>"></script>


<?php require dirname(__DIR__, 1) . "/layout/footer.php"; ?>