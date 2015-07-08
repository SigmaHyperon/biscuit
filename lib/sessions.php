<?php
namespace utility\sessions;
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function sessionGet($key,$default)
{
    if(isset($_SESSION[$key]))
    {
	return $_SESSION[$key];
    }
    else
    {
	if(isset($default))
	{
	    return $default;
	}
	else
	{
	    return false;
	}
    }
}

function sessionSet($key,$value)
{
    if((isset($key))&&($key != ""))
    {
	$_SESSION[$key] = $value;
	return true;
    }
    else
    {
	return false;
    }
}