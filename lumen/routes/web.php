<?php

/** @var \Laravel\Lumen\Routing\Router $router */
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
function ConnectDB()
{
    $HOSTNAME = "db";
    $USERNAME = "root";
    $PASSWORD = "root";
    $DATABASE = "company";
   
    try {
        $conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            //echo "Connected to MySQL server successfully!!!";
        }
        return $conn;
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

   
}

$router->get('/', function () use ($router) {
    $str  = $router->app->version();
    $str .= "<br/><a href='http://localhost:8080/'>DATABASE SETTING</a><br/>";
    $str .= "<a href='./get'>GET</a><br/>";
    $str .= "<a href='./add?name=TEST'>ADD</a><br/>";
    $str .= "<a href='./del?id=1'>DEL</a><br/>";
    return $str;
});


$router->get('/get', function () use ($router) {
    $conn = ConnectDB();
    $sql = 'SELECT * FROM users';
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $users[] = $data;
        }
    }
    $conn->close();
    return json_encode($users);
});


$router->get('/add', function () use ($router) {
    $conn = ConnectDB();
    if(isset($_REQUEST["name"]) && $_REQUEST["name"] != ""){
        $sql = "INSERT INTO users (name) VALUES('".$_REQUEST["name"]."')";
        $result = $conn->query($sql);
        if (!$result === TRUE){
            echo "Insert error!";exit();
        }
        $conn->close();
    }

    $res["act"]     = "add";
    $res["result"]  = $result;
    return json_encode($res);
});

$router->get('/del', function () use ($router) {
    $conn = ConnectDB();
    if(isset($_REQUEST["id"]) && $_REQUEST["id"] != ""){
        $sql = "DELETE FROM users WHERE id=".$_REQUEST["id"];
        $result= $conn ->query($sql);
        if (!$result === TRUE){
            echo "Delete error!";exit();
        }
        $conn->close();
    }
    
    $res["act"]     = "del";
    $res["id"]      = $_REQUEST["id"];
    $res["result"]  = $result;
    return json_encode($res);
});


$router->get('/test', function () use ($router) {
   return "Hello World!!";
});


$router->get('/test2', function () use ($router) {
    $HOSTNAME = "db";
    $USERNAME = "root";
    $PASSWORD = "root";
    $DATABASE = "company";
   
    try {
        $conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            //echo "Connected to MySQL server successfully!!!";
        }
        return $conn;
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
 });