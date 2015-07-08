<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace utility\tables;

/**
 * table handler
 */
class table
{
    private $started = false;
    private $rowstarted = false;
    private $cellstarted = false;
    /**
     * starts the table
     * 
     * @return \utility\tables\table|boolean
     */
    public function start($border = false)
    {
	if($this->started == false)
	{
	    if(!$border)
	    {
		\utility\html\openTag("table");
	    }
	    else
	    {
		\utility\html\openTag("table", "", "border='1'");
	    }
	    echo "\n";
	    $this->started = true;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    
    /**
     * ends the table
     * 
     * @return \utility\tables\table|boolean
     */
    public function end()
    {
	if(($this->started == true)&&($this->rowstarted == false)&&($this->cellstarted == false))
	{
	    \utility\html\closeTag("table");
	    echo "\n";
	    $this->started = false;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    
    /**
     * starts a new row
     * 
     * @return \utility\tables\table|boolean
     */
    public function startRow($class = "")
    {
	if(($this->started == true)&&($this->rowstarted == false))
	{
	    echo "\t";
	    \utility\html\openTag("tr", $class);
	    echo "\n";
	    $this->rowstarted = true;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    
    /**
     * ends a row
     * 
     * @return \utility\tables\table|boolean
     */
    public function endRow()
    {
	if($this->rowstarted == true)
	{
	    echo "\t";
	    \utility\html\closeTag("tr");
	    echo "\n";
	    $this->rowstarted = false;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    
    /**
     * starts a new cell
     * 
     * @return \utility\tables\table|boolean
     */
    public function startCell()
    {
	if(($this->rowstarted == true)&&($this->cellstarted == false))
	{
	    echo "\t\t";
	    \utility\html\openTag("td");
	    $this->cellstarted = true;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    
    /**
     * adds a cell content
     * 
     * @param string $string
     * @return \utility\tables\table|boolean
     */
    public function printCellContent($string)
    {
	if(($this->cellstarted == true)&&(isset($string)))
	{
	    echo $string;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    
    /**
     * ends a cell
     * 
     * @return \utility\tables\table|boolean
     */
    public function endCell()
    {
	if($this->cellstarted == true)
	{
	    \utility\html\closeTag("td");
	    echo "\n";
	    $this->cellstarted = false;
	}
	else
	{
	    return false;
	}
	return $this;
    }
    
    /**
     * adds a cell containing $string
     * 
     * @param string $string
     * @return \utility\tables\table
     */
    public function addCell($string)
    {
	$this->startCell();
	$this->printCellContent($string);
	$this->endCell();
	return $this;
    }
    
    /**
     * adds a row containing the values from $array
     * 
     * @param array $array
     * @return \utility\tables\table
     */
    public function addRow($array)
    {
	$this->startRow();
	foreach ($array as $element) {
	    $this->addCell($element);
	}
	$this->endRow();
	return $this;
    }
}
