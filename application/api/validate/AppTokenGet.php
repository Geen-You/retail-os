<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/23
 * Time: 17:37
 */

namespace app\api\validate;


class AppTokenGet extends BaseValidate
{
    protected $rule = [
        'ac' => 'require|isNotEmpty',
        'se' => 'require|isNotEmpty'
    ];

}