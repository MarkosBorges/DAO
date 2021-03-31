<?php

spl_autoload_register(function($class_name){ //função de autoload standard php library

	$filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";// arquivos na pasta class

	if(file_exists(($filename))) {
		require_once($filename);
	}
});



?>