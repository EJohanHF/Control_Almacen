const busqueda = document.querySelector("#busqueda");

busqueda.addEventListener("keyup", () => {
  ProductListTable(busqueda.value, 0);
});

const ProductListTable = (busqueda, page) => {
  $.ajax({
    data: {
      busqueda: busqueda,
      page: page,
    },
    method: "POST",
    url: "./PartialView/ProductListTable.php",

    success: (data) => {
      document.getElementById("ProductListTable").innerHTML = data;
    },
  });
};

window.addEventListener("load", () => {
  ProductListTable("", 0);
});

const CartlocalKey = "keyCart";

const AddProductToCart = (id, precio, name) => {
  let cart = [];
  var localobj = {
    id: id,
    precio: precio,
    name: name,
    cantidad: 1,
  };
  if (localStorage.getItem(CartlocalKey)) {
    let getCart = JSON.parse(localStorage.getItem(CartlocalKey));
    let objCart = getCart.filter((prod) => prod.id == id);
    if (objCart) {
      getCart = getCart.filter((prod) => prod.id != id);
      objCart.forEach((prod) => {
        localobj.id = prod.id;
        localobj.precio = prod.precio;
        localobj.name = prod.name;
        localobj.cantidad =   parseFloat(prod.cantidad) + 1;
      });
      getCart.push(localobj);
      localStorage.setItem(CartlocalKey, JSON.stringify(getCart));
    } else {
      getCart.push(localobj);
      localStorage.setItem(CartlocalKey, JSON.stringify(getCart));
    }
  } else {
    cart.push(localobj);
    localStorage.setItem(CartlocalKey, JSON.stringify(cart));
  }
  document.getElementById('countprod').innerHTML =  JSON.parse( localStorage.getItem('keyCart')).length;
  //cart = JSON.parse(localStorage.getItem(CartlocalKey));
  // cart.push({
  //   id: id,
  //   precio: precio,
  //   name: name,
  //   cantidad: 1,
  // });
  // localStorage.setItem(CartlocalKey, JSON.stringify(cart));
};

// const DeleteProductToCart = (idProduct) => {
//   let cart = [];
//   cart = JSON.parse(localStorage.getItem(CartlocalKey));
//   cart.filter((productKey) => productKey.id != idProduct);
//    localStorage.setItem(CartlocalKey, JSON.stringify(cart));
// };
