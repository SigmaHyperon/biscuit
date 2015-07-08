<?php

namespace utility\forms;
/**
 * returns a value from $_GET applying basic xss protection
 * (probably not that safe)
 * 
 * @param string $key
 * @param mixed $default defualt value that should be returned in case of missing values
 * @return boolean
 */
function get($key,$default)
{
    if(isset($_GET[$key]))
    {
	return htmlspecialchars($_GET[$key]);
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
/**
 * returns a value from $_POST applying basic xss protection
 * (probably not that safe)
 * 
 * @param string $key
 * @param mixed $default defualt value that should be returned in case of missing values
 * @return boolean
 */
function post($key,$default)
{
    if(isset($_POST[$key]))
    {
	return htmlspecialchars($_POST[$key]);
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
/**
 * Form Handler
 */
class form
{
    private $started = false;
    private $hasSubmit = false;
    private $finished = false;
    /**
     * starts the form
     * (required)
     * 
     * @param string $action PATH
     * @param string $method get|post
     * @return \utility\forms\form
     */
    public function start($action, $method)
    {
	$additional = "";
	if((isset($action))&&($action != ""))
	{
	    $additional .= "action='".$action."' ";
	}
	if((isset($method))&&($method != ""))
	{
	    $additional .= "method='".$method."' ";
	}
	\utility\html\openTag("form", "", $additional);
	echo "\n";
	$this->started = true;
	return $this;
    }
    /**
     * adds an Input to the form
     * (a started form is required)
     * 
     * @param string $type text|radio|checkbox
     * @param string $name name you need to access the value in GET/POST
     * @param string $value initial value
     * @return \utility\forms\form|boolean
     */
    public function addInput($type,$name,$value)
    {
	if((!$this->started)||(!isset($name))||($name=="")||(!isset($type)||($type == "")))
	{
	    return FALSE;
	}
	$additional = "type='".$type."' name='".$name."'";

	if((isset($value))&&($value != ""))
	{
	    $additional .= " value='".$value."'";
	}
	\utility\html\singleTag("input", "", $additional);
	echo "\n";
	return $this;
    }
    /**
     * adds a submit button
     * (required to finish the form)
     * 
     * @return \utility\forms\form
     */
    public function addSubmit()
    {
	\utility\html\singleTag("input", "", "type='submit' value='Submit'");
	echo "\n";
	$this->hasSubmit = true;
	return $this;
    }
    /**
     * adds a reset button
     * 
     * @return \utility\forms\form
     */
    public function addReset()
    {
	\utility\html\singleTag("input", "", "type='reset' value='Reset'");
	echo "\n";
	return $this;
    }
    /**
     * closes/finishes the form
     * 
     * @return \utility\forms\form|boolean
     */
    public function finish()
    {
	if((!$this->started))
	{
	    return false;
	}
	\utility\html\closeTag("form");
	echo "\n";
	$this->started = false;
	$this->finished = true;
	return $this;
    }
}
/**
 * Select Handler
 */
class select
{
    private $started = false;
    private $finished = false;
    /**
     * starts the select
     * 
     * @param string $name name you need to access the value in GET/POST
     * @return boolean|\utility\forms\select
     */
    public function start($name)
    {
	if((!isset($name))||($name==""))
	{
	    return FALSE;
	}
	\utility\html\openTag("select", "", "name='".$name."'");
	$this->started = true;
	return $this;
    }
    /**
     * adds an option
     * 
     * @param string $text Value
     * @param boolean $selected if the added option should be the default value
     * @return boolean|\utility\forms\select
     */
    public function addOption($text,$selected)
    {
	if((!$this->started)||(!isset($text))||($text==""))
	{
	    return FALSE;
	}
	$additional = "";
	if($selected == true)
	{
	    $additional = "selected='selected'";
	}
	\utility\html\openTag("option", "", $additional);
	echo $text;
	\utility\html\closeTag("option");
	echo "\n";
	return $this;
    }
    /**
     * closes/finishes the select
     * 
     * @return \utility\forms\select
     */
    public function finish()
    {
	\utility\html\closeTag("select");
	echo "\n";
	$this->started = false;
	$this->finished = true;
	return $this;
    }
}

