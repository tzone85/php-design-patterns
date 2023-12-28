<?php

namespace Singleton;

include 'BDconnection.php';

$objectA = DBConnection::getInstance();
$objectB = DBConnection::getInstance();
$objectC = DBConnection::getInstance();
class index
{

}