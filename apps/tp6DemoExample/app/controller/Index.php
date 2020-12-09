<?php
namespace app\controller;

use app\BaseController;
use Psr\SimpleCache\InvalidArgumentException;
use think\Exception;
use think\facade\Cache;
use think\facade\Db;
use think\response\Json;

class Index extends BaseController
{
    public function index(): Json
    {
        // 数据库连接测试
        try {
            $userInfo =  Db::name('user_info')->select();
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

    public function hello($name = 'ThinkPHP6'): string
    {
        return 'hello,' . $name;
    }
}
