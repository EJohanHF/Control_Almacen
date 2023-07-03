<?php
require dirname(__DIR__, 1) . "/layout/header.php";
require dirname(__DIR__, 2) . '/controller/Employee/EmployeeController.php';
require dirname(__DIR__, 2) . '/controller/User/UserController.php';

$IDEmployee = 0;
if (isset($_GET['IDEmployee']) && !empty($_GET['IDEmployee']) && is_numeric($_GET['IDEmployee'])) {
    $IDEmployee = $_GET['IDEmployee'];
}


$EmployeeController = new EmployeeController();
$EmployeeList = $EmployeeController->EmployeeList($IDEmployee);

$UserController = new UserController();
$UserList = $UserController->UserList($IDEmployee);

?>

<div class="row ">
    <div class="col-12">



        <span class="fs-2 fw-bold">Editar Empleado</span>


        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content ">
                            <div class="tab-pane active show" id="basic-form-preview" role="tabpanel">
                                <form action="javascript:EmployeeEdit();" id="FrmEditEmployee" class="mt-3">

                                    <?php
                                    foreach ($EmployeeList as $employee) {

                                    ?>
                                        <input type="hidden" value="<?php echo $employee["id"];  ?>" id="IDEmployee" name="IDEmployee">
                                        <div class="mb-2 row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nombres (*)</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="<?php echo $employee["Nombres"]; ?>" class="form-control form-control-sm" id="Nombres" name="Nombres" required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Apellidos (*)</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="<?php echo $employee["Apellidos"]; ?>" class="form-control form-control-sm" id="Apellidos" name="Apellidos" required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" title="Fecha Nacimiento">Fec. Nacimiento (*)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" value="<?php echo $employee["Fecha_Nacimiento"]; ?>" id="Fecha_Nacimiento" name="Fecha_Nacimiento" required type="date">

                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Dirección (*)</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="<?php echo $employee["Direccion"]; ?>" class="form-control form-control-sm" id="Direccion" name="Direccion" required>
                                            </div>
                                        </div>

                                        <div class="mb-2 row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Email (*)</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="<?php echo $employee["Email"]; ?>" class="form-control form-control-sm" id="Email" name="Email" required>

                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Teléfono (*)</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="<?php echo $employee["Telefono"]; ?>" class="form-control form-control-sm" id="Telefono" name="Telefono" required>

                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" title="Persona de Contacto">Pers. contacto (*)</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="<?php echo $employee["Persona_contacto"]; ?>" class="form-control form-control-sm" id="Persona_contacto" name="Persona_contacto" required>

                                            </div>
                                        </div>
                                    <?php } ?>
                                    <button class="btn btn-w-m btn-warning float-end btnEditar" type="submit">
                                        <i class="fa-solid fa-pen-to-square me-2"></i>Editar</button>

                                </form>


                                <button class="btn btn-w-m btn-danger float-end me-1 btnDelete" type="button">
                                    <i class="fa-solid fa-trash me-2"></i>Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content ">
                            <div class="tab-pane active show" id="basic-form-preview" role="tabpanel">
                                <span class="fs-3 fw-bold">Usurio </span>
                                <?php if (!is_null($UserList)  && count($UserList) != 0) { ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Clave</th>
                                                <th scope="col">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($UserList as $user) {   ?>
                                                <tr>
                                                    <th scope="row"><?php echo $user["Usuario"]; ?></th>
                                                    <th scope="row"><?php echo $user["Clave"]; ?></th>
                                                    <th scope="col">

                                                        <button onclick="" type="button" class="btn btn-danger btnDeleteUser" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                                        <button href="" type="button" class="btn btn-warning " title="Editar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="fa-solid fa-pen-to-square me-0"></i></button>
                                                    </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } else {  ?>
                                    <p class="fs-4">El empleado no tiene usuario</p>
                                    <button href="" type="button" class="btn btn-primary float-end" title="Nuevo" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-pen-to-square me-1"></i>Crear</button>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title fs-4 fw-bold" id="exampleModalLabel">Crear Usuario</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <?php if (!is_null($UserList)  && count($UserList) != 0) { ?>
                    <form action="javascript:UserEdit();" id="FrmModalUser">
                        <input type="hidden" value="<?php echo $employee["id"];  ?>" id="IDempleado" name="IDempleado">

                        <?php

                        foreach ($UserList as $user) {
                        ?>
                            <input type="hidden" value="<?php echo $user["id"];  ?>" id="IdUser" name="IdUser">
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Usuario (*)</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php echo $user["Usuario"]; ?>" class="form-control form-control-sm" id="Usuario" name="Usuario" required>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Clave (*)</label>
                                <div class="col-sm-8">
                                    <input type="password" value="<?php echo $user["Clave"]; ?>" class="form-control form-control-sm" id="Clave" name="Clave" required>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                        <hr class="d-none d-md-block my-2 ms-3">
                        <button type="submit" class="btn btn-primary float-end">Guardar</button>
                    </form>
                <?php } else { ?>

                    <form action="javascript:UserCreate();" id="FrmModalUser">
                        <input type="hidden" value="<?php echo $employee["id"];  ?>" id="IDempleado" name="IDempleado">
                        <div class="mb-2 row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Usuario (*)</label>
                            <div class="col-sm-8">
                                <input type="text" value="" class="form-control form-control-sm" id="Usuario" name="Usuario" required>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Clave (*)</label>
                            <div class="col-sm-8">
                                <input type="password" value="" class="form-control form-control-sm" id="Clave" name="Clave" required>
                            </div>
                        </div>
                        <hr class="d-none d-md-block my-2 ms-3">
                        <button type="submit" class="btn btn-primary float-end">Guardar</button>
                    </form>

                <?php } ?>




                <button type="button" class="btn btn-secondary float-end me-2" data-bs-dismiss="modal">Cerrar</button>

            </div>

        </div>
    </div>
</div>

<script>

</script>


<script src="<?php echo config::PATH . "js/employee/EmployeeController.js" ?>"></script>

<script>
    const UserCreate = () => {
        const FrmModalUser = Object.fromEntries(
            new FormData(document.querySelector("#FrmModalUser"))

        );
        console.log(FrmModalUser.IDEmployeeModal)
        $.ajax({
            data: {
                method: "UserCreate",
                data: FrmModalUser,
            },
            url: basePahtjs + "/controller/User/UserController.php",
            type: "POST",

            success: function(state) {
                stateval = $.trim(state);
                stateval === "success" ?
                    swalInfo(
                        "Se Creo el usuario",
                        "",
                        stateval,
                        basePahtjs + "view/Employee/EmployeesEdit.php?IDEmployee=" + FrmModalUser.IDempleado
                    ) :
                    swalInfo(
                        "Error al Crear Empleado",
                        stateval.substr(5),
                        stateval.substr(0, 5),
                        ""
                    );
            },
            error: function(state) {
                swalInfo("Error", "Cominiquese con el proveedor", "error", "");
            },
        });
    }


    const UserEdit = () => {
        const FrmModalUser = Object.fromEntries(
            new FormData(document.querySelector("#FrmModalUser"))

        );
        console.log(FrmModalUser.IDEmployeeModal)
        $.ajax({
            data: {
                method: "UserEdit",
                data: FrmModalUser,
            },
            url: basePahtjs + "/controller/User/UserController.php",
            type: "POST",

            success: function(state) {
                stateval = $.trim(state);
                stateval === "success" ?
                    swalInfo(
                        "Se editar el usuario",
                        "",
                        stateval,
                        basePahtjs + "view/Employee/EmployeesEdit.php?IDEmployee=" + FrmModalUser.IDempleado
                    ) :
                    swalInfo(
                        "Error al editar Empleado",
                        stateval.substr(5),
                        stateval.substr(0, 5),
                        ""
                    );
            },
            error: function(state) {
                swalInfo("Error", "Cominiquese con el proveedor", "error", "");
            },
        });
    }

    const UserDelete = (IdUser, IDEmployee) => {
        swal({
            title: "¿Estás seguro?",
            text: "Desea eliminar el empleado",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {
                        method: "UserDelete",
                        data: {
                            IdUser
                        },
                    },
                    url: basePahtjs + "/controller/User/UserController.php",
                    type: "POST",

                    success: function(state) {
                        stateval = $.trim(state);
                        stateval === "success" ?
                            swalInfo(
                                "El usuario se elimino",
                                "",
                                stateval,
                                basePahtjs + "view/Employee/EmployeesEdit.php?IDEmployee=" + IDEmployee
                            ) :
                            swalInfo(
                                "Error al eliminar usuario",
                                stateval.substr(5),
                                stateval.substr(0, 5),
                                ""
                            );
                    },
                    error: function(state) {
                        swalInfo("Error", "Cominiquese con el proveedor", "error", "");
                    },
                });
            }
        });
    };

    const BtnDeleteUser = document.querySelector(".btnDeleteUser");

    if (BtnDeleteUser) {
        const idEmployee = document.getElementById("IDEmployee").value;
        const idUser = document.getElementById("IdUser").value;
        BtnDeleteUser.addEventListener('click', () => {
            UserDelete(idUser, idEmployee);
        })
    }
</script>
<?php require dirname(__DIR__, 1) . "/layout/footer.php"; ?>