    /* Seleccionamos formulario y ponemos a la escucha el evento submit para la funcion
     de validación */
    document.getElementById("formCheckout").addEventListener("submit", function (event) {
        // Datos de tarjeta
        card = document.getElementById('option2');
        c1 = document.getElementById('card_number');
        c2 = document.getElementById('card_ex_month');
        c3 = document.getElementById('card_ex_year');
        c4 = document.getElementById('card_ccv');
        c5 = document.getElementById('card_title');

        // Valores validos
        var regNumber = /^[0-9]{16}$/;
        var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
        var regYear = /^18|19|20|21|22|23|24|25|26|27|28|29|30$/;
        var regCVV = /^[0-9]{3,3}$/;
        var regTitle = /^[a-z ñ,.'-]+$/;

        if (card.checked) {
            //alert('Has seleccionado tarjeta');

            if (!regNumber.test(c1.value)){
                alert('Numero de tarjeta inválido');
                setTimeout(function(){c1.focus();}, 1);
                hasError = true;
            }
            if (!regMonth.test(c2.value)){
                alert('Mes de expiración de tarjeta inválido');
                setTimeout(function(){c2.focus();}, 1);
                hasError = true;
            }
            if (!regYear.test(c3.value)){
                alert('Año de expiración de tarjeta inválido');
                setTimeout(function(){c3.focus();}, 1);
                hasError = true;
            }
            if (!regCVV.test(c4.value)){
                alert('Numero de seguridad de tarjeta inválido');
                setTimeout(function(){c4.focus();}, 1);
                hasError = true;
            }
            if (!regTitle.test(c5.value)){
                alert('Nombre de titular de tarjeta inválido');
                setTimeout(function(){c5.focus();}, 1);
                hasError = true;
            }
    }

    // Si existe algún error no procede el pago
        if (hasError){
            event.preventDefault();
        }
        else{
            hasError = false;
        }
    });
