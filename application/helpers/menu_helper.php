<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if(!function_exists('menu_anchor')){
    function menu_anchor($uri = '', $title = '', $attributes = ''){
        $title = (string) $title;

        if ( ! is_array($uri)){
            $site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;
        }else{
            $site_url = site_url($uri);
        }

        if ($title == ''){
            $title = $site_url;
        }

        if ($attributes != ''){
            $attributes = _parse_attributes($attributes);
        }
$current_url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $attributes .= ($site_url == $current_url) ? 'class="active"' : 'class="normal"';
        return '<li '.$attributes.'><a href="'.$site_url.'">'.$title.'</a></li>';
    }
}