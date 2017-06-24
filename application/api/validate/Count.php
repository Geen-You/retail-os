<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/7
 * Time: 15:13
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
      'count' => 'isPositiveInteger|between:1,16'
    ];
}