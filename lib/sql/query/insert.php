<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace utility\sql\query;

class insert extends query
{
    public function __construct() {
	$this->minStage = 0;
    }
    public function insert($table)
    {
	if($this->isStage(0))
	{
	    $this->add("INSERT INTO ".$table);
	    $this->stage = 1;
	    return $this;
	}
	else
	{
	    return false;
	}
    }
    public function columns($array)
    {
	if($this->isMinStage(1))
	{
	    $this->add("(");
	    if(is_array($array))
	    {
		$this->add(\utility\arrays\array_csv($array));
	    }
	    else
	    {
		$this->add($array);
	    }
	    $this->add(")");
	    return $this;
	}
	else 
	{
	    return false;
	}
    }
    public function values($array)
    {
	if($this->isMinStage(1))
	{
	    $this->add("Values (");
	    if(is_array($array))
	    {
		$this->add(\utility\arrays\array_csv($array));
	    }
	    else
	    {
		$this->add($array);
	    }
	    $this->add(")");
	    return $this;
	}
	else 
	{
	    return false;
	}
    }
    public function fromObject($object)
    {
	if(($this->isStage(1))&&is_object($object))
	{
	    $this->columns(array_keys(get_object_vars($object)));
	    $this->values(array_keys(get_object_vars($object)));
	}
    }
}