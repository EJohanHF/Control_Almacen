// add product local storage
consol.log('asd');
debugger;
const IDCART = "Cart";

const BtnCart = document.querySelector("#bntcart");

  BtnCart.addEventListener("click", () => {
    debugger;
    console.log("asd");
  });

const AddProductToCart = () => {
  // let cart = []
  // cart = localStorage.getItem(IDCART);
  // localStorage.setItem('cart',JSON.stringify(asd));
};

const DeleteProductToCart = () => {
  var asd = [
    { asd: 12, name: "asd" },
    { asd: 13, name: "123" },
  ];

  console.log(asd.filter((product) => product.asd != 12));
};
