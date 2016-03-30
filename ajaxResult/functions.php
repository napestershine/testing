<?php
/**
 * Created by PhpStorm.
 * User: Shinedoss.com
 * Date: 12/4/2015
 * Time: 2:54 PM
 */
/**
 * @param $data
 * @return string
 *  to validate the data
 */
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
