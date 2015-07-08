<?php

namespace utility\html;

/**
 * opens a html tag with optional class and attributes
 * 
 * @param type $tag	    tag name
 * @param type $class	    tag class attribute
 * @param type $additional  tag additional attributes
 */
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

/**
 * closes a html tag
 * 
 * @param type $tag	tag name
 */
function closeTag($tag)
{
    if((isset($tag))&&($tag != ""))
    {
	echo "</".$tag.">";
    }
}

/**
 * opens a html tag with optional class and attributes like <input/> or <image/>
 * 
 * @param type $tag	    tag name
 * @param type $class	    tag class attribute
 * @param type $additional  tag additional attributes
 */
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