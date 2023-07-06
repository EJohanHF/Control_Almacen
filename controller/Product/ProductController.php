<?php

require dirname(__DIR__, 2) . '/model/Product/ProductModel.php';

class ProductController{

    function ProductList ($busqueda){
        $ProductModel = new ProductModel();
        
        return $ProductModel->ProductList($busqueda);
    }

}

