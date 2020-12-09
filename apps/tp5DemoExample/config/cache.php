<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 缓存设置
// +----------------------------------------------------------------------

return [
    // 缓存配置为复合类型，即可以存在多种缓存驱动方式
    'type'  =>  'complex',

    // 默认缓存驱动方式为 file
    'default'	=>	[
        'type'	=>	'file',
        // 全局缓存有效期（0为永久有效）
        'expire'=>  0,
        // 缓存前缀
        'prefix'=>  '',
        // 缓存目录
        'path'  =>  '',
    ],

    // 缓存方式为 redis
    'redis'	=>	[
        'type'	=>	'redis',
        'host'	=>	'redis',
        // 全局缓存有效期（0为永久有效）
        'expire'=>  0,
        // 缓存前缀
        'prefix'=>  '',
    ],
];