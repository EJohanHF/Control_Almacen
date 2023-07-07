const busqueda = document.querySelector('#busqueda');
busqueda.addEventListener('keyup', () => {

    ProductListTable(busqueda.value, 0);
})

const ProductListTable = (busqueda, page) => {

    $.ajax({
        data: {
            busqueda: busqueda,
            page: page
        },
        method: "POST",
        url: "./PartialView/ProductListTable.php",

        success: (data) => {
            document.getElementById("ProductListTable").innerHTML = data;

        }


    })

}

window.addEventListener('load', () => {
    ProductListTable("", 0);
});

