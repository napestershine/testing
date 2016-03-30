<?php

function strposOffset($search, $string, $offset)
{
    /*** explode the string ***/
    $arr = explode($search, $string);
    /*** check the search is not out of bounds ***/
    switch ($offset) {
        case $offset == 0:
            return false;
            break;

        case $offset > max(array_keys($arr)):
            return false;
            break;

        default:
            return strlen(implode($search, array_slice($arr, 0, $offset)));
    }
}

function strposOffset2($search, $string, $offset)
{
    $len = strlen($search);
    $f = 0; $i=0; //echo 'search '.$search.'<br/>';
    if (substr_count($string, "\n") < $offset)
        return false;

    while($pos=strpos($string, $search, $f)) {
       $i++; $f= $pos + $len;
        if ($i == $offset) return $f;
    }
}

?>