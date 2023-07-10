const EmployeeCreate = () => {
  debugger;
  const FrmCreateEmployeeObj = Object.fromEntries(
    new FormData(document.querySelector("#FrmCreateEmployee"))
  );
  console.log(FrmCreateEmployeeObj);
  debugger;
  $.ajax({
    data: {
      method: "EmployeeCreate",
      data: FrmCreateEmployeeObj,
    },
    url: "http://localhost/control_almacen/controller/employee/EmployeeController.php",
    type: "POST",

    success: function (state) {
      stateval = $.trim(state);
      stateval === "success"
        ? swalInfo(
            "Creo Empleado",
            "",
            stateval,
            basePahtjs + "view/Employee/EmployeesList.php"
          )
        : swalInfo(
            "Error al Crear Empleado",
            stateval.substr(5),
            stateval.substr(0, 5),
            ""
          );
    },
    error: function (state) {
      swalInfo("Error", "Cominiquese con el proveedor", "error", "");
    },
  });
};

if (document.querySelector("#chkemplestado")) {
  document.querySelector("#chkemplestado").addEventListener("click", (e) => {
    let chktext = document.querySelector(".chktext");

    if (e.target.checked) {
      chktext.classList.remove("bg-warning");
      chktext.classList.add("bg-success");
      chktext.innerText = "Activo";
    } else {
      chktext.classList.remove("bg-success");
      chktext.classList.add("bg-warning");
      chktext.innerText = "Inactivo";
    }
  });
}
const EmployeeEdit = () => {
  debugger;
  const FrmEditEmployee = Object.fromEntries(
    new FormData(document.querySelector("#FrmEditEmployee"))
  );
  FrmEditEmployee.Estado = document.getElementById("chkemplestado").checked;
  $.ajax({
    data: {
      method: "EmployeeEdit",
      data: FrmEditEmployee,
      // ID,
      // Nombres,
      // Apellidos,
      // Fecha_Nacimiento,
      // Direccion,
      // Email,
      // Telefono,
      // Persona_contacto
    },
    url: "http://localhost/control_almacen/controller/employee/EmployeeController.php",
    type: "POST",

    success: function (state) {
      stateval = $.trim(state);

      stateval === "success"
        ? swalInfo("Empleado se Actualizo", "", stateval, "")
        : swalInfo(
            "Error al Actualizar Empleado",
            stateval.substr(5),
            stateval.substr(0, 5),
            ""
          );
    },
    error: function (state) {
      swalInfo("Error", "Cominiquese con el proveedor", "error", "");
    },
  });
};
const EmployeeDelete = (ID, Estado) => {
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
          method: "EmployeeDelete",
          data: { ID, Estado },
        },
        url: basePahtjs + "controller/employee/EmployeeController.php",
        type: "POST",

        success: function (state) {
          stateval = $.trim(state);
          stateval === "success"
            ? swalInfo(
                "El empleado se elimino",
                "",
                stateval,
                basePahtjs + "view/Employee/EmployeesList.php"
              )
            : swalInfo(
                "Error al eliminar empleado",
                stateval.substr(5),
                stateval.substr(0, 5),
                ""
              );
        },
        error: function (state) {
          swalInfo("Error", "Cominiquese con el proveedor", "error", "");
        },
      });
    }
  });
};

const BtnDelete = document.querySelector(".btnDelete");
if (BtnDelete) {
  BtnDelete.addEventListener("click", () => {
    const IDEmployee = document.getElementById("IDEmployee").value;
    EmployeeDelete(IDEmployee);
  });
}
