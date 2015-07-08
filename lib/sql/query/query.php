<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace utility\sql\query;

class query
{
    protected $string = "";
    protected $stage = 0;
    protected $minStage = 0;
    public function query()
    {
	if($this->stage >= $this->minStage)
	{
	    return $this->string;
	}
	else
	{
	    return false;
	}
    }
    protected function add($string)
    {
	$this->string .= $string." ";
    }
    protected function isStage($stage)
    {
	return $this->stage === $stage;
    }
    protected function isMinStage($stage)
    {
	return $this->stage >= $stage;
    }
}

