<?php

if(!function_exists('public_path'))
{

    /**
     * Return the path to public dir
     * @param null $path
     * @return string
     */
    function public_path($path=null)
    {
        return rtrim(app()->basePath('public/'.$path), '/');
    }
}

if(!function_exists('config_path'))
{
    /**
     * Return the path to config files
     * @param null $path
     * @return string
     */
    function config_path($path=null)
    {
        return app()->getConfigurationPath(rtrim($path, ".php"));
    }
}

if(!function_exists('storage_path'))
{

    /**
     * Return the path to storage dir
     * @param null $path
     * @return string
     */
    function storage_path($path=null)
    {
        return storage_path($path);
    }
}

if(!function_exists('app_path'))
{

    /**
     * Return the path to storage dir
     * @param null $path
     * @return string
     */
    function app_path($path=null)
    {
        return base_path($path);
    }
}
