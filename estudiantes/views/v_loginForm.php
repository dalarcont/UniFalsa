<?php

     function view($value){

        if($value){
            echo '
            <div id="LoginPE">
                    <p><b>Nombre de usuario:</b></p>
                    <p><input id="student" type="text" autocomplete="off"><br></p>

                    <p><b>Contraseña:</b></p>
                    <p><input id="studentp" type="password" autocomplete="off" onkeypress="capLock(event)"></p>
                    <div id="caplock" style="visibility:hidden"><p style="color:red;"><b>Tienes activadas las mayúsculas</b></p></div>
                    <p>&nbsp;
                    <span id="stdR" class="resultadoIndex"></span><br>
                    <button id="execLogin" class="art-button" value="Ingresar">Ingresar</button></p>
                    
                    <p>
                    <i> Primer ingreso: Contraseña es código PIN de inscripción.</i><br>
                    <i> Ingreso por olvido de contraseña: <br>Contraseña es fecha de nacimiento DDMMAAAA.</i></p>
                    <a onclick="LostPass();">¿Olvidaste tu contraseña?</a>
                    <br>
                    <a onclick="Ayuda();">¿Necesitas ayuda?</a>
            </div>
            ';
        }else{
            echo '<p>El acceso al portal no está habilitado en este momento.<br>Intente más tarde.<br>Tenga paciencia.</p>';
        }
        
    }

?>