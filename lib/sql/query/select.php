<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace utility\sql\query;

class select extends query
{
    public function __construct()
    {
	$this->minStage = 2;
    }
    
    /**
     * 
     * 
     * @param type $cols
     * @return boolean|\utility\sql\query\select
     */
    public function select($cols = "*")
    {
	if($this->stage == 0)
	{
	    $this->add("SELECT ".$cols);
	    $this->stage = 1;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    public function from($table)
    {
	if($this->stage == 1)
	{
	    $this->add("FROM ".$table);
	    $this->stage = 2;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    public function where($condition)
    {
	if($this->stage >= 2)
	{
	    $this->add("WHERE ".$condition);
	    $this->stage = 3;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    public function order($col, $direction)
    {
	if($this->stage >= 2)
	{
	    $this->add("ORDER BY ".$col);
	    if($direction == true)
	    {
		$this->add("ASC");
	    }
	    else
	    {
		$this->add("DESC");
	    }
	    $this->stage = 1;
	}
	else
	{
	    return false;
	}
	return $this;
    }
}