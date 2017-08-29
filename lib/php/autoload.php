<?php

function autoload($nom_classe) 
{
    if(file_exists('lib/classes/' . $nom_classe . '.class.php')) 
	{
        require 'lib/classes/' . $nom_classe . '.class.php';
    } 
}

spl_autoload_register('autoload');
?>

