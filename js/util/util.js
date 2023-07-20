const basePahtjs = "http://localhost/control_almacen/";
const swalInfo = (title,text,icon, url) => {
        swal({
            title: title,
            text: text,
            icon: icon,
          }).then(()=>{
            if (url !=="")
                window.location.href = url;
          });
    }

