/* Universidad Falsa - División Superior de Sistemas Informáticos - 2018 */


/* Impedimento de campos vacíos al momento de acceder al portal*/

    function LogPE(FormLogin) {

        if(FormLogin.ID.value.length==0) {
            FormLogin.ID.focus();
            alertify.alert('Acceso SMP','Por favor indica tu documento de identidad.');
            //alert('Por favor indica documento de identidad!');
            return false;
        }

        if(FormLogin.PASS.value.length==0) {
            FormLogin.PASS.focus();
            alertify.alert('Acceso SMP','Por favor indica tu contraseña.');
            //alert('Por favor indica contraseña!');
            return false;
        }


        return true;
    }

/* Impedimento de campos vacíos al momento de acceder al SMP */

    function LogSMP(FormLogin) {

        if(FormLogin.ID.value.length==0) {
            FormLogin.ID.focus();
            alertify.alert('Acceso SMP','Por favor indica tu documento de identidad.');
            //alert('Por favor indica documento de identidad!');
            return false;
        }

        if(FormLogin.PASS.value.length==0) {
            FormLogin.PASS.focus();
            alertify.alert('Acceso SMP','Por favor indica tu código PIN.');
            //alert('Por favor indica contraseña!');
            return false;
        }


        return true;
    }

function MessageToStaff(formSend) {
        if(formSend.TYPE.value=='null') {
            //alert('Por favor indica la relevancia del mensaje!');
            //alertify.alert('Tickets estudiantiles','Por favor indica la dependencia.');
            document.getElementById('alert').innerHTML='<big>POR FAVOR INDICA LA DEPENDENCIA.</big>';
            formSend.TYPE.focus();
            return false;
        }
        if(formSend.MSG.value.length<=29) {
            //alert('Por favor escribe tu mensaje!');
            //alertify.alert('Tickets estudiantiles','Por favor escribe tu mensaje, procura que sea un mensaje largo, mínimo 30 caractéres.');
            document.getElementById('alert').innerHTML='<big>POR FAVOR ESCRIBE TU MENSAJE, PROCURA QUE SEA UN MENSAJE LARGO, MÍNIMO 30 CARACTÉRES.</big>';
            formSend.MSG.focus();
            return false;
        }
        else
        {
            if(formSend.MSG.value.length>850){
                document.getElementById('alert').innerHTML='<big>POR FAVOR, QUE TU MENSAJE NO EXCEDA LOS 850 CARACTÉRES..</big>';
            formSend.MSG.focus();
            return false;
            }
        }
    }
