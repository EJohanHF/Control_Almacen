const CartlocalKeyheader = "keyCart";
const cartheader = document.querySelector("#cartheader");

cartheader.addEventListener("click", () => {
  LoadDataCart();
});

const DeleteProductToCart = (idProduct) => {
  let cart = [];
  cart = JSON.parse(localStorage.getItem(CartlocalKeyheader));
  cart = cart.filter((productKey) => productKey.id != idProduct);

  switch (cart.length) {
    case 0:
      localStorage.removeItem(CartlocalKeyheader);
      break;

    default:
      localStorage.setItem(CartlocalKeyheader, JSON.stringify(cart));

      break;
  }
  LoadDataCart();
};

const LoadDataCart = () => {
  let trdata = "";
  let countprod = 0;
  let Total = 0;
  if (localStorage.getItem(CartlocalKeyheader)) {
    JSON.parse(localStorage.getItem(CartlocalKeyheader)).forEach((product) => {
      tr =
        '<tr id="' +
        product.id +
        '">' +
        '<td width="30%" class="linea">' +
        ' <p class="fs-6">' +
        product.name +
        "</p>" +
        '<div class="m-t-sm cursor">' +
        '<a onclick="DeleteProductToCart(' +
        product.id +
        ');" class="text-muted"><i class="fa fa-trash"></i> Eliminar</a>' +
        "</div>" +
        "</td>" +
        '<td width="17%" class="linea">S/.' +
        product.precio.toFixed(2) +
        "</td>" +
        '<td width="70" class="linea">' +
        '<input id="carProdCantidad" ' +
        ' width="65" value="' +
        product.cantidad +
        '" type="text" class="form-control text-center" placeholder="1">' +
        "</td>" +
        '<td class="linea">' +
        '<p class="fs-6">S/.' +
        (product.cantidad * product.precio).toFixed(2) +
        "</p>" +
        "</td>" +
        "</tr>";
      trdata += tr;
      countprod += 1;
      Total += product.cantidad * product.precio;
    });
  }

  const cartdata = document.querySelector("#cartdata");
  cartdata.innerHTML = trdata;

  document.querySelector("#countprod").innerText = countprod;
  document.querySelector("#ordGnTotal").innerText =
    "Total: S/. " + Total.toFixed(2);

  if (JSON.parse(localStorage.getItem(CartlocalKeyheader))) {
    document.querySelectorAll("#carProdCantidad").forEach((element) => {
      element.addEventListener("keyup", (event) => {
        let pordID = event.target.parentNode.parentNode.id;
        let procCantidad = event.target.value;
        productCantidad(pordID, procCantidad);
        LoadDataCart();
      });
    });
  }
};

const productCantidadValue = () => {};

const productCantidad = (id, cantidad) => {
  let cart = JSON.parse(localStorage.getItem(CartlocalKeyheader));
  let cartindexarry = cart.findIndex((key) => key.id == id);
  let cartfilter = cart.filter((prod) => prod.id == id);
  //cart = cart.filter(prod => prod.id != id);
  let obj = {};
  cartfilter.forEach((item) => {
    obj.id = item.id;
    obj.precio = item.precio;
    obj.name = item.name;
    obj.cantidad = cantidad;
  });

  cart.splice(cartindexarry, 1, obj);

  localStorage.setItem(CartlocalKeyheader, JSON.stringify(cart));
};

const CostumerOrderKey = "CostumerKey";

//Select - Recuperar Empleado del Local Storage
if (localStorage.getItem(CostumerOrderKey)) {
  const CostumerGenKey = JSON.parse(localStorage.getItem(CostumerOrderKey));
  const Seletedoption = `<option value="${CostumerGenKey.id}" selected="selected">${CostumerGenKey.text}</option>`;
  const as = (document.getElementById("OrdGnCostumer").innerHTML =
    Seletedoption);
}

//Select - Solicitudes de extraccion de informacion mienstras Escibe
$(".select2_demo_1").select2({
  dropdownParent: $("#offcanvasRight "),

  ajax: {
    url: "http://localhost/control_almacen/Controller/Customer/CustomerController.php",
    type: "POST",
    data: function (params) {
      var query = {
        data: params.term != undefined ? params.term : "",
        method: "CostumerList",
      };

      console.log(query);
      // Query parameters will be ?search=[term]&type=public
      return query;
    },

    processResults: function (data) {
      return {
        results: JSON.parse(data),
      };
    },
  },
});

var $eventSelect = $(".select2_demo_1");
// Select Cada Vez que Seleciona un empleado de la lista se almacena en el local storage
$eventSelect.on("select2:select", function (e) {
  localStorage.setItem(
    CostumerOrderKey,
    JSON.stringify({
      id: e.params.data.id,
      text: e.params.data.text,
    })
  );

  console.log(JSON.stringify(e.params.data.id));
});

// Generar Pedido
document.querySelector(".btnGnrPd").addEventListener("click", async () => {
  if (
    localStorage.getItem(CostumerOrderKey) &&
    localStorage.getItem(CartlocalKeyheader)
  ) {
    const orderCostumer = JSON.parse(localStorage.getItem(CostumerOrderKey));
    const orderProduct = JSON.parse(localStorage.getItem(CartlocalKeyheader));

    const response = await fetch(
      "http://localhost/control_almacen/controller/Order/OrderController.php",
      {
        method: "POST",
        body: JSON.stringify({
          method: "OrderCreate",
          orderHeader: orderCostumer,
          orderBody: orderProduct,
        }),
      }
    );
    const state = await response.text();
    //Pendiente
    console.log(state);
    OrderListTableLoad();
  }
});
