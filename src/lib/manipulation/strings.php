<?php

namespace utility\strings;

function string_count($string)
{
    return \utility\arrays\array_count(str_split($string));
}