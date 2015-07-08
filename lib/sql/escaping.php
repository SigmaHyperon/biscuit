<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace utility\sql\query;

function escapeColumn($text)
{
    return "`".$text."`";
}

function escapeValue($text)
{
    return "'".$text."'";
}