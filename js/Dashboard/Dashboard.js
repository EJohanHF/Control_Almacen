const PathOrderController =
  "http://localhost/control_almacen/controller/Order/OrderController.php";

const DateHour = () => {
  var today = new Date();

  // obtener la fecha y la hora
  var now = today.toLocaleString();
  document.querySelector("#Fecha_Hora").innerText = now;

  // console.log(now);
};

$(document).ready(function () {
  $("#sparkline5").sparkline([0, 0], {
    type: "pie",
    height: "140",
    sliceColors: ["#1ab394", "#58595B"],
  });

  DateHour();
});

const Dashboard = async () => {
  const request = await fetch(PathOrderController, {
    method: "POST",
    body: JSON.stringify({
      method: "Dashboard",
    }),
  });
  const response = await request.text();
  const {
    Total_Cancelado,
    Total_Despachado,
    Total_Ventas,
    Total_Ventas_Despachado,
  } = JSON.parse(response)[0];

  document.querySelector("#Total_Cancelado").innerText = Total_Cancelado;
  document.querySelector("#Total_Despachado").innerText = Total_Despachado;
  document.querySelector("#Cantidad_Ventas").innerText = Total_Ventas;

  $("#sparkline5").sparkline([Total_Despachado, Total_Cancelado], {
    type: "pie",
    height: "140",
    sliceColors: ["#1ab394", "#58595B"],
  });
};

Dashboard();

setInterval(async () => {
  await DateHour();
  await Dashboard ();
}, 1000);
