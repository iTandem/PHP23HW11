<?php
    
    spl_autoload_register(function ($classNameWithNamespace)
    {
        $pathToFile = __DIR__.'/Classes/'.str_replace('\\', DIRECTORY_SEPARATOR, $classNameWithNamespace).'.php';
        if (file_exists($pathToFile)) {
            require_once "$pathToFile";
        }
    }
    );
    
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 03.06.2018
     * Time: 16:54
     */