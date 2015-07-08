<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace utility\sorting;
/**
 * Sorts a given array using Bubblesort (sort of)
 * 
 * @param array $array
 * @return array
 */
function bsort($array)
{
    $length = count($array)-1;
    for($i=$length;$i>=0;$i--)
    {
	for($j=0;$j<$i;$j++)
	{
	    if($array[$i]<$array[$j])
	    {
		$cache = $array[$i];
		$array[$i] = $array[$j];
		$array[$j] = $cache;

	    }
	}
    }
    return $array;
}