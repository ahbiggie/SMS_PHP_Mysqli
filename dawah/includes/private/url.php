<?php

/**
 * Redirect to an absolute URL
 *
 * Tedirect to another url on the same site
 *
 * @param string $path the path to redirect to
 * @return void
 * 
 **/
function redirect($path)
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
        $protocol = 'https';
        
    } else {
        $protocol = 'http';
    } 
    header("Location: $protocol://" . $_SERVER['HTTPS_HOST'] . $path);
    exit;
}