<?php

namespace utility\arrays;

/**
 * deletes an entry from given array
 * 
 * @param array $array
 * @param int $index
 * @return array
 */
function array_delete($array, $index, $remove = true)
{
    if($remove)
    {
	return array_splice($array, $index, 1);
    }
    else
    {
	$array[$index] = "";
	return $array;
    }
}

/**
 * returns an array containing random numbers between $start and $end
 * 
 * @param int $length
 * @param int $start
 * @param int $end
 * @return array
 */
function random_array($length, $start, $end)
{
    $array = array();
    for($i=0;$i<$length;$i++)
    {
	$array[] = rand($start,$end);
    }
    return $array;
}

/**
 * counts the contents of a given array
 * 
 * @param array $array
 * @return array
 */
function array_count($array)
{
    $result = array();
    for($i=0;$i<count($array);$i++)
    {
	if(isset($result[$array[$i]]))
	{
	    $result[$array[$i]]++;
	}
	else
	{
	    $result[$array[$i]] = 1;
	}
    }
    return $result;
}

/**
 * calculates the sum of all array elements
 * 
 * @param array $array
 * @return string
 */
function array_sum($array)
{
    $result = 0;
    var_dump($array);
    for($i=0;$i<count($array);$i++)
    {
	$result += $array[$i];
    }
    return result;
}

function array_csv($array)
{
    $string = "";
    for($i = 0; $i < count($array)-1;$i++)
    {
	$string .= $array[$i].", ";
    }
    $string .= $array[count($array)-1];
    return $string;
}