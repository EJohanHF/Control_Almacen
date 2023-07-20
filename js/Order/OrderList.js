const PathOrderListTable =
  "http://localhost/control_almacen/view/Order/PartialView/OrderListTable.php";
const PathOrderController =
  "http://localhost/control_almacen/controller/Order/OrderController.php";


  document.querySelector("#SearchOrder").addEventListener("keyup", (e) => {
    OrderListTableLoad(e.target.value, 0);
  });
  



const OrderListTableLoad = async (SearchOrder,Page) => {
  try {
    const SearchOrder1 = document.querySelector("#SearchOrder").value;
    const tableLoad = await fetch(PathOrderListTable , {
      method:"POST",
      body:JSON.stringify({
        Page : Page,
        SearchOrder: SearchOrder,
      })
    });
    const response = await tableLoad.text();
    document.querySelector("#OrderListTable").innerHTML = response;

    //Carga Modal
    document.querySelectorAll("#ListProductModal").forEach((btn) => {
      btn.addEventListener("click", async (e) => {
        try {
          const OrderBody = await fetch(PathOrderController, {
            method: "POST",
            body: JSON.stringify({
              method: "OrderBodyList",
              idOrder: e.target.parentNode.parentNode.id,
            }),
          });

          const response = await OrderBody.text();
          let DataProductListModal = "";
          JSON.parse(response).forEach((item) => {
            DataProductListModal += `<tr class=""> 
          <td scope="row">${item.dt_descripcion}</td> 
          <td>${item.dt_precioventa}</td> 
          <td>${item.dt_cantidad}</td> 
          </tr>`;
          });

          document.querySelector("#DataProductListModal").innerHTML =
            DataProductListModal;
        } catch (error) {
          console.log(error);
        }
      });
    });

    //Orden Despachado
    document.querySelectorAll("#OrderDispatch").forEach((btn) => {
      btn.addEventListener("click", async (e) => {
        try {
          console.log(e.target.parentNode.parentNode.id);
          const request = await fetch(PathOrderController, {
            method: "POST",
            body: JSON.stringify({
              method: "OrderStateUpdate",
              idOrder: e.target.parentNode.parentNode.id,
              State: "2",
            }),
          });
          const response = await request.text();
          response.trim() == "success"
            ? (OrderListTableLoad(SearchOrder1,0),
              swalInfo("Pedido Despachado", "", response.trim(), ""))
            : console.log(
                response.trim(),
                swalInfo(
                  "Error Al Despachar",
                  response.trim().substr(5),
                  response.trim().substr(0, 5),
                  ""
                )
              );
        } catch (error) {
          console.log(error);
        }
      });
    });

    //Orden Cancelar
    document.querySelectorAll("#OrderCancel").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        swal({
          title: "¿Estás seguro?",
          text: "Desea eliminar el empleado",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then(async (willDelete) => {
          if (willDelete) {
            try {
              const request = await fetch(PathOrderController, {
                method: "POST",
                body: JSON.stringify({
                  method: "OrderStateUpdate",
                  idOrder: e.target.parentNode.parentNode.id,
                  State: "3",
                }),
              });

              const response = await request.text();

              response.trim() == "success"
                ? (OrderListTableLoad(SearchOrder1,0),
                  swalInfo("Pedido Cancelado", "", response.trim(), ""))
                : console.log(
                    response.trim(),
                    swalInfo(
                      "Error Al Cancelar el pedido",
                      response.trim().substr(5),
                      response.trim().substr(0, 5),
                      ""
                    )
                  );
            } catch (error) {
              console.log(error);
            }
          }
        });
      });
    });
  } catch (error) {
    console.log(error);
  }
};

OrderListTableLoad();
