<?php

namespace utility\sessions;

session_start();

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