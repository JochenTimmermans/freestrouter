<?php

// so we can request the url?
define('BASE_ROUTE','routingtest');
$uri = $_SERVER['REQUEST_URI'];
$exp = explode('/',$uri);

if ($exp[0] == "" || $exp[0] == BASE_ROUTE) {
    array_shift($exp);
    if ($exp[0] == "" || $exp[0] == BASE_ROUTE) {
        array_shift($exp);
    }
}
echo $exp[0] . ' / '.$exp[1];
echo '<br/>';
echo '<br/>';