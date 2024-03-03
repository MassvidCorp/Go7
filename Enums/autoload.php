<?php
spl_autoload_register('Enumsautoloader');
function Enumsautoloader($className)
{
    $path = __DIR__."/$className.php";
    if(file_exists($path))
    {
       require_once $path;
    }
}