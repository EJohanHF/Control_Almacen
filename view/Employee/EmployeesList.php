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
require dirname(__DIR__, 2) . "/controller/Employee/EmployeeController.php";


$EmployeeController = new EmployeeController();
$Employees = $EmployeeController->EmployeeList(Null);
$PaginateCount = ceil(count((array)$Employees) / 10);
$NumberRecordPaginate = 0;
$ActiveClass = 0;
$NumberRecord = 10;

if (isset($_GET['previous'])) {
    $NumberRecordPaginate = $_GET['previous'];
    $ActiveClass = $_GET['previous'];
}

$EmployeesList = array_slice($Employees, $NumberRecordPaginate, $NumberRecord);
$NumberRecordPaginate = 0;
?>

<div class="card shadow-none border border-300 mb-3">

    <div class="card-body p-0">

        <div class="p-3 code-to-copy">
            <p class="fs-2 fw-bold">Lista de Empleados</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre / Apellido</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Estado </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($EmployeesList as $Employee) {

                    ?>
                        <tr>

                            <th scope="row"><?php echo $Employee["id"]; ?></th>
                            <td scope="row"><?php echo $Employee["Nombres"] . " " . $Employee["Apellidos"]; ?></td>
                            <td scope="row"><?php echo $Employee["Direccion"]; ?></td>
                            <td scope="row"><?php echo $Employee["Telefono"]; ?></td>
                            <td scope="row">
                                <?php

                                $class = "warning";
                                $text = "Deshabilitado";
                                if ($Employee["estado"]) {
                                    $class = "success";
                                    $text = "Habilitado";
                                }

                                ?>


                                <span class="badge bg-<?php echo $class; ?>"><?php echo  $text; ?></span>

                            </td>
                            <td>
                                <a href="<?php echo config::PATH . "view/Employee/EmployeesEdit.php?IDEmployee=" . $Employee["id"];; ?>" type="button" class="btn btn-warning" title="Editar"><i class="fa-solid fa-pen-to-square"></i></i></i></a>
                                <?php if ($Employee["estado"]) { ?>
                                    <button onclick="EmployeeDelete(<?php echo $Employee['id'] . ',' . 0; ?>);" type="button" class="btn btn-danger" title="Dar Baja"><i class="fa-solid fa-user-xmark"></i></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
            <ul class="pagination pagination-rounded mb-0 float-end pb-3">
                <?php
                for ($i = 1; $i <= $PaginateCount; $i++) {
                    $parmtPrevious = ($i == 1 ? $NumberRecordPaginate : $NumberRecordPaginate +=  10)
                ?>
                    <li class="page-item"><a class="page-link <?php echo  $parmtPrevious == $ActiveClass ? 'active' : '' ?>" href="<?php
                                                                                                                                    echo config::PATH . "view/Employee/EmployeesList.php?previous=" . $parmtPrevious; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

</div>
<div class="float-end">
    <a href="<?php ?>" class="btn btn-primary" title="Nuevo"> Nuevo </a>
</div>
<script src="<?php echo config::PATH . "js/employee/EmployeeController.js" ?>"></script>

<?php require dirname(__DIR__, 1) . "/layout/footer.php"; ?>