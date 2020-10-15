<?php

namespace app\index\validate;
use think\Validate;

class price extends Validate
{
    protected $rule=[
      'zhou'=>'require',
        'yue'=>'require',
        'ji'=>'require',
        'ban'=>'require',
        'nian'=>'require',
        'zhong'=>'require'
    ];
}