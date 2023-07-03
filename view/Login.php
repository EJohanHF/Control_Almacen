<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/control_almacen/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <script src="/control_almacen/js/util/util.js"></script>
    <script src="/control_almacen/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/control_almacen/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/control_almacen/node_modules/jquery/dist/jquery.min.js"></script>
    <title>SI - UniCenter</title>
</head>

<body class="m-0 vh-100 row">
    <div class="bg-body-secondary container d-flex justify-content-center">
        <div class="row ">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="/control_almacen/img/LogoEmpresa.png" alt="LogoSI-UniCenter" class="img-fluid rounded-circle w-25">
                                    <span class="fs-1 fw-bold text-body-emphasis">SI - UniCenter</span>

                                    <hr class="border border-2 border-black opacity-50">

                                </div>
                                <form action="javascript:SignIn();" id="FrmLogin">
                                    <div class="mb-3">
                                        <label class="fw-semibold">Email</label>
                                        <input class="form-control form-control-sm" type="text" name="User" placeholder="Igrese su usuario">
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-semibold">Password</label>
                                        <input class="form-control form-control-sm" type="password" name="Password" placeholder="Ingrese su Passwor">
                                    </div>
                                    <div>
                                        <div class="form-check align-items-center">
                                            <!-- <input id="customControlInline" type="checkbox" class="form-check-input"
                                                value="remember-me" name="remember-me" checked=""> -->
                                            <!-- <label class="form-check-label text-small"
                                                for="customControlInline">Remember me next time</label> -->
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Iniciar sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    const SignIn = () => {
        const FrmLogin = Object.fromEntries(
            new FormData(
                document.querySelector("#FrmLogin")
            )
        );
        $.ajax({

            data: {
                method: 'SignIn',
                DataUser: FrmLogin
            },
            url: basePahtjs + 'controller/Sign_In_Up/Sign_In_UpModelController.php',
            type: 'POST',

            success: (data) => {
                if ($.trim(data) === "" || data === 0 || data === null) {
                    alert('Usario / Clave Incorrecto');
                } else {

                    document.location.href = $.trim(data);
                }

            },

            error: (data) => {
                console.log(data);
            }

        });
    }
</script>