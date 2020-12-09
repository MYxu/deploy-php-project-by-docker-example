<?php
namespace app\index\controller;

use Psr\SimpleCache\InvalidArgumentException;
use think\Db;
use think\Exception;
use think\facade\Cache;
use think\response\Json;

class Index
{
    public function index(): Json
    {
        // 数据库连接测试
        try {
            $userInfo = Db::table('user_info')->select();
        } catch (Exception $e) {
            echo '数据库连接错误: ' . $e->getMessage() . "[{$e->getCode()}]";
            exit();
        }

        // redis连接测试
        try {
            $signUserNum = Cache::store('redis')->get('sign:user:num');
        } catch (InvalidArgumentException $e) {
            echo 'redis连接错误: ' . $e->getMessage() . "[{$e->getCode()}]";
            exit();
        }

        return json([
            'code' => 0,
            'data' => [
                'mysql_data' => ['user_info' => $userInfo],
                'redis_data' => ['sign_user_num' => $signUserNum]
            ]
        ]);
    }

    public function hello($name = 'ThinkPHP5'): string
    {
        return 'hello,' . $name;
    }
}
