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
      <div class=" mb-2 ">
         <Span class="mx-2 fw-semibold">Empresa</Span>
         <select class="select2_demo_1 form-control float-star" id="OrdGnCostumer" style="width: 95% ">
         <!--List Dinamica-->
         </select>   
      </div>
      <button class="btn btn-success mx-2 mt-3 btnGnrPd"> Generar Peido </button>
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







 <script src="../../../Control_Almacen/js/Order/OrderGenerate.js"></script> 
<?php //require dirname(__DIR__, 1) . "/layout/footer.php"; 
?>