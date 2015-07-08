<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace utility\strings;

function string_count($string)
{
    return \utility\arrays\array_count(str_split($string));
}