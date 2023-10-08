<?php


function verificar_autenticacao($path)
{
    if ($_SESSION['autenticado']) {
        return true;
    } else {
        return false;
    }
}


?>