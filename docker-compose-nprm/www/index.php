<?php
try {
    $conn = new PDO("mysql:host=mysql;dbname=mysql;charset=utf8", "root", "111111");

    echo "Connection to Mysql server successfully";
    echo "<br/>";

    $redis = new Redis();
    $redis->connect("redis", 6379);

    echo "<br/>";
    echo "Connection to Redis server successfully";
    echo "<br/>";
} catch(PDOException $e) {
    echo $e->getMessage();
}

 
