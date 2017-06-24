<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/9
 * Time: 15:58
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden  = ['product_id','delete_time','product_id'];
}