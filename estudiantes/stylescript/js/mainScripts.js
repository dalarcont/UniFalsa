/**
 * Universidad Falsa - División Superior Sistemas Informáticos
 */

//Sistema de alertas y notificaciones JS AlertifyJS
function Alerta(tipo,titulo,mensaje,notificacionMensaje,redireccionRuta){
    switch(tipo){
        case "Simple":
            alertify.alert(titulo,mensaje);
        break;
        case "Simple_Redir":
            alertify.alert(titulo,mensaje,function(){ location.href=redireccionRuta; });
        break;
        case "SimpleNotificaOK_Redir":
            alertify.alert(titulo,mensaje,function(){ alertify.success(notificacionMensaje); location.href=redireccionRuta; });
        break;
        case "SimpleNotificaNO_Redir":
            alertify.alert(titulo,mensaje,function(){ alertify.error(notificacionMensaje); location.href=redireccionRuta; });
        break;
        case "SimpleNotificaOK":
            alertify.alert(titulo,mensaje,function(){ alertify.success(notificacionMensaje);});
        break;
        case "SimpleNotificaNO":
            alertify.alert(titulo,mensaje,function(){ alertify.error(notificacionMensaje);});
        break;
        case "NotificaOK":
            alertify.success(notificacionMensaje,mensaje,6);
        break;
        case "NotificaNO":
            alertify.error(notificacionMensaje,mensaje,6);
        break;
    }
}

//Mensaje de ayuda para acceso al sistema de información estudiantes
function Ayuda() {
    Alerta("Simple","Ayuda",'<center>Para primer ingreso general: Contraseña es el código PIN de inscripción.<br/><br/>Para quienes olvidaron la contraseña y validaron el acceso a recuperación de la misma, la contraseña es la fecha de nacimiento en formato DDMMAAAA.<br><br/>Para aquellos que cursan un nuevo programa academico la contraseña continúa siendo la última con la que se ingresaba.<center />',null,null);
}


//Evento al click de conectarse
$("#execLogin").click(function() {
    if($("#student").val()=="" || $("#studentp").val()==""){
        alertify.alert('Portal estudiantes','Datos de acceso incompletos.&#10Complete los datos de acceso.');
    }else{
        //Petición de datos
        var a = $("#student").val(); var b = $("#studentp").val();
        $.post("interfaces/invokerAjax.php", {fx:"access",std1:a,std2:b}, function(resultado){
            $("#stdR").html(resultado);
        });
    }
});

//hide/Unhide de los frames de opciones del menú
    //Académico
    $("#f1").click(function(){ 
        if($("#academFrame").is(":visible")){
            $("#academFrame").hide();
        }else{
            $("#academFrame").show();
        }
    });
    //Servicios
    $("#f2").click(function(){ 
        if($("#servicesFrame").is(":visible")){
            $("#servicesFrame").hide();
        }else{
            $("#servicesFrame").show();
        }
    });
    //Solicitudes
    $("#f3").click(function(){ 
        if($("#requestsFrame").is(":visible")){
            $("#requestsFrame").hide();
        }else{
            $("#requestsFrame").show();
        }
    });
    //Personal
    $("#f4").click(function(){ 
        if($("#userFrame").is(":visible")){
            $("#userFrame").hide();
        }else{
            $("#userFrame").show();
        }
    });

//Funciones del menú académico

    /**
     * 
     * Franja académica
     * 
     */
    //Cancelar semestre
    $("#f11").click(function(){ 
        $.post("interfaces/invokerAjax.php", {fx:"f11"}, function(resultado){
            $("#ProcesarAccion").html(resultado);
        })
    //Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
        //Derivados

    //Ajuste de matrícula
    $("#f12").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
        //Derivados
    
    //Plan académico
    $("#f13").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
        //Derivados

    //Historia académica
    $("#f14").click(function(){ 
        $.post("interfaces/invokerAjax.php", {fx:"f14",action:"pre"}, function(resultado){
            $("#ProcesarAccion").html(resultado);
        })
    });
        //Derivados
        function cargaHistorial(){
            var Pgr = $('#historia_ListadoProgramas').val();
            $.post("interfaces/invokerAjax.php", {fx:"f14",action:"do",param:Pgr}, function(resultado){
                $("#returnHistorial").html(resultado);
            })
        }

    //Notas parciales
    $("#f15").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
        //Derivados

    //Horario de clases
    $("#f16").click(function(){ 
        $.post("interfaces/invokerAjax.php", {fx:"f16"}, function(resultado){
            $("#ProcesarAccion").html(resultado);
        })
    });
        //Derivados


    /**
     * 
     * Franja servicios
     * 
     */
    //Certificados
    $("#f21").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
    //Registro financiero
    $("#f22").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
    //Comprar códigos
    $("#f23").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });

    /**
     * 
     * Franja solicitudes
     * 
     */
    //Académicas
    $("#f31").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
    //Financieras
    $("#f32").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
    //Grados
    $("#f33").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
    //PQR Estudiantes
    $("#f34").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });

    /**
     * 
     * Franja personal
     * 
     */
    //Perfil
    $("#f41").click(function(){ 
        $.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
            $("#ProcesarAccion").html(resultado);
        })
    });
    //Reporte disciplinar
    $("#f42").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
    //Actualizar datos
    $("#f43").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });
    //Cambiar contraseña
    $("#f44").click(function(){ 
    /*$.post("interfaces/invokerAjax.php", {fx:"f41"}, function(resultado){
        $("#ProcesarAccion").html(resultado);
    })*/
    Alerta("Simple","DSSI","Sección en desarrollo.",null,null);
    });

//Funciones auxiliares
    //Cancelar semestre
    function unsetSemesterOpt(){
        var idp = $('#unsetPeriodo option:selected').val();   //Obtener el valor del elemento seleccionado en la lista
        $.post("interfaces/invokerAjax.php",{fx:"preUnset",idp:idp}, function(resultado){
            $("#preUnsetResult").html(resultado);
        });
    }

    function unsetSemesterDo(){
        Alerta("Simple_Redir","Prueba de función","Se detecta con exito esta acción de solicitud.<br />Se le enviará a la página principal.",null,'./');
    }
        
