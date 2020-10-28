<?php 
require_once("Router.php");
use OurApplication\Routing\Router;

Router::get("/",function (){
    echo("hello world");
});
Router::get("/user/(\w+)/",function ($username){
    echo("Welcome {$username}");
});


Router::cleanup();