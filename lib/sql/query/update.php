<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace utility\sql\query;

class update extends query
{
    public function update($table)
    {
	if($this->isStage(0))
	{
	    $this->add("UPDATE ".$table);
	    $this->stage = 1;
	    return $this;
	}
	else
	{
	    return false;
	}
    }
    public function set($array)
    {
	if($this->isStage(1))
	{
	    foreach ($array as $key => $value)
	    {
		$this->add($key."=".$value);
	    }
	    $this->stage = 2;
	    return $this;
	}
	else
	{
	    return false;
	}
	
    }
}