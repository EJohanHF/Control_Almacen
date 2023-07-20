<?php require dirname(__DIR__, 1) . "/layout/header.php"; ?>


<style type="text/css">
    .jqstooltip {
        position: absolute;
        left: 0px;
        top: 0px;
        visibility: hidden;
        background: rgb(0, 0, 0) transparent;
        background-color: rgba(0, 0, 0, 0.6);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
        -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
        color: white;
        font: 10px arial, san serif;
        text-align: left;
        white-space: nowrap;
        padding: 5px;
        border: 1px solid white;
        z-index: 10000;
        width: auto !important;
        height: auto !important;
    }

    .jqsfield {
        color: white;
        font: 10px arial, san serif;
        text-align: left;
    }
</style>
<div class="card shadow-none border border-300 mb-3">

    <div class="card-body p-0">

        <div class="p-3 code-to-copy">
            <p class="fs-2 fw-bold">Estadisticas Ventas</p>

            <div id="OrderListTable">

                <div class="row ">
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title fs-10px">
                                <div class="ibox-tools">
                                    <span class="label label-primary fw-semibold float-end">Diario</span>
                                </div>
                                <p class="mb-auto fw-semibold">Total Ventas</p>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins text-center" id="Cantidad_Ventas"></h1>
                                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>New visits</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title fs-10px">
                                <div class="ibox-tools">
                                    <span class="label label-primary fw-semibold float-end">Diario - Despachados</span>
                                </div>
                                <p class="mb-auto fw-semibold">Ventas Despachadas</p>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins text-center" id="Total_Despachado"></h1>
                                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>New visits</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title fs-10px">
                                <div class="ibox-tools">
                                    <span class="label label-warning fw-semibold float-end">Diario - Cancelados</span>
                                </div>
                                <p class="mb-auto fw-semibold">Ventas Canceladas</p>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins text-center" id="Total_Cancelado"></h1>
                                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>New visits</small> -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="mt-4">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Percentage Ventas</h5>

                                <div class="text-center">
                                    <div id="sparkline5">
                                        <canvas width="150" height="150" style="display: inline-block; width: 150px; height: 150px; vertical-align: top;">
                                        </canvas>
                                    </div>
                                </div>
                                <table class="table table-stripped  m-t-md">
                                    <tbody>
                                        <tr>
                                            <td class="no-borders">
                                                <i class="fa fa-circle text-navy"></i>
                                            </td>
                                            <td class="no-borders">
                                                Despachados
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-circle" style="color: #58595B; font-size: 60%;"></i>
                                            </td>
                                            <td>
                                                Cancelados
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="widget style1 navy-bg">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa fa-clock fa-7x"></i>
                                </div>
                                <div class="col-11 text-center">
                                    <span class="fs-1"> Fecha y Hora </span>
                                    <h2 id="Fecha_Hora" class="font-bold"></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>



<script src="<?php echo config::PATH . "js/Dashboard/Dashboard.js" ?>">

</script>

<!-- <?php require dirname(__DIR__, 1) . "/Dashboard/Dashboard/Dashboard.php"; ?> -->
<?php require dirname(__DIR__, 1) . "/layout/footer.php"; ?>