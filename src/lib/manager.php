<?php

namespace utility;

require_once 'plotting/html.php';

/**
 * loads necessary files to provide sorting functionality
 */
function loadSorting()
{
    require_once 'manipulation/sorting.php';
}
/**
 * loads necessary files to provide form functionality
 */
function loadForms()
{
    require_once 'plotting/forms.php';
}

/**
 * loads necessary files to provide array functionality
 */
function loadArrays()
{
    require_once 'manipulation/arrays.php';
}

/**
 * 
 */
function loadStrings() 
{
    loadArrays();
    require_once 'manipulation/strings.php';
}

function loadTables()
{
    require_once 'plotting/tables.php';
}

function loadSessions()
{
    require_once 'sessions.php';
}

function cake_test()
{
    echo "けーき";
}