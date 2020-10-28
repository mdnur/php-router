<?php
namespace OurApplication\Controller;
class PriceController{
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function showPrice(){
       echo("price is 10tk");
    }

    public static function userName(){
        echo("fucker");
    }
} 