    /*
    * Crear arbol
    */
    document.addEventListener('DOMContentLoaded', function() {
    let formulario = document.querySelector("#formularioCitas");
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {

        weekends: false,
        showNonCurrentDates: false,

        views: {
            dayGridMonth: {
              titleFormat: { year: 'numeric', month: 'long' },
            }
          },
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listMonth',
        },
        footerToolbar:true,
        buttonText: {
            today:    'Ahora',
            month:    'Mes',
            week:     'Semana',
            day:      'Día',
            list:     'Lista mes'
        },
        locale:'es',
        displayEventTime:false,
        firstDay: 1,

        eventSources: [{
            url: baseURL+"/cita/mostrar",
            method:"POST",
            extraParams: {
                _token: formulario._token.value,
            },
        }],

    dateClick:function(info){
        $('#btnGuardar').prop("disabled",false);
        $('#btnModificar').prop("disabled",true);
        $('#btnEliminar').prop("disabled",true);

        formulario.reset();
        formulario.start.value=info.dateStr;
        // formulario.end.value=info.dateStr;
        $("#cita").modal("show");
        // console.log(formulario.start.value);
        // console.log(formulario.end.value);
    },

    eventClick:function (info) {
        var cita = info.event;
        console.log(cita);
        $('#btnGuardar').prop("disabled",true);
        $('#btnModificar').prop("disabled",false);
        $('#btnEliminar').prop("disabled",false);

        /*
        * Consultar datos
        */
       axios.post(baseURL+"/cita/editar/" + info.event.id).
       then(
           (respuesta) => {
               formulario.id.value = respuesta.data.id;
               formulario.title.value = respuesta.data.title;
               formulario.description.value = respuesta.data.description;
               formulario.start.value = respuesta.data.start;
               formulario.end.value = respuesta.data.end;
               $("#cita").modal("show");
            }
        ).catch(
            error => {
                if (error.response){console.log(error.response.data);}
        })
    }
});

    calendar.render();

    /*
    * Guardar datos
    */
    if(calendar)
    document.getElementById("btnGuardar").addEventListener("click",function(){
        enviarDatos("/cita/agregar");
    });

    /*
    * Modificar datos
    */
    document.getElementById("btnModificar").addEventListener("click", function(){
        enviarDatos("/cita/actualizar/"+formulario.id.value);
    });

    /*
    * Eliminar datos
    */
    document.getElementById("btnEliminar").addEventListener("click", function(){
        enviarDatos("/cita/borrar/"+formulario.id.value);
    });

    /*
    * Funcion procesar datos
    */
    function enviarDatos(url){
        const datos = new FormData(formulario);
        const nuevaURL = baseURL + url;
        axios.post(nuevaURL, datos).
        then(
            (respuesta) => {calendar.refetchEvents();
                $("#cita").modal("hide");
            }
            ).catch(error => {
                if (error.response){console.log(error.response.data);}
            });
        }
});
