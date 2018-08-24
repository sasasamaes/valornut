function enviarClave(){


2);


    $.post("../Payments/saveKeyTransaction",{clave:1} ,function (data) {
        //$("#respuesta").val(data[0].nombre);
        
        $.each(data, function (i, item) {

            //console.log("Result " + item.nombre);
            var option = $(document.createElement('option'));

            option.text(item.nombre);
            option.val(item.codPais);

            $("#comboPais").append(option);
        });

        console.log("seleccionar el pais");

         
        seleccionarInfoCombo("comboPais", codigoPais);

        
       
    }, "json");



}