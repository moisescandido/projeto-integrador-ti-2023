<?php


function verificar_autenticacao($path)
{
    if (!$_SESSION['autenticado']) {
        return false;
    } else {
        return true;
    }
}


?>