<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace utility\html;

function openTag($tag, $class = "", $additional = "")
{
    if((isset($tag))&&($tag != ""))
    {
	echo "<".$tag;
	if((isset($class))&&($class != ""))
	{
	    echo " class='".$class."'";
	}
	if((isset($additional))&&($additional != ""))
	{
	    echo " ".$additional;
	}
	echo ">";
    }
}

function closeTag($tag)
{
    if((isset($tag))&&($tag != ""))
    {
	echo "</".$tag.">";
    }
}

function singleTag($tag, $class, $additional)
{
        if((isset($tag))&&($tag != ""))
	{
	    echo "<".$tag;
	    if((isset($class))&&($class != ""))
	    {
		echo " class='".$class."'";
	    }
	    if((isset($additional))&&($additional != ""))
	    {
		echo " ".$additional;
	    }
	    echo "/>";
	}
}