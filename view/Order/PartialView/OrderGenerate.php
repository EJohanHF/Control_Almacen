<?php //require dirname(__DIR__, 1) . "/layout/header.php"; 
?>

<style>
   .linea {
      border-color: inherit;
      border-style: none;
      border-width: 0;
   }

   .select2-container {
      left: 0.5rem !important;
   }
</style>


<div class="offcanvas offcanvas-end overflow-auto" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" aria-modal="true" role="dialog">

   <div class="ibox">
      <div class="ibox-title">
         <span class="float-end">(<strong>1</strong>) Productos</span>
         <h5>Orden del pedido</h5>
      </div>
      <div class=" ">
         <Span class="mx-2 fw-semibold">Empresa</Span>
         <select class="select2_demo_1 form-control float-star" id="OrdGnCostumer" style="width: 95% ">
         <!--List Dinamica-->
         </select>   
      </div>
      <span id="ordGnTotal" class="float-end me-3  fs-4  mt-4  fw-semibold"></span>


      <div class="ibox-content">
         <div class="table-responsive ">
            <table class="table shoping-cart-table">
               <tbody class="linea" id="cartdata">
                  <!-- <tr>
                     <td width="90" class="linea">
                        <div class="cart-product-imitation">
                        </div>
                     </td>
                     <td width="30%" class="linea">
                        <p class="fs-6">
                           Desktop publishing software
                        </p>
                        <div class="m-t-sm">
                           <a class="text-muted"><i class="fa fa-trash"></i> Eliminar</a>
                        </div>
                     </td>
                     <td width="17%" class="linea">
                        $180,00

                     </td>
                     <td width="70" class="linea">
                        <input id="carProdCantidad" width="65" type="text" class="form-control text-center" placeholder="1">
                        
                     </td>
                     <td class="linea">
                        <h4>
                           $180,00
                        </h4>
                     </td>
                  </tr> -->
               </tbody>
            </table>
         </div>
      </div>

   </div>
</div>





<script>
   const CartlocalKeyheader = "keyCart";
   const cartheader = document.querySelector('#cartheader');

   cartheader.addEventListener('click', () => {
      LoadDataCart();
   });


   const DeleteProductToCart = (idProduct) => {
      let cart = [];
      cart = JSON.parse(localStorage.getItem(CartlocalKey));
      cart = cart.filter((productKey) => productKey.id != idProduct);
      localStorage.setItem(CartlocalKey, JSON.stringify(cart));
      LoadDataCart();
   };

   const LoadDataCart = () => {

      let trdata = '';
      let countprod = 0;
      let Total = 0
      JSON.parse(localStorage.getItem(CartlocalKeyheader)).forEach(product => {
         tr = '<tr id="' + product.id + '">' +
            '<td width="30%" class="linea">' +
            ' <p class="fs-6">' +
            product.name +
            '</p>' +
            '<div class="m-t-sm cursor">' +
            '<a onclick="DeleteProductToCart(' +
            product.id +
            ');" class="text-muted"><i class="fa fa-trash"></i> Eliminar</a>' +
            '</div>' +
            '</td>' +
            '<td width="17%" class="linea">S/.' +
            (product.precio).toFixed(2) +

            '</td>' +
            '<td width="70" class="linea">' +
            '<input id="carProdCantidad" ' +
            ' width="65" value="' +
            product.cantidad +
            '" type="text" class="form-control text-center" placeholder="1">' +
            '</td>' +
            '<td class="linea">' +
            '<p class="fs-6">S/.' +
            (product.cantidad * product.precio).toFixed(2) +
            '</p>' +
            '</td>' +
            '</tr>'
         trdata += tr;
         countprod += 1;
         Total += (product.cantidad * product.precio)

      });

      const cartdata = document.querySelector('#cartdata');
      cartdata.innerHTML = trdata;

      document.getElementById('countprod').innerText = countprod;
      document.getElementById('ordGnTotal').innerText = "Total: S/. " + Total.toFixed(2)


      if (JSON.parse(localStorage.getItem(CartlocalKeyheader))) {
         document.querySelectorAll("#carProdCantidad").forEach(element => {
            element.addEventListener("keyup", (event) => {
               let pordID = ((event.target).parentNode.parentNode.id);
               let procCantidad = (event.target).value;
               productCantidad(pordID, procCantidad);
               LoadDataCart();
            });
         });
      }

   };

   const productCantidadValue = () => {

   }

   const productCantidad = (id, cantidad) => {

      let cart = JSON.parse(localStorage.getItem(CartlocalKeyheader));
      let cartindexarry = cart.findIndex(key => key.id == id)
      let cartfilter = cart.filter(prod => prod.id == id);
      //cart = cart.filter(prod => prod.id != id);
      let obj = {};
      cartfilter.forEach(item => {
         obj.id = item.id;
         obj.precio = item.precio;
         obj.name = item.name;
         obj.cantidad = cantidad;
      });


      cart.splice(cartindexarry, 1, obj);

      localStorage.setItem(CartlocalKeyheader, JSON.stringify(cart));

   }

//Select - Recuperar Empleado del Local Storage
   if (localStorage.getItem('CostumerKey')) {

      const CostumerGenKey = JSON.parse(localStorage.getItem('CostumerKey'));
      const Seletedoption = `<option value="${CostumerGenKey.id}" selected="selected">${CostumerGenKey.text}</option>`;
      const as = document.getElementById('OrdGnCostumer').innerHTML = Seletedoption;
   }

//Select - Solicitudes de extraccion de informacion mienstras Escibe
   $(".select2_demo_1").select2({
      dropdownParent: $('#offcanvasRight '),

      ajax: {
         url: 'http://localhost/control_almacen/Controller/Customer/CustomerController.php',
         type: 'POST',
         data: function(params) {
            var query = {
               data: params.term != undefined ? params.term : "",
               method: 'CostumerList'
            }


            console.log(query);
            // Query parameters will be ?search=[term]&type=public
            return query;
         },


         processResults: function(data) {

            return {
               results: JSON.parse(data)
            };
         }


      }
   });


   const CostumerOrderKey = "CostumerKey";
   var $eventSelect = $(".select2_demo_1");
// Select Cada Vez que Seleciona un empleado de la lista se almacena en el local storage
   $eventSelect.on("select2:select", function(e) {

      localStorage.setItem(CostumerOrderKey, JSON.stringify({
         id: e.params.data.id,
         text: e.params.data.text
      }));



      console.log(JSON.stringify(e.params.data.id));
   });





   // $eventSelect.on("select2:unselect", function (e) { console.log("select2:unselect", e); });
</script>
<?php //require dirname(__DIR__, 1) . "/layout/footer.php"; 
?>