<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/1
 * Time: 14:14
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name' => 'require|max:6',
        'email' => 'email'
    ];

}