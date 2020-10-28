<?php 
namespace OurApplication\Routing;
class Router{
    private static $nomatch =true;
    private static function getUrl(){
        return $_SERVER['REQUEST_URI'];
    }
    private static function process($pattern,$callback){
        $pattern = rtrim($pattern,'/');
        $pattern = "~^{$pattern}/?$~";
        $params = self::getMatches($pattern);
        if($params){
            self::$nomatch =false;
            if (is_callable($callback)) {
                $functionArguments =array_slice($params,1);
                $callback(...$functionArguments);
            }
        }
    }
    Public static function getMatches($pattern){
        $url = self::getUrl();
        if (preg_match($pattern,$url,$matches)) {
           return $matches;
        }
        return false;
    }
    public static function get($pattern,$callback){
        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            return;
        }
        self::process($pattern,$callback);
    }
    public static function post($pattern,$callback){
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return;
        }
        self::process($pattern,$callback);
    }

    public static function delete($pattern,$callback){
        if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
            return;
        }
        self::process($pattern,$callback);
    }
    

    public static function cleanup(){
        if(self::$nomatch){
            echo("No routes matches");
        }
    }
    
}
