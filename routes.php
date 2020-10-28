<?php 
require_once("Router.php");
use OurApplication\Routing\Router;

Router::get("/",function (){
    echo("hello world");
});
Router::get("/user/(\w+)/",function ($username){
    echo("Welcome {$username}");
});

Router::post("/post",function (){
    echo("From post");
});

Router::delete("/delete",function (){
    echo "this is a delete request\n";
});
Router::put("/put",function (){
    echo "this is a PUT request\n";
});

Router::cleanup();