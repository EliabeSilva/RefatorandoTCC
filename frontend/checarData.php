<?php
   //checar data
   $frag = explode('/', $datanasc);
   $dia = $frag[0];
   $mes = $frag[1];
   $ano = $frag[2];
   $validarData = checkdate($mes, $dia, $ano);

   //
?>
