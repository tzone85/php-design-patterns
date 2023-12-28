<?php

namespace Singleton;

class DBconnection
{
    private function __construct()
    {
        echo "Database connection established \n";
    }

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new DBconnection();
        } else {
            echo "Using existing database connection \n";
        }
        return $instance;
    }
}