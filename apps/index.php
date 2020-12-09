<?php

echo '---------mysql测试----------',"<br>";
try {
    $dsn = 'mysql:dbname=test;host=mysql;charset=utf8mb4;';
    $userName = 'root';
    $pwd = 'mysql57!';
    $pdo = new PDO($dsn, $userName, $pwd);
    var_dump($pdo->query('select * from user_info')->fetchAll());
} catch (PDOException $exception) {
    echo $exception->getMessage();
}

echo "<br>", '---------redis测试----------', "<br>";
try {
    $redis = new Redis();
    $conn = $redis->connect('redis', 6379);
    echo $redis->ping('ping') . '<br/>';
    echo 'set sign:user:num 1 => ' . $redis->set('sign:user:num', 1);
}catch (RedisException $redisException) {
    echo $redisException->getMessage();
}

echo "<br>", '---------php信息----------', "<br>";
phpinfo();


